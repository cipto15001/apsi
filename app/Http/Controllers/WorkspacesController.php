<?php

namespace App\Http\Controllers;

use App\Services\SSHService;
use App\Workspace;
use App\User;
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
        // auth()->loginUsingId(1);
        $user = auth()->user();
        // \DB::enableQueryLog();
        // ddr($user, $user->workspaces, \DB::getQueryLog());
        // $user = User::with('workspaces')->where('email', auth()->user()->email)->first();
        // dd($user);
        return view('workspaces.index')->with('workspaces', $user->workspaces);
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

    public function delete(Workspace $workspace)
    {
        try {
            DB::beginTransaction();
            $workspace->jobs()->delete();
            $workspace->delete();
            DB::commit();

            (new SSHService())
                ->commands("rm -rf $workspace->key")
                ->run();

            return redirect()->route('workspaces.index');
        } catch(\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
