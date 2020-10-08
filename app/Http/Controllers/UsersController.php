<?php

/*
* @Author: Patel Sujal M.
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageinfo = [
            'title' => 'User List',
        ];
        $userlist = User::get();
        return view('users.index',compact('userlist','pageinfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageinfo = [
            'title' => 'Add User',
        ];
        return view('users.options',compact('pageinfo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname'   => 'required|max:190',
            'email'   => 'required|email',
        ]);

        $user = new User;
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make(123456789);
        $user->role = 2;
        if($user->save())
        {
            return redirect()->route('users.index')->with(['toastr'=>'new user created successfully','type'=>'success']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageinfo = [
            'title' => 'Edit User',
        ];
        $user = User::find($id);
        return view('users.options',compact('user','pageinfo'));
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
        $request->validate([
            'fullname'   => 'required|max:190',
            'email'   => 'required|email',
        ]);

        $user = User::find($id);
        $user->fullname = $request->fullname;
        $user->email = $request->email;
        if($user->save())
        {
            return redirect()->route('users.index')->with(['toastr'=>'user details updated successfully','type'=>'success']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::find($id)->delete()){
            return redirect()->route('users.index')->with(['toastr'=>'user details deleted successfully','type'=>'success']);
        }
    }
}
