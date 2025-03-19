<!DOCTYPE html>
<html data-theme="garden" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ !empty($title) ? $title : 'My Pink' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @livewireStyles
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="flex drawer">
        <input id="my-drawer" type="checkbox" class="drawer-toggle" />
        @include('layouts.sidebar')
        <!-- Page Content -->
        <div class=" h-screen main-content lg:ml-[18%]">
            <div class="drawer-content">
                @include('layouts.navbar')
                <main class="px-2 py-4 sm:px-6 lg:px-4">

                    @yield('content')
                </main>
            </div>
        </div>
        @include('layouts.sidebar-mobile')
    </div>
    @livewire('wire-elements-modal')
    @livewireScripts
</body>

</html>
