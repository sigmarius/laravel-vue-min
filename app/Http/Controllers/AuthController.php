<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Jobs\ForgotUserPasswordJob;
use App\Mail\ForgotPasswordForm;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(LoginFormRequest $request): RedirectResponse
    {
        if (!auth('web')->attempt($request->validated())) {
            return redirect()
                ->route('login')
                ->withErrors(['email' => 'Пользователь не найден, либо данные введены неверно']);
        }

        return redirect()->route('home');
    }

    public function logout(): RedirectResponse
    {
        auth('web')->logout();

//        очищаем сессию и сбрасываем все данные
        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', 'string', 'unique:users,email'],
            'password' => ['required', 'confirmed']
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        if ($user) {
            auth('web')->login($user);
        }

        return redirect(route('home'));
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot_password');
    }

    public function forgotPassword(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'string', 'exists:users'],
        ]);

        $user = User::where(['email' => $data['email']])->first();

        $password = uniqid();

        $user->password = bcrypt($password);
        $user->save();

        dispatch(new ForgotUserPasswordJob($user, $password));

        return redirect(route('home'));
    }
}
