<?php

namespace App\Actions;

use App\Http\Requests\Admin\PostFormRequest;

class AddPostThumbnailAction
{
    public function handle(PostFormRequest $request)
    {
        $data = $request->validated();

        if ($request->has('thumbnail')) {
            $thumbnail = str_replace('public/posts', '', $request
                ->file('thumbnail')
                ->store('public/posts'));
            $data['thumbnail'] = $thumbnail;
        }

        return $data;
    }
}
