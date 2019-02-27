<?php

namespace App\Http\Controllers;

use App\Workspace;
use App\Job;
use App\Services\SSHService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RenderController extends Controller
{
    public function index(Workspace $workspace)
    {
        return view('render.index')->with([
            'workspace' => $workspace
        ]);
    }

    public function doRender(Workspace $workspace, Request $request)
    {
        $job = Job::where('key', $request->jobKey)->first();
        $wdir = 'output';
        $movName = 'rendered_video/' . $job->key . '_rendered.webm';
        $tmpScriptName = '/tmp/' . str_random(7) . '_' . str_slug(strtolower($job->name), '_') . '_render';
        
        (new SSHService("/$workspace->key"))
            ->commands("cd $job->key")
            ->commands("touch $tmpScriptName")
            ->commands("echo '#!/bin/bash' >> $tmpScriptName")
            ->commands("echo '#SBATCH -p zw' >> $tmpScriptName")
            ->commands("echo '#SBATCH -n 4' >> $tmpScriptName")
            ->commands("echo '#SBATCH -e $tmpScriptName.log' >> $tmpScriptName")
            ->commands("echo '#SBATCH --job-name=apsi_$tmpScriptName'  >> $tmpScriptName")
            ->commands("echo 'mpirun /scratch/erick/apsi/plot $wdir $movName &> /dev/null &' >> $tmpScriptName")
            ->commands("bash $tmpScriptName")
            ->run();

        return redirect()->route('workspaces.index', $workspace);
    }
}
