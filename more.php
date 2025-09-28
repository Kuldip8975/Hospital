<?php
include "includes/header.php";
include "includes/usernavbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Doctor's Appointment</title>
    <style>
        /* Main Container */
        .services-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 80px 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            max-width: 1200px;
            width: 100%;
        }
        
        /* Service Cards */
        .service-card {
            background: white;
            border-radius: 16px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }
        
        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .service-card a {
            text-decoration: none;
            color: inherit;
            display: block;
        }
        
        /* Card Images */
        .card-img {
            height: 120px;
            width: 120px;
            object-fit: contain;
            margin: 0 auto 20px;
            transition: all 0.4s ease;
            filter: grayscale(0.3) opacity(0.8);
        }
        
        .service-card:hover .card-img {
            filter: grayscale(0) opacity(1);
            transform: scale(1.1);
        }
        
        /* Card Content */
        .service-card h2 {
            color: #333;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 15px;
            transition: color 0.3s;
        }
        
        .service-card:hover h2 {
            color: #2575fc;
        }
        
        .service-description {
            color: #666;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        
        .service-features {
            list-style: none;
            padding: 0;
            margin: 20px 0;
            text-align: left;
        }
        
        .service-features li {
            padding: 8px 0;
            color: #555;
            position: relative;
            padding-left: 25px;
        }
        
        .service-features li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #2575fc;
            font-weight: bold;
        }
        
        .service-badge {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            display: inline-block;
            margin-top: 10px;
        }
        
        /* Ambulance Specific */
        .ambulance-card {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
            color: white;
        }
        
        .ambulance-card::before {
            background: linear-gradient(135deg, #ff8e8e 0%, #ff6b6b 100%);
        }
        
        .ambulance-card h2,
        .ambulance-card .service-description,
        .ambulance-card .service-features li {
            color: white;
        }
        
        .ambulance-card .service-features li::before {
            color: #ffeb3b;
        }
        
        .ambulance-card .service-badge {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }
        
        /* Lab Test Specific */
        .lab-card {
            background: linear-gradient(135deg, #4ecdc4 0%, #44a08d 100%);
            color: white;
        }
        
        .lab-card::before {
            background: linear-gradient(135deg, #6ef0e6 0%, #4ecdc4 100%);
        }
        
        .lab-card h2,
        .lab-card .service-description,
        .lab-card .service-features li {
            color: white;
        }
        
        .lab-card .service-features li::before {
            color: #ffeb3b;
        }
        
        .lab-card .service-badge {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }
        
        /* Login Prompt */
        .login-prompt {
            text-align: center;
            padding: 60px 20px;
        }
        
        .login-prompt h1 {
            color: #333;
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 700;
        }
        
        .login-prompt p {
            color: #666;
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        
        .btn-login {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s;
            display: inline-block;
        }
        
        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(37, 117, 252, 0.3);
            color: white;
        }
        
        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .service-card {
            animation: fadeInUp 0.6s ease;
        }
        
        .service-card:nth-child(1) {
            animation-delay: 0.1s;
        }
        
        .service-card:nth-child(2) {
            animation-delay: 0.2s;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .services-grid {
                grid-template-columns: 1fr;
                max-width: 400px;
            }
            
            .service-card {
                padding: 30px 20px;
            }
            
            .card-img {
                height: 100px;
                width: 100px;
            }
            
            .service-card h2 {
                font-size: 1.5rem;
            }
        }
        
        @media (max-width: 480px) {
            .services-container {
                padding: 60px 15px;
            }
            
            .login-prompt h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>

<div class="services-container">
    <?php if (isset($_COOKIE['user_email'])): ?>
        <div class="services-grid">
            <!-- Ambulance Service Card -->
            <div class="service-card ambulance-card wow fadeInUp">
                <a href="ambulance.php">
                    <img src="assets/img/ambulance.png" class="card-img" alt="Ambulance Service">
                    <h2>Emergency Ambulance</h2>
                    <p class="service-description">24/7 emergency ambulance service with trained medical staff</p>
                    
                    <ul class="service-features">
                        <li>24/7 Availability</li>
                        <li>Trained Medical Staff</li>
                        <li>Quick Response Time</li>
                        <li>Advanced Life Support</li>
                    </ul>
                    
                    <span class="service-badge">Emergency Service</span>
                </a>
            </div>
            
            <!-- Lab Test Service Card -->
            <div class="service-card lab-card wow fadeInUp">
                <a href="testLab.php">
                    <img src="assets/img/lab.png" class="card-img" alt="Lab Test Service">
                    <h2>Medical Lab Tests</h2>
                    <p class="service-description">Comprehensive medical laboratory tests with accurate results</p>
                    
                    <ul class="service-features">
                        <li>Blood Tests</li>
                        <li>Urine Analysis</li>
                        <li>Pathology Tests</li>
                        <li>Quick Results</li>
                    </ul>
                    
                    <span class="service-badge">Diagnostic Service</span>
                </a>
            </div>
            
            <!-- Additional Service Cards can be added here -->
            <!--
            <div class="service-card">
                <a href="pharmacy.php">
                    <img src="assets/img/pharmacy.png" class="card-img" alt="Pharmacy">
                    <h2>Pharmacy</h2>
                    <p class="service-description">Get your medicines delivered to your doorstep</p>
                    <span class="service-badge">Medicine Delivery</span>
                </a>
            </div>
            -->
        </div>
    <?php else: ?>
        <div class="login-prompt wow fadeInUp">
            <i class="fas fa-lock" style="font-size: 4rem; color: #6a11cb; margin-bottom: 20px;"></i>
            <h1>Access Required</h1>
            <p>Please log in to access our healthcare services</p>
            <a href="signIn.php" class="btn-login">
                <i class="fas fa-sign-in-alt me-2"></i>Sign In to Continue
            </a>
        </div>
    <?php endif; ?>
</div>

<?php
include "includes/footer.php";
?>
</body>
</html>