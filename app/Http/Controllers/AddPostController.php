<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AddPostController extends Controller
{
    public function create()
    {
        return view('profile.post.create', [
            'title' => 'Create',
            'users' => User::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|file|max:1024',
            'caption' => 'required|max:100',
        ]);

        if ($request->status == 'on') {
            $validatedData['status'] = false;
        } else {
            $validatedData['status'] = true;
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['slug'] = str_replace(' ', '-', $validatedData['caption']);

        $user = str_replace(' ', '-', Str::lower(auth()->user()->name));
        $validatedData['image'] = $request->file('image')->store('gallery-profile/' . str_replace('.', '', $user));

        Gallery::create($validatedData);

        return redirect('/profile')->with('post-success', 'New post added');

    }

    public function update(Request $request)
    {
        if (!$request->status == $request->status_old) {
            Gallery::where('id', $request->id)->update(['status' => $request->status]);
        }

        return redirect('/profile');
    }

    public function destroy(Gallery $gallery)
    {
        Storage::delete($gallery->image);
        Gallery::destroy($gallery->id);

        return redirect('/profile')->with('delete-success', 'post has been deleted');
    }
}
