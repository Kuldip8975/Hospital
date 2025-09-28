<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechCare - Your Digital Health Partner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --primary: #2E8B57;
            --primary-light: #3CB371;
            --primary-dark: #1E6B47;
            --secondary: #6A5ACD;
            --accent: #FF6B6B;
            --light: #F8F9FA;
            --dark: #343A40;
            --gradient: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            --gradient-light: linear-gradient(135deg, var(--primary-light) 0%, var(--secondary) 100%);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark);
            overflow-x: hidden;
            background-color: #ffffff;
        }
        
        /* Enhanced Navigation */
        .navbar {
            background-color: rgba(255, 255, 255, 0.98);
            box-shadow: 0 2px 30px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            backdrop-filter: blur(10px);
        }
        
        .navbar.scrolled {
            padding: 10px 0;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.15);
        }
        
        .navbar-brand {
            font-weight: 800;
            font-size: 2rem;
            color: var(--primary) !important;
            display: flex;
            align-items: center;
            transition: all 0.3s;
        }
        
        .navbar-brand:hover {
            transform: scale(1.05);
        }
        
        .nav-link {
            font-weight: 600;
            margin: 0 12px;
            color: var(--dark) !important;
            transition: all 0.3s;
            position: relative;
            padding: 8px 0 !important;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background: var(--gradient);
            border-radius: 10px;
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }
        
        .nav-link:hover {
            color: var(--primary) !important;
            transform: translateY(-2px);
        }
        
        .btn-primary {
            background: var(--gradient);
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 700;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gradient-light);
            transition: all 0.6s;
            z-index: -1;
        }
        
        .btn-primary:hover::before {
            left: 0;
        }
        
        .btn-primary:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        
        /* Enhanced Hero Section */
        .hero-section {
            background: var(--gradient);
            color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,186.7C384,213,480,235,576,213.3C672,192,768,128,864,128C960,128,1056,192,1152,192C1248,192,1344,128,1392,96L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: cover;
            background-position: center;
            animation: wave 20s linear infinite;
        }
        
        @keyframes wave {
            0% { transform: translateX(0); }
            50% { transform: translateX(-30px); }
            100% { transform: translateX(0); }
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
        }
        
        .welcome-title {
            font-size: 4.5rem;
            font-weight: 800;
            margin-bottom: 25px;
            background: linear-gradient(45deg, #ffffff, #e6f7ff, #ffffff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            line-height: 1.1;
        }
        
        .hero-subtitle {
            font-size: 1.6rem;
            margin-bottom: 40px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            opacity: 0.9;
            line-height: 1.6;
        }
        
        .hero-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .btn-hero {
            padding: 15px 40px;
            font-size: 1.1rem;
            border-radius: 50px;
            font-weight: 700;
            transition: all 0.4s;
            position: relative;
            overflow: hidden;
        }
        
        .btn-hero-primary {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }
        
        .btn-hero-secondary {
            background: white;
            color: var(--primary);
            border: 2px solid white;
        }
        
        .btn-hero:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        
        .section-title {
            font-weight: 800;
            margin-bottom: 40px;
            position: relative;
            display: inline-block;
            font-size: 2.5rem;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 0;
            width: 80px;
            height: 5px;
            background: var(--gradient);
            border-radius: 5px;
        }
        
        /* Enhanced Feature Cards */
        .feature-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            border-top: 5px solid var(--primary);
            position: relative;
            overflow: hidden;
        }
        
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient);
            opacity: 0;
            transition: all 0.4s;
            z-index: 0;
        }
        
        .feature-card:hover::before {
            opacity: 0.05;
        }
        
        .feature-card:hover {
            transform: translateY(-15px) scale(1.03);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .feature-icon {
            font-size: 3.5rem;
            color: var(--primary);
            margin-bottom: 25px;
            transition: all 0.4s;
            position: relative;
            z-index: 1;
        }
        
        .feature-card:hover .feature-icon {
            transform: scale(1.2) rotate(5deg);
            color: var(--secondary);
        }
        
        .feature-card h4 {
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
        }
        
        .feature-card p {
            position: relative;
            z-index: 1;
            line-height: 1.7;
        }
        
        .about-section {
            padding: 120px 0;
            background-color: var(--light);
            position: relative;
        }
        
        .testimonial-section {
            padding: 120px 0;
            background: var(--gradient);
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .testimonial-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 40px 35px;
            margin: 15px;
            transition: all 0.4s;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .testimonial-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.2);
        }
        
        .testimonial-text {
            font-style: italic;
            margin-bottom: 25px;
            line-height: 1.7;
            font-size: 1.1rem;
        }
        
        .author {
            font-weight: 700;
            font-size: 1.1rem;
        }
        
        .footer {
            background-color: var(--dark);
            color: white;
            padding: 80px 0 30px;
            position: relative;
        }
        
        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient);
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s;
            display: block;
            margin-bottom: 12px;
            position: relative;
            padding-left: 0;
            transition: all 0.3s;
        }
        
        .footer-links a::before {
            content: '›';
            position: absolute;
            left: 0;
            opacity: 0;
            transition: all 0.3s;
        }
        
        .footer-links a:hover {
            color: white;
            padding-left: 15px;
        }
        
        .footer-links a:hover::before {
            opacity: 1;
        }
        
        .scroll-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: var(--gradient);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            transition: all 0.4s;
            z-index: 1000;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            font-size: 1.2rem;
        }
        
        .scroll-to-top.show {
            opacity: 1;
            transform: translateY(0);
        }
        
        .scroll-to-top:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }
        
        .welcome-section {
            text-align: center;
            padding: 120px 0;
            background: white;
            position: relative;
        }
        
        .stats-section {
            padding: 100px 0;
            background-color: var(--light);
            position: relative;
        }
        
        .stat-number {
            font-size: 3.5rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 10px;
            display: block;
        }
        
        .stat-item {
            text-align: center;
            padding: 30px 20px;
            transition: all 0.3s;
            border-radius: 15px;
        }
        
        .stat-item:hover {
            background: white;
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .carousel-control-prev, .carousel-control-next {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0.7;
            transition: all 0.3s;
        }
        
        .carousel-control-prev:hover, .carousel-control-next:hover {
            opacity: 1;
            background: rgba(255, 255, 255, 0.3);
        }
        
        .floating {
            animation: floating 6s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translate(0, 0px) rotate(0deg); }
            50% { transform: translate(0, 20px) rotate(5deg); }
            100% { transform: translate(0, -0px) rotate(0deg); }
        }
        
        .pulse {
            animation: pulse 3s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.7); }
            70% { transform: scale(1.05); box-shadow: 0 0 0 15px rgba(255, 255, 255, 0); }
            100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(255, 255, 255, 0); }
        }
        
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .typewriter {
            overflow: hidden;
            border-right: .15em solid var(--primary);
            white-space: nowrap;
            margin: 0 auto;
            letter-spacing: .15em;
            animation: typing 3.5s steps(40, end), blink-caret .75s step-end infinite;
        }
        
        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }
        
        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: var(--primary); }
        }
        
        /* Particle Background */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }
        
        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            animation: float 15s infinite linear;
        }
        
        @keyframes float {
            0% {
                transform: translateY(0) translateX(0) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-1000%) translateX(1000%) rotate(720deg);
                opacity: 0;
            }
        }
        
        /* Interactive Elements */
        .interactive-card {
            cursor: pointer;
            transition: all 0.4s;
        }
        
        .interactive-card:hover {
            transform: perspective(1000px) rotateX(5deg) rotateY(5deg) scale(1.03);
            box-shadow: 20px 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        /* Glow Effects */
        .glow {
            box-shadow: 0 0 20px rgba(46, 139, 87, 0.3);
            animation: glow 2s infinite alternate;
        }
        
        @keyframes glow {
            from {
                box-shadow: 0 0 20px rgba(46, 139, 87, 0.3);
            }
            to {
                box-shadow: 0 0 30px rgba(46, 139, 87, 0.6);
            }
        }
        
        /* Media Queries */
        @media (max-width: 1200px) {
            .welcome-title {
                font-size: 3.5rem;
            }
        }
        
        @media (max-width: 768px) {
            .hero-section {
                padding: 120px 0 80px;
            }
            
            .welcome-title {
                font-size: 2.8rem;
            }
            
            .hero-subtitle {
                font-size: 1.3rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .btn-hero {
                width: 100%;
                max-width: 300px;
            }
        }
        
        @media (max-width: 576px) {
            .welcome-title {
                font-size: 2.2rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .feature-card {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-heartbeat me-2"></i>TechCare
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary ms-lg-3" href="signUp.php"><i class="fas fa-user me-2"></i>User Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary ms-lg-3" href="doctorsignup.php"><i class="fas fa-user-md me-2"></i>Doctor Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="particles" id="particles"></div>
        <div class="container">
            <div class="hero-content">
                <h1 class="welcome-title mb-4" id="animated-title">Welcome to TechCare</h1>
                <p class="hero-subtitle">Your trusted digital health partner. Experience seamless healthcare management with our advanced appointment booking system.</p>
                <div class="hero-buttons mt-5">
                    <a href="signUp.php" class="btn btn-hero btn-hero-secondary pulse">Get Started Today</a>
                    <a href="#features" class="btn btn-hero btn-hero-primary">Explore Features</a>
                </div>
            </div>
        </div>
        
        <!-- Floating elements for visual interest -->
        <div class="floating" style="position: absolute; top: 15%; left: 8%; font-size: 3rem; opacity: 0.1;">
            <i class="fas fa-heartbeat"></i>
        </div>
        <div class="floating" style="position: absolute; top: 75%; right: 7%; font-size: 2.5rem; opacity: 0.1; animation-delay: 1s;">
            <i class="fas fa-stethoscope"></i>
        </div>
        <div class="floating" style="position: absolute; bottom: 15%; left: 12%; font-size: 2.8rem; opacity: 0.1; animation-delay: 2s;">
            <i class="fas fa-user-md"></i>
        </div>
        <div class="floating" style="position: absolute; top: 25%; right: 15%; font-size: 2.2rem; opacity: 0.1; animation-delay: 3s;">
            <i class="fas fa-ambulance"></i>
        </div>
    </section>

    <!-- Welcome Section -->
    <section class="welcome-section">
        <div class="container">
            <h2 class="section-title mb-5" data-aos="fade-up">Welcome to TechCare</h2>
            
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <p class="lead mb-4 text-center" data-aos="fade-up" data-aos-delay="200">
                        A revolutionary digital healthcare platform designed to transform how patients and doctors connect.
                    </p>
                    <div class="row mt-5">
                        <div class="col-md-6" data-aos="fade-right" data-aos-delay="400">
                            <p>TechCare bridges the gap between patients and healthcare providers with an intuitive, secure, and efficient platform. Our mission is to make quality healthcare accessible to everyone, everywhere.</p>
                            <p>With cutting-edge technology and user-centric design, we've created a seamless experience that puts your health first.</p>
                        </div>
                        <div class="col-md-6" data-aos="fade-left" data-aos-delay="400">
                            <p>Patients can easily find specialists, book appointments, and manage their healthcare journey, while doctors can efficiently organize their schedules and focus on providing exceptional care.</p>
                            <p>Join thousands of satisfied users who have transformed their healthcare experience with TechCare.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <h2 class="section-title text-center mb-5" data-aos="fade-up">Our Impact in Numbers</h2>
            
            <div class="row text-center">
                <div class="col-md-3 col-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-item">
                        <span class="stat-number" data-count="500">0</span>
                        <p>Happy Patients</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-item">
                        <span class="stat-number" data-count="50">0</span>
                        <p>Expert Doctors</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-item">
                        <span class="stat-number" data-count="15">0</span>
                        <p>Medical Specialties</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-item">
                        <span class="stat-number">24/7</span>
                        <p>Service Availability</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="about-section" id="features">
        <div class="container">
            <h2 class="section-title text-center" data-aos="fade-up">Why Choose TechCare?</h2>
            <p class="lead text-center mb-5" data-aos="fade-up" data-aos-delay="200">Experience healthcare management reimagined with our advanced features</p>
            
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card interactive-card">
                        <div class="feature-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h4>Easy Appointment Booking</h4>
                        <p>Book appointments with your preferred doctors in just a few clicks. Our intuitive interface makes scheduling hassle-free with real-time availability.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card interactive-card">
                        <div class="feature-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h4>Find Specialists</h4>
                        <p>Search and book appointments with qualified specialists based on your medical needs, location, and patient reviews.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card interactive-card">
                        <div class="feature-icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <h4>Smart Reminders</h4>
                        <p>Get timely reminders for your appointments via email and SMS. Never miss an important healthcare visit again.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-card interactive-card">
                        <div class="feature-icon">
                            <i class="fas fa-file-medical"></i>
                        </div>
                        <h4>Digital Health Records</h4>
                        <p>Securely access and manage your health records online. Share important medical information with your doctors easily.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature-card interactive-card">
                        <div class="feature-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <h4>Direct Communication</h4>
                        <p>Communicate directly with healthcare providers through our secure messaging system for follow-ups and queries.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="600">
                    <div class="feature-card interactive-card">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h4>Mobile Friendly</h4>
                        <p>Access all features on any device. Our responsive design ensures a seamless experience on smartphones, tablets, and desktops.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2 class="section-title">About TechCare</h2>
                    <p class="mb-4">TechCare is a revolutionary digital healthcare platform designed to transform how patients and doctors connect. We believe that everyone deserves access to quality healthcare, and technology should make that easier, not harder.</p>
                    <p class="mb-4">Our platform was created by a team of healthcare professionals and technology experts who understand the challenges faced by both patients and providers in today's healthcare landscape.</p>
                    <p class="mb-4">With a focus on user experience, security, and innovation, TechCare offers a comprehensive solution that benefits everyone in the healthcare ecosystem.</p>
                    <a href="signUp.php" class="btn btn-primary mt-3 glow">Get Started Today <i class="fas fa-arrow-right ms-2"></i></a>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                    <div class="position-relative">
                        <img src="https://images.unsplash.com/photo-1586773860418-d37222d8fce3?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="About TechCare" class="img-fluid rounded shadow interactive-card" style="transform: perspective(1000px) rotateY(-5deg);">
                        <div class="position-absolute top-0 start-0 w-100 h-100 rounded" style="background: var(--gradient); opacity: 0.1; z-index: -1;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonial-section" id="testimonials">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">What People Say About Healthcare</h2>
            
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-aos="fade-up">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="testimonial-card text-center">
                                    <p class="testimonial-text">"Wherever the art of Medicine is loved, there is also a love of Humanity. TechCare embodies this principle by making healthcare accessible to all."</p>
                                    <p class="author">- Hippocrates</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="testimonial-card text-center">
                                    <p class="testimonial-text">"In our job, you will never go home thinking that you haven't done something valuable. Platforms like TechCare amplify that impact."</p>
                                    <p class="author">- Suneel Dhand via Doc Thinx</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="testimonial-card text-center">
                                    <p class="testimonial-text">"People pay the doctor for his trouble; for his kindness, they still remain in his debt. TechCare helps bridge that connection."</p>
                                    <p class="author">- Seneca</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h4><i class="fas fa-heartbeat me-2"></i>TechCare</h4>
                    <p>Your trusted digital health partner. Book appointments with qualified doctors easily and efficiently.</p>
                    <div class="mt-4">
                        <a href="#" class="btn btn-primary me-2"><i class="fab fa-apple"></i></a>
                        <a href="#" class="btn btn-primary"><i class="fab fa-google-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4">
                    <h5>Quick Links</h5>
                    <div class="footer-links">
                        <a href="#home">Home</a>
                        <a href="#about">About Us</a>
                        <a href="#features">Features</a>
                        <a href="#testimonials">Testimonials</a>
                        <a href="signUp.php">User Login</a>
                        <a href="doctorsignup.php">Doctor Login</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mb-4">
                    <h5>Contact Us</h5>
                    <div class="footer-links">
                        <a href="#"><i class="fas fa-map-marker-alt me-2"></i>123 Health Street, Medical City</a>
                        <a href="#"><i class="fas fa-phone me-2"></i>+1 234 567 8900</a>
                        <a href="#"><i class="fas fa-envelope me-2"></i>info@techcare.com</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mb-4">
                    <h5>Follow Us</h5>
                    <div class="footer-links">
                        <a href="#"><i class="fab fa-facebook me-2"></i>Facebook</a>
                        <a href="#"><i class="fab fa-twitter me-2"></i>Twitter</a>
                        <a href="#"><i class="fab fa-instagram me-2"></i>Instagram</a>
                        <a href="#"><i class="fab fa-linkedin me-2"></i>LinkedIn</a>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-4">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2023 TechCare. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="text-light me-3">Privacy Policy</a>
                    <a href="#" class="text-light">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <div class="scroll-to-top" id="scrollToTop">
        <i class="fas fa-chevron-up"></i>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS (Animate On Scroll)
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Create particle background
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 30;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Random properties
                const size = Math.random() * 20 + 5;
                const posX = Math.random() * 100;
                const posY = Math.random() * 100;
                const delay = Math.random() * 15;
                const duration = Math.random() * 10 + 15;
                
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${posX}%`;
                particle.style.top = `${posY}%`;
                particle.style.animationDelay = `${delay}s`;
                particle.style.animationDuration = `${duration}s`;
                
                particlesContainer.appendChild(particle);
            }
        }
        
        // Animated counter for stats
        function animateCounters() {
            const counters = document.querySelectorAll('.stat-number[data-count]');
            
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-count'));
                const duration = 2000;
                const step = target / (duration / 16);
                let current = 0;
                
                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        counter.textContent = target;
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current);
                    }
                }, 16);
            });
        }
        
        // Scroll to top functionality
        const scrollToTopBtn = document.getElementById('scrollToTop');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollToTopBtn.classList.add('show');
            } else {
                scrollToTopBtn.classList.remove('show');
            }
            
            // Navbar effect
            if (window.scrollY > 50) {
                document.querySelector('.navbar').classList.add('scrolled');
            } else {
                document.querySelector('.navbar').classList.remove('scrolled');
            }
        });

        scrollToTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Typewriter effect for the main title
        document.addEventListener('DOMContentLoaded', function() {
            const title = document.getElementById('animated-title');
            title.classList.add('typewriter');
            
            // Remove the cursor after animation completes
            setTimeout(() => {
                title.style.borderRight = 'none';
            }, 3500);
            
            // Initialize particles
            createParticles();
            
            // Initialize counters when in view
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounters();
                        observer.unobserve(entry.target);
                    }
                });
            });
            
            observer.observe(document.querySelector('.stats-section'));
        });

        // Interactive card effects
        document.querySelectorAll('.interactive-card').forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const angleY = (x - centerX) / 20;
                const angleX = (centerY - y) / 20;
                
                card.style.transform = `perspective(1000px) rotateX(${angleX}deg) rotateY(${angleY}deg) scale(1.03)`;
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale(1)';
            });
        });

        // Add ripple effect to buttons
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = `${size}px`;
                ripple.style.left = `${x}px`;
                ripple.style.top = `${y}px`;
                ripple.classList.add('ripple');
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    </script>
</body>
</html>