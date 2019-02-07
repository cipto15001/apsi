<?php

namespace App\Http\Controllers;

use App\Job;
use App\Services\SSHService;
use App\Simulation;
use App\Workspace;
use Illuminate\Http\Request;
use DB;
use SSH;

class JobsController extends Controller
{
    public function index(Workspace $workspace)
    {
        $workspace->load('jobs');

        return view('jobs.index')->with([
            'workspace' => $workspace,
        ]);
    }

    public function editTemplate(Workspace $workspace, $slug)
    {
        $simulationSet = Simulation::where('slug', $slug)->firstOrFail();

        return view('jobs.edit')->with([
            'workspace'     => $workspace,
            'simulationSet' => $simulationSet,
        ]);
    }

    public function show($key)
    {
        $job = Job::where('key', $key)->firstOrFail();

        return view('jobs.show', [
            'job' => $job,
        ]);
    }

    public function createEmpty(Workspace $workspace)
    {
        return view('jobs.create_empty')->with([
            'workspace' => $workspace,
        ]);
    }

    public function create(Workspace $workspace, $slug)
    {
        $simulation = Simulation::where('slug', $slug)
            ->with('parameters')
            ->firstOrFail();

        return view('jobs.create', [
            'simulation' => $simulation,
            'workspace' => $workspace
        ]);
    }

    public function destroy(Job $job)
    {
        $jobId = $job->job_number;

        SSH::run([
            "scancel $jobId",
        ]);

        return back();
    }

    public function confirm(Workspace $workspace, $slug)
    {
        // begin writing inputted parameter
        $parameters = request('parameters');
        $parametersText = [];

        foreach ($parameters ?? [] as $param => $attributes) {
            foreach ($attributes as $key => $attribute) {
                $temp = $attribute;
                if (is_array($attribute)) {
                    $temp = implode(' ', ($attribute));
                }

                $temp = preg_replace("[^a-zA-Z0-9/]", '', $temp);

                $attributes[$key] = $temp;
            }

            $value = trim(implode(' ', $attributes));
            $parametersText[] = "$param $value";
        }

        return view('jobs.confirm', [
            'job_name' => request('job_name'),
            'slug'     => $slug,
            'params'   => implode(PHP_EOL, $parametersText),
            'workspace' => $workspace
        ]);
    }

