<nav class="font-sans flex flex-col text-center content-center sm:flex-row sm:text-left sm:justify-between py-2 px-6 bg-white shadow sm:items-baseline w-full">
    <div class="mb-2 sm:mb-0 inner">

        <a href="{{ route('home') }}" class="text-2xl no-underline text-grey-darkest hover:text-blue-dark font-sans font-bold">Laravel Blade</a><br>
        <span class="text-xs text-grey-dark">Классическое приложение</span>

    </div>

    <div class="ml-10 flex items-baseline space-x-4">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        @auth('web')
            <a href="{{ route('users.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Users</a>
        @endauth
        <a href="{{ route('posts.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Posts</a>
        <a href="{{ route('about') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">About</a>
        <a href="{{ route('contacts') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Contacts</a>
    </div>

    <div class="sm:mb-0 self-center">
        @auth('web')
            <a href="{{ route('logout') }}" class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1">Выйти</a>
        @endauth

        @guest('web')
            <a href="{{ route('login') }}" class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1">Войти</a>
        @endguest
    </div>
</nav>
