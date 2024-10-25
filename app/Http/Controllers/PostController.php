<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $imageName = time().'.'.$request->image->extension();
        Storage::disk('local')->putFileAs('private/post_images', $request->image, $imageName);
        $post->media_path = $imageName;
        $post->save();
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        $post = Post::all()->find($id);
        $user_id = $request->user()->id;

        if ($post === null) {
            abort(404);
        } else {
            $role = $request->user()->role;
            return view('posts.show', compact('post', 'role', 'user_id'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('posts.edit', compact('id'));
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
    public function destroy(string $id, Request $request)
    {
        $post = Post::find($id);
        $user = $request->user()->id;

        if ($post === null) {
            abort(404);
        } else if ($post->user_id !== $user->id && $user->role !== 1) {
            abort(403);
        }  else {
            $post->delete();
            return redirect()->route('posts.index')->with('success', 'Post ' . $post->id . ' deleted successfully');
        }
    }

    public function showImage(string $id)
    {
        $post = Post::find($id);
        $filename = $post->media_path;
        $path = 'private/post_images/' . $filename;

        if (!Storage::disk('local')->exists($path)) {
            abort(404);
        }

        $file = Storage::disk('local')->get($path);
        $mimeType = Storage::mimeType($path);

        return response($file, 200)->header('Content-Type', $mimeType);
    }
}