    public function store(Workspace $workspace)
    {
        $params = explode(PHP_EOL, request('input_script'));
        $latestJob = DB::table('jobs')->orderBy('created_at', 'desc')->first();
        $key = date('Y_m_d_h_i_s') . '_' . str_slug(request('title'), '_');

        try {
            DB::beginTransaction();

            $workspace->jobs()->create([
                'job_number'    => $latestJob->job_number + 1,
                'input_script'  => implode(PHP_EOL, $params),
                'user_id'       => auth()->user()->id,
                'simulation_id' => 1,
                'name'          => request('title'),
                'status'        => 'running',
                'key'           => $key,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        return redirect()->route('workspaces.jobs.index', $workspace);
    }


    public function run(Workspace $workspace, $jobKey)
    {
        // buat folder baru
        // masukan output folder baru tersebut, jangan lupa log nya
        // Buat Jobs berdasarkan workspace

        $runFile = 'in.run';
        $bashFile = 'submit';
        $job = Job::where('key', $jobKey)->first();
        $user = auth()->user();
        
        $command = (new SSHService("/$workspace->key"))
            ->mkdir('output/' . $job->key)
            ->cd('output/' . $job->key)
            ->commands('touch ' . $runFile);

        $params = explode(PHP_EOL, $job->input_script);

        $availableReplace = [
            ':job_key' => $job->key,
        ];

        $commands = [];
        foreach ($params as $param) {
            $param = str_replace('$', '\$', $param);
            $param = str_replace(array_keys($availableReplace), array_values($availableReplace), $param);
            $commands[] = "echo \"$param\" >> $runFile";
        }

        $command
            ->commands($commands)
            ->cd('..')
            ->cd('..')
            ->commands("salloc -p zw -n 8 mpirun ../lmp_sph -in output/" . $job->key . "/in.run &> /dev/null &")
            // ->commands("salloc -p zw -n 8 mpirun ../../../lmp_sph -in ./in.run &> /dev/null &")
            ->run();
            // ->commands("touch $bashFile")
            // ->commands("echo '#!/bin/bash' >> $bashFile")
            // ->commands("echo '#SBATCH -p zwoelfkerne' >> $bashFile")
            // ->commands("echo '#SBATCH -n 8' >> $bashFile")
            // ->commands("echo '#SBATCH --job-name=apsi_" . date('YmdHis') . '_' . $user->id . "' >> $bashFile")
            // ->commands("echo 'mpirun ../../../lmp_sph -in {$runFile}' >> $bashFile")
            // ->run();

        DB::transaction(function() use ($job) {
            $job->status = 'running';
            $job->save();
        });

        return redirect()->route('workspaces.jobs.index', $workspace);
    }

    public function storeAndRun(Workspace $workspace)
    {
        $params = explode(PHP_EOL, request('input_script'));
        $latestJob = DB::table('jobs')->orderBy('created_at', 'desc')->first();
        $jobKey = date('Y_m_d_h_i_s') . '_' . str_slug(request('title'), '_');

        try {
            DB::beginTransaction();

            $workspace->jobs()->create([
                'job_number'    => $latestJob->job_number + 1,
                'input_script'  => implode(PHP_EOL, $params),
                'user_id'       => auth()->user()->id,
                'simulation_id' => 1,
                'name'          => request('title'),
                'status'        => 'running',
                'key'           => $jobKey,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        $runFile = 'in.run';
        $bashFile = 'submit';
        
        $job = Job::where('key', $jobKey)->first();
        $user = auth()->user();
        
        $command = (new SSHService("/$workspace->key"))
            ->mkdir('output/' . $key)
            ->cd('output/' . $key)
            ->commands('touch ' . $runFile);

        $params = explode(PHP_EOL, $job->input_script);

        $availableReplace = [
            ':job_key' => $job->key,
        ];

        $commands = [];
        foreach ($params as $param) {
            $param = str_replace('$', '\$', $param);
            $param = str_replace(array_keys($availableReplace), array_values($availableReplace), $param);
            $commands[] = "echo \"$param\" >> $runFile";
        }

        $command
            ->commands($commands)
            ->cd('..')
            ->cd('..')
            ->commands("salloc -p zw -n 8 mpirun ../lmp_sph -in output/" . $key . "/in.run &> /dev/null &")
            ->run();
            // ->commands("touch $bashFile")
            // ->commands("echo '#!/bin/bash' >> $bashFile")
            // ->commands("echo '#SBATCH -p zwoelfkerne' >> $bashFile")
            // ->commands("echo '#SBATCH -n 8' >> $bashFile")
            // ->commands("echo '#SBATCH --job-name=apsi_" . date('YmdHis') . '_' . $user->id . "' >> $bashFile")
            // ->commands("echo 'mpirun ../../../lmp_sph -in {$runFile}' >> $bashFile")
            // ->run();

        DB::transaction(function() use ($job) {
            $job->status = 'running';
            $job->save();
        });

        return redirect()->route('workspaces.jobs.index', $workspace);
    }

    public function refresh($key)
    {
        $job = Job::where('key', $key)->firstOrFail();

        $commands = [];
        $commands[] = 'cd apsi; cd ' . $job->key;

        $out = [];
        SSH::run(array_merge($commands, [
            "cat slurm-{$job->job_number}.out",
        ]), function ($line) use (&$out) {
            $out[] = $line;
        });

        $log = [];
        SSH::run(array_merge($commands, [
            'cat log.lammps',
        ]), function ($line) use (&$log) {
            $log[] = $line;
        });

        $job->out = implode(PHP_EOL, $out);
        $job->log = implode(PHP_EOL, $log);
        $job->save();

        return back();
    }

    public function edit(Workspace $workspace, $key)
    {
        $job = Job::where('key', $key)->first();

        return view('jobs.edit_template')->with([
            'job' => $job,
            'workspace' => $workspace
        ]);
    }

    public function update(Workspace $workspace, Request $request, $key)
    {
        $job = Job::where('key', $key)->first();

        DB::transaction(function () use ($job, $request) {
            $job->update($request->all());
        });

        return redirect(route('workspaces.jobs.index', $workspace));
    }

    public function deleteJob(Workspace $workspace, $jobKey) {
        $job = Job::where('key', $jobKey)->first();
        
        (new SSHService("/$workspace->key"))
            ->commands('rm -rf output/' . $job->key)
            ->run();

        DB::transaction(function() use ($job) {
            // SSH::run([
            //     "scancel $job->job_number",
            // ]);
            $job->delete();
        });

        return back();
    }
}
