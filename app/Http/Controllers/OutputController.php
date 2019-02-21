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
                ->commands('cd ' . request('jobKey'))
                ->commands('cd rendered_images')
                ->commands('ls')
                ->run();
            if (count($images) == 0)
                $images = ['No images found'];
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