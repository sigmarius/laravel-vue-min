<?php

namespace App\Http\Controllers\Admin;

use App\Actions\AddPostThumbnailAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostFormRequest $request, AddPostThumbnailAction $action)
    {
        $data = $action->handle($request);

        Post::create($data);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        // работа от текущей модели с польлзователем
        if (auth('admin')->user()->can('update-post', $post)) {
            abort(403, 'Вам не разрешено выполнять это действие');
        }

        // работа с Gate как с объектом
        $gate = Gate::inspect('update-post', $post);

        if ($gate->authorize()) {
            // что-то делаем
        }

        // работает также, как и can во view
        $this->authorize('update-post', $post);

        if (!Gate::allows('update-post', $post)) {
            abort(403, 'Вам не разрешено выполнять это действие');
        }

        return view('admin.posts.create', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostFormRequest $request, AddPostThumbnailAction $action, string $id)
    {
        $post = Post::findOrFail($id);

        $data = $action->handle($request);

        $post->update($data);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);

        return redirect()->route('admin.posts.index');
    }
}
