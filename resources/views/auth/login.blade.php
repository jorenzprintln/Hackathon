<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Back</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 50px 40px;
            width: 100%;
            max-width: 420px;
            animation: slideUp 0.6s ease-out;
            position: relative;
            overflow: hidden;
        }

        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header h1 {
            color: #4a5568;
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 12px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .header p {
            color: #718096;
            font-size: 16px;
            font-weight: 400;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #4a5568;
            font-weight: 500;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .form-group input {
            width: 100%;
            padding: 16px 18px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #fafafa;
            color: #4a5568;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .form-group input:focus + label,
        .form-group:hover label {
            color: #667eea;
        }

        .submit-btn {
            width: 100%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 18px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 15px;
            position: relative;
            overflow: hidden;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .forgot-password {
            text-align: center;
            margin: 20px 0;
        }

        .forgot-password a {
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-password a:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        .divider {
            margin: 30px 0;
            text-align: center;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e2e8f0;
        }

        .divider span {
            background: rgba(255, 255, 255, 0.95);
            padding: 0 20px;
            color: #718096;
            font-size: 14px;
        }

        .register-link {
            text-align: center;
            padding-top: 25px;
            border-top: 1px solid #e2e8f0;
        }

        .register-link p {
            color: #718096;
            margin-bottom: 10px;
        }

        .register-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            padding: 12px 24px;
            border: 2px solid #667eea;
            border-radius: 8px;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .register-link a:hover {
            background: #667eea;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .welcome-icon {
            font-size: 48px;
            margin-bottom: 20px;
            opacity: 0.8;
        }

        @media (max-width: 640px) {
            .container {
                padding: 40px 30px;
                margin: 10px;
            }
            
            .header h1 {
                font-size: 28px;
            }
            
            .form-group input {
                padding: 14px 16px;
            }
            
            .submit-btn {
                padding: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome Back</h1>
            <p>Sign in to your account</p>
        </div>

        <form method="POST" action="{{ url('/login') }}" id="loginForm">
            @csrf
            
            <!-- Email Field -->
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" required>
            </div>

            <!-- Password Field -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <!-- Forgot Password Link -->
            <div class="forgot-password">
                <a href="#">Forgot your password?</a>
            </div>

            <button type="submit" class="submit-btn">
                Sign In
            </button>
        </form>

        <div class="divider">

        </div>

        <div class="register-link">
            <a href="{{ route('register') }}">Create Account</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input[type="email"], input[type="password"]');
            
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-2px)';
                    this.parentElement.style.transition = 'transform 0.3s ease';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });

                // Add subtle loading animation on form submit
                const form = document.getElementById('loginForm');
                form.addEventListener('submit', function() {
                    const submitBtn = document.querySelector('.submit-btn');
                    submitBtn.innerHTML = 'Signing in...';
                    submitBtn.style.background = 'linear-gradient(135deg, #a0aec0, #718096)';
                });
            });

            // Add floating animation to the welcome icon
            const icon = document.querySelector('.welcome-icon');
            setInterval(() => {
                icon.style.transform = 'translateY(-5px)';
                setTimeout(() => {
                    icon.style.transform = 'translateY(0)';
                }, 1000);
            }, 2000);
        });
        const createAccountLink = document.querySelector('.register-link a');
createAccountLink.addEventListener('click', function(e) {
    e.preventDefault();

    // Show loading effect
    this.innerHTML = 'Redirecting...';
    this.style.background = 'linear-gradient(135deg, #a0aec0, #718096)';
    this.style.color = 'white';
    this.style.pointerEvents = 'none';

    // Simulate delay then redirect
    setTimeout(() => {
        window.location.href = this.getAttribute('href');
    }, 600); // Adjust delay as needed
});
    </script>
</body>
</html>