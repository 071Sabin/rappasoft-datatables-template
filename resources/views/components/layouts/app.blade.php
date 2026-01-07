<!DOCTYPE html>
<html>

<head>
    <title>{{ $title ?? 'App' }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    @livewireStyles
    {{-- <link href="resources/css/app.css" rel="stylesheet"> --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}


</head>

<body class="dark:bg-stone-900">
    <div class="p-5">
        {{ $slot }}
    </div>

    @livewireScripts
</body>

</html>
