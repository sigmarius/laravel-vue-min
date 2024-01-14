<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactForm;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('welcome', compact('posts'));
    }

    public function about()
    {
        return Inertia::render('About', [
            'title' => 'About page'
        ]);
    }

    public function showContactForm()
    {
        return view('contact_form');
    }

    public function contactForm(ContactFormRequest $request)
    {
        Mail::to('webroom.pro@yandex.ru')
            ->send(new ContactForm($request->validated()));

        return redirect()->route('home');
    }
}
