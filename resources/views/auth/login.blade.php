<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Login</h2>
<form method="POST" action="{{ url('/login') }}">
    @csrf
    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br>

    <button type="submit">Login</button>
</form>
<a href="{{ route('register') }}">Create an account</a>
</body>
</html>
