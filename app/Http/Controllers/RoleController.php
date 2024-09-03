<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('users')->get();
        return view('role.index', compact('roles'));
    }
    public function create()
    {
        return view('role.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required',
        ]);
        $role = new Role();
        $role->role_name = $request->role_name;
        $role->save();
        if ($role->save()) {
            return redirect()->route('role.index')->with('success', 'Role created successfully');
        } else {
            return redirect()->route('role.index')->with('error', 'Role create Failed');
        }
    }
    public function edit(Request $request) {}
    public function show(Request $request)
    {
        $role = Role::with('users')->find($request->id);
        $roleUserIds = $role->users->pluck('id')->toArray();
        $users = User::get();
        return view('role.show', compact('role', 'users', 'roleUserIds'));
    }
    public function update() {}
    public function delete(Request $request)
    {
        $role = Role::find($request->id);
        $role->delete();
        if ($role) {
            return redirect()->route('role.index')->with('success', 'Role Deleted successfully');
        } else {
            return redirect()->route('role.index')->with('error', 'Role Delete Failed');
        }
    }


    public function AssignUsertoRole(Request $request)
    {
        $role = Role::find($request->id);
        $users = $request->user;

        $role->users()->sync($users);
        if ($role) {
            return redirect()->route('role.index')->with('success', 'Role Assigned successfully');
        } else {
            return redirect()->route('role.index')->with('error', 'Role Assigned Failed');
        }
    }
}
