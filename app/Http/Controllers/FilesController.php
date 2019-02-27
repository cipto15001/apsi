<?php

namespace App\Http\Controllers;


use App\Services\SSHService;
use App\Workspace;

class FilesController extends Controller
{
    public function video(Workspace $workspace)
    {
        $fileName = "/$workspace->key/"  . request('file');

        $file = (new SSHService())
            ->getFile($fileName);

        header('Content-Type: video/webm');
        echo $file;

        // $name = 'video-'.str_random(4).'.webm';
        // $target_file = base_path()."/public/".$name;
        // file_put_contents($target_file,$file);

        // $img = imagecreatefromstring($file);
        // header('Content-type: image/png');
        // imagepng($img);

        // $data = base64_decode($data);
    }

    public function image(Workspace $workspace)
    {
        $fileName = "/$workspace->key/" . request('file');

        $file = (new SSHService())
            ->getFile($fileName);

        header('Content-type: image/png');
        echo $file;

        // $img = imagecreatefromstring($file);
        // imagepng($img);
    }
}