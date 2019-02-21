<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SSHService;
use App\Workspace;

class LogsController extends Controller
{
    public function index(Workspace $workspace) 
    {
    	$squeueResult = (new SSHService("/$workspace->key"))
    		->commands("squeue")
    		->run();

    	$errorLogResult = (new SSHService("/$workspace->key"))
    		->commands("cat log.lammps")
    		->run();

    	return view('log.index')->with([
    		'squeueResult' => $squeueResult,
    		'errorLogResult' => $errorLogResult
    	]);
    }
}
