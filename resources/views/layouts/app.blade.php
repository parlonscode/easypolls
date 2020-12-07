<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Polls</title>
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
</head>
<body>
    @include('layouts.partials._nav')

    @include('layouts.partials._flash_messages')

    <main role="main">
        @yield('content')
    </main>

    @livewireScripts
    @livewireChartsScripts
</body>
</html>
