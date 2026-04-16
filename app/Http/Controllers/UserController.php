<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; 

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        
        $users = User::query();

        if ($keyword) {
           
            $users->where(function($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%')
                      ->orWhere('email', 'LIKE', '%' . $keyword . '%');
            });
        } else {
            $users->orderBy('id', 'desc'); // Urutkan dari yang terbaru
        }

        $users = $users->paginate(15);
        
        return view('pages..users.indexuser', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        
        return view('pages..users.detailUsers', compact('user'));
    }

    public function create()
    {
        return view('pages..users.createuser');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        
        return redirect('/users')->with('success', 'User created successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/users')->with('success', 'User deleted successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.users.edituser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); 

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $updateData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password); 
        }

        $user->update($updateData);

        return redirect('/users')->with('success', 'User updated successfully.');
    }
}