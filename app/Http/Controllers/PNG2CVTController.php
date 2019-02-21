<?php

namespace App\Http\Controllers;


use App\Services\SSHService;
use App\Workspace;

class PNG2CVTController
{
    public function index(Workspace $workspace)
    {
        $files = new SSHService("/$workspace->key");
        $files = $files
            ->cd("resources")
            ->ls();

        return view('png2cvt.index')->with([
            'workspace' => $workspace,
            'files' => $files,
        ]);
    }

    public function doConvert(Workspace $workspace)
    {
        $input = "./$workspace->key" . '/resources/' . request('input');
        $output = "./$workspace->key" . '/input/' . request('output') . '.lmp';
        (new SSHService())
            ->commands("php pngcvt-sq.php '" . $input . "' '" . $output . "'")
            ->run();

        return redirect()->route('workspaces.show', $workspace);
    }
}