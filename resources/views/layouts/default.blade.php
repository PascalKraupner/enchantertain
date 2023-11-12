<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="/favicon.png"/>
        <link href="/css/app.css" rel="stylesheet">
        <script defer src="/js/app.js"></script>
        <title>Enchantertain</title>
        @livewireStyles
    </head>
    <body class="antialiased font-sans bg-zinc-900 text-white flex flex-col min-h-screen">
        @include('includes.header')
       <main class="container mx-auto px-4 mb-10 flex-grow">
            @yield('content')
       </main>
       <div class="bg-white">
        @include('includes.footer')
       </div>
       @livewireScripts
    </body>
</html>
