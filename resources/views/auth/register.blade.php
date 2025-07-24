<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
<h2>Register</h2>
<form method="POST" action="{{ url('/register') }}">
    @csrf
    <label>Name:</label>
    <input type="text" name="name" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Password:</label>
    <input type="password" name="password" required><br>

    <label>Confirm Password:</label>
    <input type="password" name="password_confirmation" required><br>

    <label>Role:</label>
    <select name="role" required>
        <option value="traveller">Traveller</option>
        <option value="business">Business Owner</option>
    </select><br>

    <button type="submit">Register</button>
</form>
<a href="{{ route('login') }}">Already have an account?</a>
</body>
</html>
