<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
    @vite(['resources/js/app.js' , 'resources/css/app.css'])
</head>
<body>
    <x-navbar></x-navbar>
    {{$slot}}
    <x-footer></x-footer>
</body>
</html>