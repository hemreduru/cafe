<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.users.index')->with('users', $users);
    }

    public function create()
    {
        return view('pages.users.create');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
       return view('pages.users.edit')->with(compact('user', 'roles'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('pages.users.show')->with('user', $user);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        DB::beginTransaction();
        try {
            User::createUser($request->all());
            DB::commit();
            return redirect()->back()->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating user: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error creating user.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $id,
            'password' => 'sometimes|nullable|string|min:8',
        ]);

        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);
            $user->updateUser($request->all());
            DB::commit();
            return redirect()->back()->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating user: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error updating user.');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);
            $user->deleteUser();
            DB::commit();
            return redirect()->back()->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting user: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error deleting user.');
        }
    }
}
