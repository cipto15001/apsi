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
    /* Create Block */
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

    public function createEmpty(Workspace $workspace)
    {
        return view('jobs.create_empty')->with([
            'workspace' => $workspace,
        ]);
    }

    public function editInEditor(Workspace $workspace)
    {
        return view('jobs.editor')->with([
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

    public function store(Workspace $workspace)
    {
        try {
            $key = date('Y_m_d_h_i_s') . '_' . str_slug(request('name'), '_');
            $latestJob = $workspace->jobs()->orderBy('job_number', 'DESC')->first();
            $params = explode(PHP_EOL, request('input_script'));

            $result = (new SSHService("/$workspace->key"))
                ->commands("mkdir $key")
                ->commands("cd $key")
                ->commands("mkdir input")
                ->commands("mkdir output")
                ->commands("mkdir resources")
                ->commands("mkdir rendered_images")
                ->commands("mkdir rendered_video")
                ->run();

            DB::beginTransaction();

            $workspace->jobs()->create([
                'job_number'    => count($latestJob) == 0 ? 0 : $latestJob->job_number + 1,
                'input_script'  => implode(PHP_EOL, $params),
                'user_id'       => auth()->user()->id,
                'simulation_id' => 1,
                'name'          => request('name'),
                'status'        => 'draft',
                'key'           => $key,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $result = (new SSHService("/$workspace->key"))
                ->commands("rmdir $key")
                ->run();
            throw $e;
        }

        return redirect()->route('workspaces.jobs.index', $workspace);
    }
    /* End Create Block */  


    /* Read Block */
    public function show($key)
    {
        $job = Job::where('key', $key)->firstOrFail();

        return view('jobs.show', [
            'job' => $job,
        ]);
    }
    /* End Read Block */


    /* Update Block */
    public function edit(Workspace $workspace, Job $job)
    {
        return view('jobs.update')->with([
            'job' => $job,
            'workspace' => $workspace
        ]);
    }

    public function update(Workspace $workspace, Request $request, Job $job)
    {
        $jobKeyToArray = explode('_', $job->key);
        $jobKeySliced = array_slice($jobKeyToArray, 0, 6);
        $newJobTitle = explode(' ', strtolower($request->title));
        $newJobKey = implode('_', array_merge($jobKeySliced, $newJobTitle));
                
        try {
            $result = (new SSHService("/$workspace->key"))
                ->commands("mv $job->key $newJobKey")
                ->run();

            DB::beginTransaction();

            $job->update([
                'name' => $request->title,
                'key' => $newJobKey,
                'input_script' => $request->input_script
            ]);

            DB::commit();

            return redirect()->route('workspaces.jobs.index', $workspace);
        } catch (\Exception $e) {
            (new SSHService("/$workspace->key"))
                ->commands("mv $newJobKey $job->key")
                ->run();
            
            DB::rollback();
            throw $e;
        }
    }
    /* End Update Block */


    /* Delete Block */
    public function destroy(Job $job)
    {
        $jobId = $job->job_number;

        SSH::run([
            "scancel $jobId",
        ]);

        return back();
    }

    public function deleteJob(Workspace $workspace, Job $job)
    {
        try {
            DB::beginTransaction();        
            $job->delete();
            DB::commit();

            $result = (new SSHService("/$workspace->key"))
                ->commands("rm -rf $job->key")
                ->run();

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        return response()->json("OK");
    }
    /* End Delete Block */


    /* Other Block */
    public function run(Workspace $workspace, Job $job, Request $request)
    {
        // buat folder baru
        // masukan output folder baru tersebut, jangan lupa log nya
        // Buat Jobs berdasarkan workspace

        $runFile = 'in.run';
        $bashFile = 'submit.sh';
        $errorLogFile = 'slurm.out';
        $partitionName = $request->partition;
        $totalNode = $request->total_node;
        $jobName = $request->job_name;
        $user = auth()->user();
        
        $command = (new SSHService("/$workspace->key"))
            ->commands("cd $job->key")
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
            // ->cd('..')
            // ->cd('..')
            // ->commands("salloc -n 8 mpirun ../lmp_sph -in output/" . $key . "/in.run &> /dev/null &")
            // ->run();
            ->commands("touch $bashFile")
            ->commands("echo '#!/bin/bash' >> $bashFile")
            ->commands("echo '#SBATCH -p $partitionName' >> $bashFile")
            ->commands("echo '#SBATCH -n $totalNode' >> $bashFile")
            ->commands("echo '#SBATCH -e $errorLogFile' >> $bashFile")
            ->commands("echo '#SBATCH --job-name=apsi_" . date('YmdHis') . '_' . $user->id . '_' . $jobName . "' >> $bashFile")
            ->commands("echo 'mpirun /scratch/erick/apsi/lmp_sph -in /scratch/erick/apsi/$workspace->key/$job->key/$runFile &> /dev/null &' >> $bashFile")
            ->commands("bash $bashFile")
            ->run();

        $job->status = 'running';
        $job->save();
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

    public function log(Workspace $workspace, Job $job)
    {
        $squeueResult = (new SSHService("/$workspace->key"))
            ->commands("squeue")
            ->run();
        $errorLogResult = (new SSHService("/$workspace->key"))
            ->commands("cd $job->key")
            ->commands("cat log.lammps")
            ->run();

        return view('log.index')->with([
            'squeueResult'      => $squeueResult,
            'errorLogResult'    => $errorLogResult
        ]);
    }

    public function render(Workspace $workspace)
    {
        
    }
    /* End Other Block */
}