<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
        <title>{{ config('app.name') }} - @yield('title')</title>
    </head>
    <body>
        @include('parts/hearder')
        @yield('content')
</html>
    <footer>
    </footer>
</html>