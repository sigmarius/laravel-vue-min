<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Http\Requests\MessageFormRequest;
use App\Models\Message;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        // принудительно авторизуем пользователя
        auth()->loginUsingId(122);

        return view('chat');
    }

    public function messages(): Collection|array
    {
        // лучше обернуть в json-resource
        return Message::query()
            ->with('user')
            ->get();
    }

    public function send(MessageFormRequest $request)
    {
        // user_id добавится из текущей сессии пользователя
        $message = $request->user()
            ->messages()
            ->create($request->validated());

        // вызываем событие MessageSent
        broadcast(new MessageSent($request->user(), $message));

        return $message;
    }
}
