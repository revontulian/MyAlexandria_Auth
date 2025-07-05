<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyAlexandria - Your Digital Library</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', serif;
            line-height: 1.6;
            overflow-x: hidden;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: #e8dcc6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(26, 26, 46, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1000;
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #f4a261;
            text-decoration: none;
            position: relative;
        }

        .logo::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, #f4a261, #e76f51);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .logo:hover::after {
            transform: scaleX(1);
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            color: #e8dcc6;
            text-decoration: none;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-links a:hover {
            color: #f4a261;
        }

        .cta-button {
            background: linear-gradient(45deg, #f4a261, #e76f51);
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(244, 162, 97, 0.3);
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(244, 162, 97, 0.4);
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="books" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><rect width="2" height="15" x="2" y="2" fill="%23f4a261" opacity="0.1"/><rect width="2" height="12" x="6" y="5" fill="%23e76f51" opacity="0.1"/><rect width="2" height="18" x="10" y="1" fill="%23f4a261" opacity="0.1"/><rect width="2" height="14" x="14" y="3" fill="%23e76f51" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23books)"/></svg>');
            opacity: 0.1;
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: clamp(3rem, 8vw, 6rem);
            font-weight: bold;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #f4a261, #e76f51, #f4a261);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradient 3s ease infinite;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            max-width: 600px;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: linear-gradient(45deg, #f4a261, #e76f51);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 30px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(244, 162, 97, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(244, 162, 97, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: #e8dcc6;
            padding: 15px 30px;
            border: 2px solid #e8dcc6;
            border-radius: 30px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: #e8dcc6;
            color: #1a1a2e;
        }

        /* Features Section */
        .features {
            padding: 100px 0;
            background: linear-gradient(135deg, #0f3460 0%, #16213e 50%, #1a1a2e 100%);
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: #f4a261;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background: rgba(232, 220, 198, 0.1);
            padding: 2rem;
            border-radius: 20px;
            text-align: center;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(244, 162, 97, 0.2);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(244, 162, 97, 0.2);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #f4a261;
        }

        .feature-title {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #f4a261;
        }

        .feature-description {
            opacity: 0.9;
        }

        /* Book Shelf Animation */
        .book-shelf {
            position: fixed;
            right: -100px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1;
            opacity: 0.1;
        }

        .book {
            width: 30px;
            height: 200px;
            margin: 5px 0;
            border-radius: 3px;
            animation: bookFloat 4s ease-in-out infinite;
        }

        .book:nth-child(1) {
            background: linear-gradient(45deg, #f4a261, #e76f51);
            animation-delay: 0s;
        }

        .book:nth-child(2) {
            background: linear-gradient(45deg, #e76f51, #f4a261);
            animation-delay: 1s;
        }

        .book:nth-child(3) {
            background: linear-gradient(45deg, #f4a261, #e76f51);
            animation-delay: 2s;
        }

        @keyframes bookFloat {
            0%, 100% { transform: translateX(0px); }
            50% { transform: translateX(-20px); }
        }

        /* Footer */
        footer {
            background: #1a1a2e;
            padding: 2rem 0;
            text-align: center;
            border-top: 1px solid rgba(244, 162, 97, 0.2);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn-primary, .btn-secondary {
                width: 100%;
                max-width: 300px;
            }

            .book-shelf {
                display: none;
            }
        }

        /* Scroll animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .feature-card:nth-child(1) { animation-delay: 0.1s; }
        .feature-card:nth-child(2) { animation-delay: 0.2s; }
        .feature-card:nth-child(3) { animation-delay: 0.3s; }
    </style>
</head>
<body>
    <header>
        <nav class="container">
            <a href="#" class="logo">MyAlexandria</a>
            <ul class="nav-links">
                <li><a href="#features">Features</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <a href="#" class="cta-button">Get Started</a>
        </nav>
    </header>

    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">MyAlexandria</h1>
                <p class="hero-subtitle">
                    Your personal digital library where knowledge meets community. 
                    Collect, organize, and share your favorite books with fellow readers 
                    in a beautiful, intuitive platform.
                </p>
                <div class="hero-buttons">
                    <button class="btn-primary">Start Your Library</button>
                    <button class="btn-secondary">Explore Collections</button>
                </div>
            </div>
        </div>
    </section>

    <div class="book-shelf">
        <div class="book"></div>
        <div class="book"></div>
        <div class="book"></div>
    </div>

    <section class="features" id="features">
        <div class="container">
            <h2 class="section-title">Why Choose MyAlexandria?</h2>
            <div class="features-grid">
                <div class="feature-card fade-in">
                    <div class="feature-icon">📚</div>
                    <h3 class="feature-title">Personal Library</h3>
                    <p class="feature-description">
                        Create your own digital bookshelf with an intuitive interface 
                        that makes organizing your collection a joy.
                    </p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">🤝</div>
                    <h3 class="feature-title">Share & Discover</h3>
                    <p class="feature-description">
                        Connect with fellow book lovers, share recommendations, 
                        and discover new titles through our community features.
                    </p>
                </div>
                <div class="feature-card fade-in">
                    <div class="feature-icon">🎨</div>
                    <h3 class="feature-title">Beautiful Design</h3>
                    <p class="feature-description">
                        Experience reading in a new way with our elegant, 
                        user-friendly interface inspired by classic libraries.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2025 MyAlexandria. Crafted with ❤️ for book lovers everywhere.</p>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Header background on scroll
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(26, 26, 46, 0.98)';
            } else {
                header.style.background = 'rgba(26, 26, 46, 0.95)';
            }
        });

        // Animate elements on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        // Button interactions
        document.querySelectorAll('.btn-primary, .btn-secondary').forEach(button => {
            button.addEventListener('click', function() {
                // Add ripple effect
                const ripple = document.createElement('span');
                ripple.style.position = 'absolute';
                ripple.style.borderRadius = '50%';
                ripple.style.background = 'rgba(255, 255, 255, 0.6)';
                ripple.style.transform = 'scale(0)';
                ripple.style.animation = 'ripple 0.6s linear';
                ripple.style.left = '50%';
                ripple.style.top = '50%';
                ripple.style.width = '20px';
                ripple.style.height = '20px';
                ripple.style.marginLeft = '-10px';
                ripple.style.marginTop = '-10px';
                
                this.style.position = 'relative';
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Add CSS for ripple animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>