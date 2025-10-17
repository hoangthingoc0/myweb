<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function displayUser()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function saveUser(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->update($request->all());
        return redirect('/users')->with('success', 'Cập nhật thành công');
    }
}
