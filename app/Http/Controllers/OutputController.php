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
            $images = explode("\n", $images);
            $images = array_slice($images, 1, count($images)-3);

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