<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @livewireStyles
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>

    <livewire:nav-bar />
    @if (session()->has('message'))
        <div>{{ session('message') }}</div>
    @endif
    <div class="lg:mx-12 mt-5">
        <livewire:table-enregistrement />
    </div>
    @livewireScripts
</body>

</html>
