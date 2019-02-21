<?php

namespace App\Http\Controllers;


use App\Services\SSHService;
use App\Workspace;
use App\Job;

class PNG2CVTController
{
    public function index(Workspace $workspace)
    {
        $jobs = auth()->user()->jobs()->where('workspace_id', $workspace->id)->get();

        return view('png2cvt.index')->with([
            'workspace' => $workspace,
            'jobs' => $jobs,
            'files' => []
        ]);
    }

    public function getFiles(Workspace $workspace, Job $job)
    {
        $files = (new SSHService("/$workspace->key"))
            ->commands("cd $job->key")
            ->commands("cd resources")
            ->commands("ls")
            ->run();

        $result = array_slice(explode("\n",$files), 0, count($files)-3);
        return response()->json($result);
    }

    public function doConvert(Workspace $workspace, Job $job)
    {
        $input = request('input');
        $output = request('output') . '.lmp';
        (new SSHService("/$workspace->key"))
            ->commands("cd $job->key")
            ->commands("php /scratch/erick/apsi/pngcvt-sq.php resources/$input input/$output")
            ->run();

        return redirect()->route('workspaces.show', $workspace);
    }
}