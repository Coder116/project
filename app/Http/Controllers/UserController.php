<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission', ['only' => ['index','create']]);
    }


    public function index()
    {

        $users = User::role()->get(['id', 'name', 'email', 'role']);
        return view('user', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $user_input = [
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
            'email' => $request->input('email')
        ];

        User::storeUser($user_input);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        
        return view('inform', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::getUser($id);
        return view('editUser', compact('users'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $newpassword = $request->input('password');
        $oldpassword = User::find($id)->password;

        if(\Hash::check($newpassword, $oldpassword)){
            
            return redirect()->back()->withErrors(['abc'=> 'Lỗi! Trùng mật khẩu cũ']);
        }
        if($newpassword) {
            User::getUser($id)->update([
                'name' => $request->input('name'),
                'password' => bcrypt($newpassword),
                'email' => $request->input('email')

            ]);
        }
        
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idLogin = Auth::user()->id;
        if($idLogin == $id)
            return redirect()->route('user.index');

        User::getUser($id)->delete();
        return redirect()->route('user.index');
    }
}
