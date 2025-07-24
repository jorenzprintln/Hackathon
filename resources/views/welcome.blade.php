<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to ExplorePH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', system-ui, sans-serif;
            background: #fafafa;
            line-height: 1.6;
            color: #333;
        }

        /* Header */
        .header {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
        }

        .nav-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .btn-primary {
            background: #4f46e5;
            color: white;
        }

        .btn-primary:hover {
            background: #4338ca;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: transparent;
            color: #4f46e5;
            border: 1px solid #e5e7eb;
        }

        .btn-secondary:hover {
            background: #f9fafb;
            border-color: #4f46e5;
        }

        /* Hero Section */
        .hero {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            min-height: 70vh;
        }

        .hero-content h1 {
            font-size: 3rem;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 1.5rem;
            line-height: 1.1;
        }

        .hero-content .subtitle {
            font-size: 1.25rem;
            color: #6b7280;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .btn-large {
            padding: 1rem 2rem;
            font-size: 1rem;
        }

        .hero-stats {
            display: flex;
            gap: 2rem;
            margin-top: 2rem;
        }

        .stat {
            text-align: center;
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: #4f46e5;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #6b7280;
        }

        .hero-visual {
            border-radius: 20px;
            height: 400px;
            position: relative;
            overflow: hidden;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 18px;
        }

        .image-placeholder {
            text-align: center;
            color: #9ca3af;
            padding: 2rem;
        }

        .image-placeholder-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            display: block;
            opacity: 0.5;
        }

        .image-placeholder-text {
            font-size: 1.1rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .image-placeholder-subtext {
            font-size: 0.9rem;
            opacity: 0.7;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        /* Features Section */
        .features {
            background: white;
            padding: 4rem 0;
        }

        .features-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .features-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .features-header h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 1rem;
        }

        .features-header p {
            font-size: 1.1rem;
            color: #6b7280;
            max-width: 600px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            padding: 2rem;
            border-radius: 16px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-color: #4f46e5;
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .feature-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }

        .feature-desc {
            color: #6b7280;
            line-height: 1.6;
        }

        /* CTA Section */
        .cta {
            background: #1f2937;
            color: white;
            padding: 4rem 0;
            text-align: center;
        }

        .cta-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .cta h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .cta p {
            font-size: 1.1rem;
            color: #d1d5db;
            margin-bottom: 2rem;
        }

        .cta .btn-primary {
            background: #4f46e5;
            padding: 1rem 2rem;
            font-size: 1.1rem;
        }

        .cta .btn-primary:hover {
            background: #4338ca;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav {
                padding: 0 1rem;
            }

            .nav-buttons {
                flex-direction: column;
                gap: 0.5rem;
            }

            .hero {
                grid-template-columns: 1fr;
                gap: 2rem;
                padding: 2rem 1rem;
                text-align: center;
            }

            .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .hero-stats {
                justify-content: center;
            }

            .hero-visual {
                height: 300px;
                order: -1;
            }

            .features-container,
            .cta-container {
                padding: 0 1rem;
            }

            .features-header h2,
            .cta h2 {
                font-size: 2rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="nav">
            <div class="logo-section">
                <div class="logo-icon">🏝️</div>
                <div class="logo-text">ExplorePH</div>
            </div>
            <div class="nav-buttons">
                <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Discover Amazing Places in the Philippines</h1>
            <p class="subtitle">Share your travel experiences and connect with fellow adventurers. Find hidden gems and create unforgettable memories across the beautiful islands of the Philippines.</p>
            
            <div class="hero-buttons">
                <a href="{{ route('register') }}" class="btn btn-primary btn-large">Get Started</a>
                <a href="#features" class="btn btn-secondary btn-large">Learn More</a>
            </div>

            <div class="hero-stats">
                <div class="stat">
                    <div class="stat-number">1000+</div>
                    <div class="stat-label">Destinations</div>
                </div>
                <div class="stat">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Travel Stories</div>
                </div>
                <div class="stat">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Local Guides</div>
                </div>
            </div>
        </div>

        <div class="hero-visual">
            <img src="{{ asset('assets/images/visayas.jpg') }}" alt="Beautiful Visayas Destination" class="hero-image">
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="features-container">
            <div class="features-header">
                <h2>Why Choose ExplorePH?</h2>
                <p>Everything you need to discover, share, and manage your Philippine travel experiences in one simple platform.</p>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">📸</div>
                    <h3 class="feature-title">Share Your Stories</h3>
                    <p class="feature-desc">Upload photos and share your travel experiences with a community of fellow Filipino adventurers and international visitors.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🗺️</div>
                    <h3 class="feature-title">Discover Hidden Gems</h3>
                    <p class="feature-desc">Find off-the-beaten-path destinations and local favorites recommended by travelers and locals.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🏢</div>
                    <h3 class="feature-title">Business Tools</h3>
                    <p class="feature-desc">Tourism business owners can create profiles, showcase their services, and connect with potential customers.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="cta-container">
            <h2>Ready to Start Exploring?</h2>
            <p>Join thousands of travelers discovering the beauty of the Philippines. Share your stories, find new adventures, and connect with the community.</p>
            <a href="{{ route('register') }}" class="btn btn-primary btn-large">Join ExplorePH Today</a>
        </div>
    </section>
</body>
</html>