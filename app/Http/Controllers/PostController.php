<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * @param $id
     * @param CommentFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @var Post $post
     */
    public function comment($id, CommentFormRequest $request)
    {
        $post = Post::findOrFail($id);

        $post->comments()->create($request->validated());

        return redirect()->route('posts.show', $id);
    }
}
