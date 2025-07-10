<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/feather-icons"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
    <title>Yan Blog Dashboard</title>
</head>

<body class="bg-gray-100 scroll-smooth overflow-x-hidden">

    {{-- Bagian Navbar --}}
    <nav class="fixed top-0 z-50 w-full bg-purple-800 shadow-lg">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-between w-full rtl:justify-end">
                    <h1 class="font-bold text-yellow-400 text-xl">Yan Blog</h1>
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-yellow-400 hover:text-purple-800 ring-2 ring-yellow-400 hover:ring-gray-200 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-black">
                        <i data-feather="menu"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    {{-- Akhir bagian navbar --}}

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="/categories"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <i data-feather="grid"></i>
                        <span class="ms-3">Categories</span>
                    </a>
                </li>
                <a href="/posts" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <i data-feather="file-text"></i>
                    <span class="ms-3">Posts</span>
                </a>
                </li>
                <li>
                    <a href="/users"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i data-feather="users"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                    </a>
                </li>
                <li>
                    <a href="/settings"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i data-feather="settings"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Settings</span>
                    </a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post" class="inline">
                        @csrf
                        <button class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <i data-feather="log-out"></i>
                            <span class=" flex-1 ms-3 whitespace-nowrap">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="p-3 border-2 border-gray-200 bg-white border-solid rounded-lg mt-14 mb-5">
            <h1 class="text-gray-900 font-bold text-lg"> {{ $titlePage }} </h1>
        </div>
        <div>
            {{ $slot }}
        </div>
    </div>


    <script>
        feather.replace();
    </script>
    <script>
        $('.summernote').summernote({
            placeholder: 'Tulis isi postingan',
            tabsize: 2,
            height: 180,
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['view', ['fullscreen', 'help']]
            ]
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src={{ asset('js/dashboard.js') }}></script>
</body>

</html>