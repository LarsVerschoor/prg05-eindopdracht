<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $post = new Post();
        $post->user_id = $request->user()->id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->media_path = '/test';
        $post->save();
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        $post = Post::all()->find($id);

        if ($post === null) {
            abort(404);
        } else {
            $role = $request->user()->role;
            return view('posts.show', compact('post', 'role'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if ($post === null) {
            abort(404);
        } else {
            $post->delete();
            return redirect()->route('posts.index')->with('success', 'Post ' . $post->id . ' deleted successfully');
        }
    }
}
