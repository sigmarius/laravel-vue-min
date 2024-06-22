@extends('layout.admin')
@section('title', isset($user) ? "Редактировать администратора id {$user->id}" : 'Добавить администратора')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">{{ isset($user) ? "Редактировать администратора id {$user->id}" : 'Добавить администратора' }}</h3>

        <div class="mt-8">
            <form
                action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store')}}"
                method="post"
                enctype="multipart/form-data"
                class="space-y-5 mt-5"
            >
                @csrf

                @if(isset($user))
                    @method('PATCH')
                @endif

                <input
                    name="name"
                    value="{{ $user->name ?? '' }}"
                    type="text"
                    class="w-full h-12 border border-gray-800 rounded px-3
                        @error('name') border-red-800 @enderror"
                    placeholder="Имя" />
                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input
                    name="email"
                    value="{{ $user->email ?? '' }}"
                    type="email"
                    class="w-full h-12 border border-gray-800 rounded px-3 @error('email') border-red-800 @enderror"
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

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
