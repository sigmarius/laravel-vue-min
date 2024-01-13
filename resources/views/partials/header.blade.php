<nav class="font-sans flex flex-col text-center content-center sm:flex-row sm:text-left sm:justify-between py-2 px-6 bg-white shadow sm:items-baseline w-full">
    <div class="mb-2 sm:mb-0 inner">

        <a href="{{ route('home') }}" class="text-2xl no-underline text-grey-darkest hover:text-blue-dark font-sans font-bold">Laravel Blade</a><br>
        <span class="text-xs text-grey-dark">Классическое приложение</span>

    </div>

    <div class="sm:mb-0 self-center">
        <a href="{{ route('login') }}" class="text-md no-underline text-grey-darker hover:text-blue-dark ml-2 px-1">Войти</a>
    </div>
</nav>
