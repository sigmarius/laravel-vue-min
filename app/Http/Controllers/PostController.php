<?php

namespace App\Http\Controllers;

use App\Events\CommentCreated;
use App\Http\Requests\CommentFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
    public function addComment($id, CommentFormRequest $request)
    {
        $post = Post::findOrFail($id);

        $comment = $post->comments()->create($request->validated());

        event(new CommentCreated($comment, $post->title));

        return redirect()->route('posts.show', $id);
    }
}
