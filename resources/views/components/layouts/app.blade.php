<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proyecto ambiental</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="min-h-screen flex flex-col">
    
<x-navbar.nav/>

{{$slot}}

@livewireScripts
</body>
</html>