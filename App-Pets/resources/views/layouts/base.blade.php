<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('icons-App-Pets/f24.jpg') }}">
    
    @vite(['resources/css/app.scss'])

</head>
<body>
      @yield('content')  
</body>
</html>