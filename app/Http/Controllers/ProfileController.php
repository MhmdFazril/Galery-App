<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index', [
            'title' => 'Profile',
            'users' => User::all(),
            'galleries' => Gallery::all()->where('user_id', auth()->user()->id),
            'galleriesCount' => count(Gallery::all()->where('user_id', auth()->user()->id)),
            'galleriesPublic' => count(Gallery::all()->where('user_id', auth()->user()->id)->where('status', 1)),
        ]);
    }

    public function edit()
    {
        return view('profile.edit', [
            'title' => 'edit',
            'users' => User::all(),
            'user' => User::where('id', Auth()->user()->id)->first(),
        ]);
    }

    public function update(Request $request)
    {

        $rules = [
            'name' => 'required|max:255',
            'bio' => 'max:30',
            'image' => 'image|file|max:1024',

        ];

        if ($request->username != auth()->user()->username) {
            $usernameExist = User::where('username', $request->username)->exists();
            if ($usernameExist) {
                $rules['username'] = 'required|unique:users';
            } else {
                $rules['username'] = 'required';
            }
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            $user = str_replace(' ', '-', auth()->user()->name);

            $validatedData['image'] = $request->file('image')->store('gallery-profile/' . $user);
        }

        User::where('id', auth()->user()->id)->update($validatedData);

        return redirect('/profile')->with('update-success', 'Update Success');
    }
}
