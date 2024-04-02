<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AddPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.post.create', [
            'title' => 'Create',
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        return $gallery;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        return 'test';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {

        return $gallery->caption;
        // if ($gallery->image) {
        //     Storage::delete($gallery->image);
        // }
        // Gallery::destroy($gallery->id);

        // return redirect('/dashboard/posts')->with('success', 'post has been deleted');
    }
}
