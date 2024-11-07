<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <title>Laravel</title>

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full pb-3 font-sans dark:bg-black dark:text-white/90">
    <div class="">
        <header class="font-medium">
            <nav class="border-white/45 container flex items-center justify-between border-b p-4">
                <div>
                    <a class="flex gap-1.5" href="/">
                        <i class="fa fa-2x fa-github"></i>
                        <div class="space-0 flex flex-col content-center leading-4">
                            <span>Jobs</span>
                            <span>Hunt</span>
                        </div>
                    </a>
                </div>
                <div class="space-x-6 font-bold">
                    <a href="#">Jobs</a>
                    <a href="#">Careers</a>
                    <a href="#">Salaries</a>
                    <a href="#">Companies</a>
                </div>
                <div>
                    @auth
                        <div class="flex items-center gap-2.5 flex-wrap">
                            <a href="/jobs/create">Post a Job</a>
                        <form action="/logout" method="POST">
                            @method('DELETE')
                            @csrf
                            <x-forms.button>Log out</x-forms.button>
                        </form>
                        </div>
                    @endauth
                    @guest
                        <div class="space-x-6 font-bold">
                            <a href="/register">Sign up</a>
                            <a href="/login">Log in</a>
                        </div>
                    @endguest
                </div>
            </nav>
        </header>
        <main>
            <div class="container mt-10">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>
