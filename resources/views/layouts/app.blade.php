<!DOCTYPE html>
<html>
<head>
    <title>Tourist Dashboard</title>
</head>
<body>
    <nav>
        <a href="{{ route('dashboard') }}">Dashboard</a> |
        <a href="{{ route('tourist.feed') }}">Tourist Feed</a> |
        <a href="{{ route('logout') }}">Logout</a>
    </nav>
    <hr>

    <div>
        @yield('content')
    </div>
</body>
</html>
