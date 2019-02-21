<?php

namespace App\Http\Controllers;

use App\Services\SSHService;
use App\Workspace;
use DB;
use Ramsey\Uuid\Uuid;

class WorkspacesController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('workspaces.index');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function store()
    {
        DB::transaction(function () {
            $uid = Uuid::uuid4()->toString();
            Workspace::create(array_merge(request()->all(), [
                'key' => $uid,
            ]));

            (new SSHService())
                ->commands("mkdir $uid")
                ->run();
        });

        return back();
    }

    public function show(Workspace $workspace)
    {
        $workspaceId = $workspace->id;
        // $url = "http://apsi.facade.id/file/#/c/guriang.unpad.ac.id/erick/" . base64_encode(str_replace('\'', '"', "{'t':'sftp','c':{'o':22,'i':'/scratch/erick/apsi/$folder','m':'Password','p':'aA!12345'}}"));
        $url = url("file_manager/?id=$workspaceId");

        return view('workspaces.show')->with([
            'workspace' => $workspace,
            'url'       => $url,
        ]);
    }

    public function fileManager()
    {
        return view('workspaces.file_manager');
    }
}
