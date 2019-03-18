<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $user = User::create($request->all());
            $user->update([
                'password' => \Hash::make($request->password)
            ]);

            DB::commit();
        } catch (\Exception $e) {
            ddr ($e);
        }

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            DB::beginTransaction();

            $user->delete();

            DB::commit();
        } catch (\Exception $e) {
            ddr ($e);
        }

        return redirect()->route('users.index');
    }

    public function changeEmail(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = auth()->user();
            $user->email = $request->email;
            $user->save();
            DB::commit();

            return response()->json('OK');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function checkOldPassword(Request $request)
    {
        $credentials = [
            'email'     => auth()->user()->email,
            'password'  => $request->oldPassword
        ];

        $isCorrect = Auth::attempt($credentials, false);

        if ($isCorrect) {
            return response()->json('OK');
        } else {
            return response()->json('NOT_FOUND');
        }
    }

    public function changePassword(Request $request)
    {
        try {
            $newPassword = bcrypt($request->newPassword);
            $user = auth()->user();

            DB::beginTransaction();
            $user->password = $newPassword;
            $user->save();
            DB::commit();

            return response()->json('OK');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function checkEmail(Request $request)
    {
	$user = User::where('email', $request->email)->first();
	if (count($user) == 1)
	    return response()->json('OK');
	else
	    return response()->json('NOT_FOUND');
    }

    public function addNewUser(Request $request) {
	$fullname = $request->fullname;
	$email = $request->email;
	$password = Hash::make($request->password);
	$role = $request->role;

	try {
	    DB::beginTransaction();
	    User::create([
		'name' => $fullname,
		'email' => $email,
		'password' => $password,
		'role' => $role
	    ]);
	    DB::commit();
	    return response()->json('OK');
	} catch (\Exception $e) {
	    DB::rollback();
    	    throw $e;
	}
    }	
}
