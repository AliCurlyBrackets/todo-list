<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Create Todo List </title>
    <link rel="stylesheet" href="{{ asset("assets/style.css") }}">
    @livewireStyles
</head>
<body>
    <div>
        @livewire("todo-list")
    </div>
    @livewireScripts

    {{-- <script src="{{ asset('assets/js/main.js') }}"></script> --}}
</body>
</html>
