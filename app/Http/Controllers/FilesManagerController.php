<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SSHService;
use App\Workspace;
use SSH;
use Storage;

class FilesManagerController extends Controller
{

    public function list(Request $request)
    {
        $workspace = Workspace::find($request->get('id'));
        $path = $request->get('path');

        
        $dirs = (new SSHService("/$workspace->key"))->ls_filemanager($path);
        $dirList = array();

        foreach ($dirs as $dir) {
            $attributes = explode(" ", $dir);
            $refinedAttributes = array_values(array_filter($attributes));
            
            // Attributes length should be 9
            if (count($refinedAttributes) != 9) {
                continue;
            } else {
                $data = [
                    'name'      => $refinedAttributes[8],
                    'rights'    => $refinedAttributes[0],
                    'size'      => $refinedAttributes[4],
                    'date'      => $refinedAttributes[5] . " " . explode(".", $refinedAttributes[6])[0],
                    'type'      => substr($refinedAttributes[0], 0, 1) === "d" ? "dir" : "file"
                ];

                array_push($dirList, $data);
            }
        }

        return response()->json([
            'result' => $dirList
        ]);
    }

    public function rename(Request $request)
    {
        $workspace = Workspace::find($request->get('id'));
        $item = $request->get('item');
        $newItemPath = $request->get('newItemPath');

        try {
            (new SSHService("/$workspace->key"))
                ->rename("'$item'", "'$newItemPath'")
                ->run();
    
            return response()->json([
                'result' => [
                    'success'   => true,
                    'error'     => null
                ]
            ]);
        } catch (Exception $e) {
            return response()->json([
                'result' => [
                    'success'   => false,
                    'error'     => $e
                ]
            ]);
        }
    }

    public function createFolder(Request $request)
    {
        $workspace = Workspace::find($request->get('id'));
        $newPath = '.' . $request->get('newPath');
        
        try {
            (new SSHService("/$workspace->key"))
                ->mkdir("'$newPath'")
                ->run();
            
            return response()->json([
                'result' => [
                    'success'   => true,
                    'error'     => null
                ]
            ]);
        } catch(Exception $e) {
            return response()->json([
                'result' => [
                    'success'   => false,
                    'error'     => $e
                ]
            ]);
        }
    }

    public function remove(Request $request)
    {
        $workspace = Workspace::find($request->get('id'));
        
        $items = "";
        foreach ($request->items as $item) {
            $items .= "'.$item' ";
        }
        $items = rtrim($items, " ");

        try {
            (new SSHService("/$workspace->key"))
                ->rm($items)
                ->run();
        
            return response()->json([
                'result' => [
                    'success'   => true,
                    'error'     => null
                ]
            ]);
        } catch (Exception $e) {
            return response()->json([
                'result' => [
                    'success'   => false,
                    'error'     => $e
                ]
            ]);
        }
    }

    public function move(Request $request)
    {
        $workspace = Workspace::find($request->get('id'));
        $newPath = ".$request->newPath";
        
        $items = "";
        foreach ($request->items as $item) {
            $items .= "'.$item' ";
        }
        $items = rtrim($items, " ");

        try {
            (new SSHService("/$workspace->key"))
                ->move($items, $newPath)
                ->run();

            return response()->json([
                'result' => [
                    'success'   => true,
                    'error'     => null
                ]
            ]);
        } catch (Exception $e) {
            return response()->json([
                'result' => [
                    'success'   => false,
                    'error'     => $e
                ]
            ]);
        }
    }

    public function upload(Request $request)
    {
        $workspace = Workspace::find($request->id);
        $files = array_keys(array_slice($request->all(), 2));
        $destination = $request->destination;
        
        foreach ($files as $file) {
            $filename = $request->file($file)->getClientOriginalName();
            $filename = str_replace(" ", "_", $filename);
            $request->file($file)->storeAs("/$workspace->key$destination", $filename);
        }

        return response()->json([
            'result' => [
                'success'   => true,
                'error'     => null
            ]
        ]);
    }

    public function download(Request $request)
    {
        $id = explode("?", $request->get('id'))[0];
        $workspace = Workspace::find($id);
        $path = $request->get('path');
        
        return Storage::download("/$workspace->key$path");
    }

    public function copy(Request $request)
    {
        $workspace = Workspace::find($request->id);
        $newPath = $request->newPath;
        
        $items = "";
        foreach ($request->items as $item) {
            $items .= "'.$item' ";
        }
        $items = rtrim($items, " ");
        
        if (count($request->items) == 1) {
            $singleFilename = $request->singleFilename;
            (new SSHService("/$workspace->key"))
                ->cp($items, ".$newPath/$singleFilename")
                ->run();
        } else {
            (new SSHService("/$workspace->key"))
                ->cp($items, ".$newPath")
                ->run();
        }

        return response()->json([
            'result' => [
                'success'   => true,
                'error'     => null
            ]
        ]);
    }

    public function getContent(Request $request)
    {
        $workspace = Workspace::find($request->id);
        $item = $request->item;

        return response()->json([
            'result' => (new SSHService("/$workspace->key"))
                ->commands("cat .$item")
                ->run()
        ]);
    }

    public function edit(Request $request)
    {
        $workspace = Workspace::find($request->id);
        $item = $request->item;
        $content = $request->content;

        $result = (new SSHService("/$workspace->key"))
            ->commands('echo "' . $content .'" > .' . $item)
            ->run();

        return response()->json([
            'result' => [
                'success' => true,
                'error' => null,
                'data' => [
                    'item' => $item,
                    'content' => $content,
                    'result' => $result
                ]
            ]
        ]);
    }
}
