<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Script feather icon --}}
    <script src="https://unpkg.com/feather-icons"></script>
    {{-- Bundling Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Yan Blog</title>
</head>

<body class="bg-gray-50 scroll-smooth overflow-x-hidden">

    {{-- Navbar dari landing page --}}
    <nav class="bg-purple-800 border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <h1 class="text-yellow-400 text-xl font-bold">Yan Blog</h1>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-yellow-400 ring-2 ring-yellow-400 hover:text-purple-800 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-gray-500"
                aria-controls="navbar-default" aria-expanded="false">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-yellow-400 rounded-lg bg-purple-800 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-purple-800">
                    <li>
                        <a href="/posts"
                            class="flex items-center gap-x-2 w-full py-2 px-3 text-yellow-400 rounded-sm hover:bg-yellow-400 hover:text-purple-800 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">
                            <i data-feather="file-text"></i>
                            <span>Posts</span>
                        </a>
                    </li>
                    <li>
                        <a href="/settings"
                            class="flex items-center w-full gap-x-2 py-2 px-3 text-yellow-400 rounded-sm hover:bg-yellow-400 hover:text-purple-800 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">
                            <i data-feather="settings"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="/login"
                            class="flex items-center w-full gap-x-2 py-2 px-3 text-yellow-400 rounded-sm hover:bg-yellow-400 hover:text-purple-800 md:hover:bg-transparent md:border-0 md:hover:text-white md:p-0">
                            <i data-feather="log-in"></i>
                            <span>Login</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- Akhir dari navbar --}}

    <div class="content">
        {{ $slot }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script>
        feather.replace();
    </script>
    <script src={{ asset('js/dashboard.js') }}></script>
</body>

</html>