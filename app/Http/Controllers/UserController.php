<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\user_role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        // return $users;
        return view('user.index', compact('users'));
    }
    public function create()
    {

        return view('user.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $user = new User();
        $user->roles;
        $user->email = $request->name;
        $user->name = $request->name;
        $user->save();
        if ($user->save()) {
            return redirect()->route('user.index')->with('success', 'User created successfully');
        } else {
            return redirect()->route('user.index')->with('error', 'User create Failed');
        }
    }
    public function edit(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $user = User::find($request->id);

        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();

        if ($user) {
            return redirect()->route('user.index')->with('success', 'User Update successfully');
        } else {
            return redirect()->route('user.index')->with('error', 'User Update Failed');
        }
    }

    public function delete(Request $request)
    {

        $user = User::find($request->id);

        $user->delete();

        if ($user) {
            return redirect()->route('user.index')->with('success', 'User Deleted successfully');
        } else {
            return redirect()->route('user.index')->with('error', 'User Deleted Failed');
        }
    }

    public function show(Request $request)
    {

        $user = User::with('roles')->find($request->id);
        $roles = Role::get();
        return view('user.show', compact('user', 'roles'));
    }

    public function RoleAssigntoRole(Request $request)
    {
        $user = User::find($request->id);
        $roles = $request->role;
        // dd($roles);
        $user->roles()->sync($roles);
        if ($user) {
            return redirect()->route('user.index')->with('success', 'User Role Update successfully');
        } else {
            return redirect()->route('user.index')->with('error', 'User Role Update Failed');
        }
    }
}
