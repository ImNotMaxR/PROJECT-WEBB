<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  


class UserController extends Controller  
{  
    public function index()  
    {  
        
        $users = User::all();  
        return view('member.index', compact('users'));  
    }  

    public function create()  
    {  
        return view('users.create');  
    }  

    public function store(Request $request)  
    {  
        $request->validate([  
            'name' => 'required',  
            'email' => 'required|email|unique:users',  
            'password' => 'required|min:6',  
        ]);  

        User::create([  
            'name' => $request->name,  
            'email' => $request->email,  
            'password' => bcrypt($request->password),  
            'role' => 'user', // Atur role default  
        ]);  

        return redirect()->route('member.index')->with('success', 'User created successfully.');  
    }  

    public function edit(User $user)  
    {  
        return view('member.edit', compact('user'));  
    }  

    public function update(Request $request, User $user)  
    {  
        $request->validate([  
            'name' => 'required',  
            'email' => 'required|email|unique:users,email,' . $user->id,  
        ]);  

        $user->update($request->only('name', 'email'));  

        return redirect()->route('users.index')->with('success', 'User updated successfully.');  
    }  

    public function destroy(User $user)  
    {  
        $user->delete();  
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');  
    }  
}  
