<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userId = $request->user()->id;
        $posts = Post::with(['user', 'likes'])->get()->map(function ($post) use ($userId) {
            $post->liked = $post->likes->contains('user_id', $userId);
            return $post;
        });

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
        $imageName = Str::uuid().'.'.$request->image->extension();
        Storage::disk('local')->putFileAs('post_images', $request->image, $imageName);
        $post->media_path = $imageName;
        $post->save();
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        $post = Post::find($id);
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
        $user = $request->user();

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

        if ($post === null) {
            abort(404);
        }

        $filename = $post->media_path;
        $path = 'post_images/' . $filename;

        if (!Storage::disk('local')->exists($path)) {
            abort(404);
        }

        $file = Storage::disk('local')->get($path);
        $mimeType = Storage::mimeType($path);

        return response($file, 200)->header('Content-Type', $mimeType);
    }

    public function storeLike(Request $request, string $postId) {

        $userId = $request->user()->id;

        $existingLike = PostLike::where('post_id', $postId)
            ->where('user_id', $userId)
            ->first();

        if ($existingLike) {
            return response()->json(['liked' => '1'], 409);
        }

        $postLike = new PostLike();
        $postLike->post_id = $postId;
        $postLike->user_id = $userId;
        $postLike->save();

        return response()->json(['liked' => '1'], 201);
    }

    public function destroyLike(string $postId, Request $request) {
        $userId = $request->user()->id;

        $postLike = PostLike::where('post_id', $postId)
            ->where('user_id', $userId)
            ->first();

        if ($postLike) {
            $postLike->delete();
            return response()->json(['message' => 'Like removed successfully.', 'liked' => '0']);
        } else {
            return response()->json(['message' => 'Like not found.', 'liked' => '0'], 404);
        }
    }
}
