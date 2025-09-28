<?php
include "includes/header.php";
include "includes/navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard - Doctor's Appointment</title>
    <style>
        /* Hero Section Improvements */
        .page-hero {
            position: relative;
            height: 70vh;
            display: flex;
            align-items: center;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        
        .hero-section {
            width: 100%;
            text-align: center;
        }
        
        .subhead {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 1rem;
            display: block;
            font-weight: 300;
            letter-spacing: 1px;
        }
        
        .display-4 {
            font-size: 3.5rem;
            color: white;
            margin-bottom: 2rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }
        
        /* Stats Section */
        .stats-section {
            padding: 80px 0;
            background: #f8f9fa;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }
        
        .stat-card {
            background: white;
            padding: 30px 25px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border-left: 4px solid #667eea;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }
        
        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 5px;
        }
        
        .stat-label {
            color: #6c757d;
            font-size: 1rem;
            font-weight: 500;
        }
        
        /* Quick Actions */
        .actions-section {
            padding: 60px 0;
            background: white;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .section-title h2 {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .section-title p {
            color: #6c757d;
            font-size: 1.1rem;
        }
        
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }
        
        .action-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid #f1f3f4;
        }
        
        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
            border-color: #667eea;
        }
        
        .action-icon {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #667eea;
        }
        
        .action-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        
        .action-description {
            color: #6c757d;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        
        .btn-outline-primary {
            border: 2px solid #667eea;
            color: #667eea;
            background: transparent;
            padding: 10px 25px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-outline-primary:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
        }
        
        /* Welcome Message */
        .welcome-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 0;
            text-align: center;
        }
        
        .welcome-content h3 {
            font-size: 1.8rem;
            margin-bottom: 10px;
            font-weight: 600;
        }
        
        .welcome-content p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 0;
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
        
        .wow {
            animation: fadeInUp 0.8s ease;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .display-4 {
                font-size: 2.5rem;
            }
            
            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 20px;
            }
            
            .actions-grid {
                grid-template-columns: 1fr;
            }
            
            .stat-card, .action-card {
                padding: 25px 20px;
            }
        }
        
        @media (max-width: 576px) {
            .page-hero {
                height: 60vh;
            }
            
            .display-4 {
                font-size: 2rem;
            }
            
            .subhead {
                font-size: 1.1rem;
            }
            
            .btn-primary {
                padding: 12px 30px;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

<div class="page-hero bg-image overlay-dark" style="background-image: url(assets/img/bg_image_1.jpg);">
    <div class="hero-section">
        <div class="container text-center wow zoomIn">
            <span class="subhead">Welcome to Your Medical Dashboard</span>
            <h1 class="display-4">Doctor's Dashboard</h1>
            <p class="text-white mb-4" style="font-size: 1.2rem; opacity: 0.9;">Manage your appointments and patient care efficiently</p>
            <a href="patient_request.php" class="btn btn-primary">
                <i class="fas fa-list-alt me-2"></i>View Patient Requests
            </a>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-card wow fadeInUp" data-wow-delay="0.1s">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number" id="patientCount">0</div>
                <div class="stat-label">Total Patients</div>
            </div>
            
            <div class="stat-card wow fadeInUp" data-wow-delay="0.2s">
                <div class="stat-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="stat-number" id="appointmentCount">0</div>
                <div class="stat-label">Today's Appointments</div>
            </div>
            
            <div class="stat-card wow fadeInUp" data-wow-delay="0.3s">
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-number" id="pendingCount">0</div>
                <div class="stat-label">Pending Requests</div>
            </div>
            
            <div class="stat-card wow fadeInUp" data-wow-delay="0.4s">
                <div class="stat-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class="stat-number">4.8</div>
                <div class="stat-label">Average Rating</div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions Section -->
<div class="actions-section">
    <div class="container">
        <div class="section-title wow fadeInUp">
            <h2>Quick Actions</h2>
            <p>Manage your medical practice efficiently</p>
        </div>
        
        <div class="actions-grid">
            <div class="action-card wow fadeInUp" data-wow-delay="0.1s">
                <div class="action-icon">
                    <i class="fas fa-user-injured"></i>
                </div>
                <h3 class="action-title">Patient Requests</h3>
                <p class="action-description">Review and manage appointment requests from patients</p>
                <a href="patient_request.php" class="btn btn-outline-primary">View Requests</a>
            </div>
            
            <div class="action-card wow fadeInUp" data-wow-delay="0.2s">
                <div class="action-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <h3 class="action-title">Appointment Schedule</h3>
                <p class="action-description">View your daily schedule and upcoming appointments</p>
                <a href="appointment_schedule.php" class="btn btn-outline-primary">View Schedule</a>
            </div>
            
            <div class="action-card wow fadeInUp" data-wow-delay="0.3s">
                <div class="action-icon">
                    <i class="fas fa-file-medical"></i>
                </div>
                <h3 class="action-title">Medical Records</h3>
                <p class="action-description">Access and manage patient medical records</p>
                <a href="medical_records.php" class="btn btn-outline-primary">View Records</a>
            </div>
            
            <div class="action-card wow fadeInUp" data-wow-delay="0.4s">
                <div class="action-icon">
                    <i class="fas fa-prescription"></i>
                </div>
                <h3 class="action-title">Prescriptions</h3>
                <p class="action-description">Create and manage patient prescriptions</p>
                <a href="prescriptions.php" class="btn btn-outline-primary">Manage Prescriptions</a>
            </div>
        </div>
    </div>
</div>

<!-- Welcome Section -->
<div class="welcome-section">
    <div class="container">
        <div class="welcome-content wow fadeInUp">
            <h3>Ready to Provide Excellent Care?</h3>
            <p>Your dashboard is designed to help you focus on what matters most - patient care</p>
        </div>
    </div>
</div>

<script>
    // Animated counter for stats
    function animateCounter(element, target, duration = 2000) {
        let start = 0;
        const increment = target / (duration / 16);
        const timer = setInterval(() => {
            start += increment;
            if (start >= target) {
                element.textContent = target;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(start);
            }
        }, 16);
    }

    // Initialize counters when page loads
    document.addEventListener('DOMContentLoaded', function() {
        // You can replace these with actual data from your database
        animateCounter(document.getElementById('patientCount'), 124);
        animateCounter(document.getElementById('appointmentCount'), 8);
        animateCounter(document.getElementById('pendingCount'), 3);
    });

    // Add smooth scrolling for better user experience
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>

<?php
include "includes/footer.php";
?>
</body>
</html>