<!DOCTYPE html>
<html>

<head>
    <title>{{ $title ?? 'App' }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    @livewireStyles
    @rappasoftTableStyles

    {{-- <link href="resources/css/app.css" rel="stylesheet"> --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}


</head>

<body class="dark:bg-stone-950">
    <div class="p-5">
        {{ $slot }}
    </div>



    @livewireScripts
    @rappasoftTableScripts

</body>

</html>
