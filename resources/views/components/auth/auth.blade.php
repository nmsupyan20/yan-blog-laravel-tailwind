<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/feather-icons"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title> {{ $titlePage }} </title>
</head>

<body class="bg-gray-100 scroll-smooth overflow-x-hidden">

    <div>
        {{ $slot }}
    </div>

    <script>
        feather.replace();
    </script>
    <script src={{ asset('js/dashboard.js') }}></script>
</body>

</html>