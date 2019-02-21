<?php

namespace App\Http\Controllers;


use App\Services\SSHService;
use App\Workspace;

class OutputController extends Controller
{
    public function index(Workspace $workspace)
    {
        $images = [];
        $videos = [];

        if (request()->filled('jobKey')) {
            $images = (new SSHService("/$workspace->key"))
                ->cd('output')
                ->cd(request('jobKey'))
                ->cd('renderedImages')
                ->ls();
        }

        return view('output.index')->with([
            'workspace' => $workspace,
            'images' => $images,
            'url' => url('/vtk.js/index.html')
        ]);
    }

    public function convertPlot()
    {
        
    }
}