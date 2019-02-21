<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workspace;
use App\Services\SSHService;

class WebCLIController extends Controller
{
    private $sshService;

    public function __construct(Request $request) {
    	$workspace = Workspace::find($request->route('workspace'));
    	$this->sshService = new SSHService("/$workspace->key");
    }

	public function doCommand(Request $request, Workspace $workspace) {
		$command = $request->command;
		$explodedCommand = explode(" ", $command);
		if ($explodedCommand[0] == 'cd') {
			$this->sshService = new SSHService("/$workspace->key/$explodedCommand[1]");
		} else {
			$result = $this->sshService->commands([$command])->run();
			return response()->json(rtrim($result));	
		}
	}

    public function index(Request $request, Workspace $workspace) {
    	return view('webcli.show')->with('workspace', $workspace);
    }
}
