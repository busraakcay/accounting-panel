<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|integer',
            'name' => 'required|string',
            'surname' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'email' => 'required|string',
            'password' => 'required|string',
            'repassword' => 'required|string',
            'phone' => 'required|numeric',
        ]);

        $user = new User();
        if (checkPasswords($request->password, $request->repassword) == TRUE) {
            $user->password = Hash::make($request->password);
        } else {
            return redirect()->back()->with('error', 'Şifreler uyuşmuyor!');
        }
        $user->type = $request->input('type');
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->phone = $request->input('phone');
        $user->save();

        return redirect()->route('admin')->with('success', 'Yönetici başarıyla eklendi!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|integer',
            'name' => 'required|string',
            'surname' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|string',
            'password' => 'nullable|string',
            'repassword' => 'nullable|string',
            'phone' => 'required|numeric',
        ]);

        $user = User::findOrFail($id);
        if ($request->input('password') !== null && $request->input('repassword') !== null) {
            if (checkPasswords($request->password, $request->repassword)) {
                $user->password = Hash::make($request->password);
            } else {
                return redirect()->back()->with('error', 'Şifreler uyuşmuyor!');
            }
        } else {
            $user->password = $user->password;
        }

        $user->type = $request->input('type');
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->phone = $request->input('phone');
        $user->save();

        return redirect()->route('admin')->with('success', 'Yönetici başarıyla güncellendi!');
    }

}
