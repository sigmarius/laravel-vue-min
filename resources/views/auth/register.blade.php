@extends('layout.app')
@section('title', 'Регистрация')

@section('content')
    <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
        <div class="bg-white w-96 shadow-xl rounded p-5">
            <h1 class="text-3xl font-medium">Регистрация</h1>

            <form action="{{ route('register_process') }}" method="post" class="space-y-5 mt-5">
                @csrf

                <input
                    type="text"
                    name="name"
                    class="w-full h-12 border border-gray-800 rounded px-3
                        @error('name') border-red-800 @enderror"
                    placeholder="Имя" />
                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input
                    type="email"
                    name="email"
                    class="w-full h-12 border border-gray-800 rounded px-3
                        @error('email') border-red-800 @enderror"
                    placeholder="Email" />
                @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input
                    type="password"
                    name="password"
                    class="w-full h-12 border border-gray-800 rounded px-3
                        @error('password') border-red-800 @enderror"
                    placeholder="Пароль" />
                @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input
                    type="password"
                    name="password_confirmation"
                    class="w-full h-12 border border-gray-800 rounded px-3
                    @error('password_confirmation') border-red-800 @enderror"
                    placeholder="Подтверждение пароля" />
                @error('password_confirmation')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <div>
                    <a href="{{ route('login') }}" class="font-medium text-blue-900 hover:bg-blue-300 rounded-md p-2">Есть аккаунт?</a>
                </div>

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Зарегистрироваться</button>
            </form>
        </div>
    </div>
@endsection
