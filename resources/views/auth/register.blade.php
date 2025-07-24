<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Our Community</title>
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
            padding: 40px;
            width: 100%;
            max-width: 480px;
            animation: slideUp 0.6s ease-out;
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
            margin-bottom: 35px;
        }

        .header h1 {
            color: #4a5568;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .header p {
            color: #718096;
            font-size: 16px;
        }

        .role-selector {
            display: flex;
            background: #f7fafc;
            border-radius: 12px;
            padding: 4px;
            margin-bottom: 25px;
            border: 2px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .role-option {
            flex: 1;
            text-align: center;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            color: #4a5568;
            position: relative;
            overflow: hidden;
        }

        .role-option.active {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .role-option:hover:not(.active) {
            background: #edf2f7;
            transform: translateY(-1px);
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 6px;
            color: #4a5568;
            font-weight: 500;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #fafafa;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-1px);
        }

        .password-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .submit-btn {
            width: 100%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 16px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            position: relative;
            overflow: hidden;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }

        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: #764ba2;
        }

        @media (max-width: 640px) {
            .container {
                padding: 30px 25px;
                margin: 10px;
            }
            
            .password-group {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .role-option {
                padding: 10px 15px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Join Our Community</h1>
            <p>Create your account and start your journey</p>
        </div>

        <form method="POST" action="{{ url('/register') }}" id="registrationForm">
            @csrf
            
            <!-- Role Selector -->
            <div class="role-selector">
                <div class="role-option active" onclick="selectRole('traveller')">
                    🧳 Traveller
                </div>
                <div class="role-option" onclick="selectRole('business')">
                    🏢 Business Owner
                </div>
            </div>
            
            <input type="hidden" name="role" id="selectedRole" value="traveller">

            <!-- Name Field -->
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" required>
            </div>

            <!-- Email Field -->
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" required>
            </div>

            <!-- Password Fields -->
            <div class="password-group">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                </div>
            </div>

            <button type="submit" class="submit-btn">
                Create Account
            </button>
        </form>

        <div class="login-link">
            <a href="{{ route('login') }}">Already have an account? Sign in</a>
        </div>
    </div>

    <script>
        function selectRole(role) {
            // Remove active class from all options
            const options = document.querySelectorAll('.role-option');
            options.forEach(option => option.classList.remove('active'));
            
            // Add active class to selected option
            event.target.classList.add('active');
            
            // Update hidden input value
            document.getElementById('selectedRole').value = role;
        }

        // Add some interactive feedback
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="password"]');
            
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-2px)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>
</html>