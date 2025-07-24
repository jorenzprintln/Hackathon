<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to ExplorePH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Basic Styling (Optional: Use Bootstrap for quick UI improvement) -->
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background: #f0f0f0;
            padding: 100px;
        }
        h1 {
            font-size: 2.5rem;
        }
        .buttons {
            margin-top: 30px;
        }
        .buttons a {
            display: inline-block;
            margin: 0 15px;
            padding: 12px 24px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .buttons a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <h1>ExplorePH: Discover & Share Tourist Spot Stories</h1>
    <p>Share your travel experiences or manage your tourist business profile.</p>

    <div class="buttons">
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    </div>
</body>
</html>
