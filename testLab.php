<?php
include "includes/header.php";
include "includes/usernavbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Lab Tests - Doctor's Appointment</title>
    <style>
        /* Banner Section */
        .page-banner {
            position: relative;
            height: 300px;
            display: flex;
            align-items: center;
            background-size: cover;
            background-position: center;
        }
        
        .banner-section {
            width: 100%;
        }
        
        .banner-section h1 {
            font-size: 2.8rem;
            color: white;
            margin-bottom: 1rem;
            font-weight: 700;
        }
        
        .banner-section .subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.2rem;
            margin-bottom: 0;
        }
        
        /* Labs Section */
        .labs-section {
            padding: 80px 0;
            background: #f8f9fa;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .section-header h2 {
            color: #333;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .section-header p {
            color: #666;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }
        
        /* Lab Cards */
        .labs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }
        
        .lab-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid #f1f3f4;
        }
        
        .lab-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }
        
        .lab-image {
            height: 200px;
            overflow: hidden;
            position: relative;
        }
        
        .lab-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .lab-card:hover .lab-image img {
            transform: scale(1.05);
        }
        
        .accredited-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, #4ecdc4 0%, #44a08d 100%);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .lab-info {
            padding: 25px;
        }
        
        .lab-name {
            color: #333;
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .lab-specialty {
            color: #2575fc;
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 1rem;
        }
        
        .contact-info {
            margin: 20px 0;
        }
        
        .contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
            color: #555;
        }
        
        .contact-item i {
            color: #2575fc;
            width: 16px;
            text-align: center;
        }
        
        .contact-item a {
            color: #555;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .contact-item a:hover {
            color: #2575fc;
        }
        
        .lab-features {
            list-style: none;
            padding: 0;
            margin: 20px 0;
            text-align: left;
        }
        
        .lab-features li {
            padding: 6px 0;
            color: #555;
            position: relative;
            padding-left: 25px;
            font-size: 0.9rem;
        }
        
        .lab-features li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #4ecdc4;
            font-weight: bold;
        }
        
        .book-button {
            display: block;
            width: 100%;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            text-align: center;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            margin-top: 15px;
        }
        
        .book-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 117, 252, 0.4);
            color: white;
        }
        
        .book-button i {
            margin-left: 5px;
            transition: transform 0.3s;
        }
        
        .book-button:hover i {
            transform: translateX(3px);
        }
        
        /* Status Indicators */
        .status-indicator {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-top: 10px;
        }
        
        .status-open {
            background: #d4edda;
            color: #155724;
        }
        
        .status-closed {
            background: #f8d7da;
            color: #721c24;
        }
        
        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
        }
        
        .dot-open {
            background: #28a745;
        }
        
        .dot-closed {
            background: #dc3545;
        }
        
        /* Operating Hours */
        .operating-hours {
            background: #f8f9fa;
            padding: 12px 15px;
            border-radius: 8px;
            margin: 15px 0;
            font-size: 0.9rem;
        }
        
        .hours-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 5px;
        }
        
        .hours-time {
            color: #666;
        }
        
        /* No Labs Message */
        .no-labs {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }
        
        .no-labs i {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 20px;
        }
        
        .no-labs h3 {
            color: #495057;
            margin-bottom: 10px;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .banner-section h1 {
                font-size: 2.2rem;
            }
            
            .labs-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .lab-card {
                margin-bottom: 0;
            }
        }
        
        @media (max-width: 576px) {
            .page-banner {
                height: 250px;
            }
            
            .banner-section h1 {
                font-size: 2rem;
            }
            
            .lab-info {
                padding: 20px;
            }
            
            .lab-name {
                font-size: 1.3rem;
            }
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
        
        .lab-card {
            animation: fadeInUp 0.6s ease;
        }
    </style>
</head>
<body>

<div class="page-banner overlay-dark bg-image" style="background-image: url(assets/img/bg_image_1.jpg);">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <h1 class="font-weight-normal">Book Lab Tests</h1>
            <p class="subtitle">Choose from our accredited medical laboratories</p>
        </div>
    </div>
</div>

<div class="labs-section">
    <div class="container">
        <div class="section-header wow fadeInUp">
            <h2>Available Laboratories</h2>
            <p>Select a laboratory to book your medical tests with accurate results and quick turnaround</p>
        </div>
        
        <?php
        // Assuming you have a database connection established
        include 'connection/connection.php';

        $query = "SELECT * FROM labs";
        $result = mysqli_query($conn, $query);

        // Check and display data
        if ($result && mysqli_num_rows($result) > 0) {
            echo '<div class="labs-grid">';
            
            while ($row = mysqli_fetch_assoc($result)) {
                // Determine lab status (you can add this field to your database)
                $isOpen = true; // This should come from your database
                $statusClass = $isOpen ? 'status-open' : 'status-closed';
                $statusDot = $isOpen ? 'dot-open' : 'dot-closed';
                $statusText = $isOpen ? 'Open Now' : 'Closed';
                
                echo '
                <div class="lab-card wow fadeInUp">
                    <div class="lab-image">
                        <img src="assets/img/testLab/lab.jpg" alt="' . htmlspecialchars($row['lab_name']) . '">
                        <span class="accredited-badge">NABL Accredited</span>
                    </div>
                    <div class="lab-info">
                        <h3 class="lab-name">' . htmlspecialchars($row['lab_name']) . '</h3>
                        <p class="lab-specialty">Medical Diagnostic Center</p>
                        
                        <div class="contact-info">
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <span>' . htmlspecialchars($row['lab_mo']) . '</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:' . htmlspecialchars($row['lab_email']) . '">' . htmlspecialchars($row['lab_email']) . '</a>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Dhule, Maharashtra</span>
                            </div>
                        </div>
                        
                        <div class="operating-hours">
                            <div class="hours-label">Operating Hours:</div>
                            <div class="hours-time">24/7 Emergency Services Available</div>
                        </div>
                        
                        <ul class="lab-features">
                            <li>Blood Tests & Analysis</li>
                            <li>Urine & Stool Tests</li>
                            <li>Pathology Services</li>
                            <li>Quick Results Delivery</li>
                        </ul>
                        
                        <div class="status-indicator ' . $statusClass . '">
                            <span class="status-dot ' . $statusDot . '"></span>
                            ' . $statusText . '
                        </div>
                        
                        <a href="booktestLab.php?id=' . $row['lab_id'] . '" class="book-button">
                            Book Lab Test <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>';
            }
            
            echo '</div>';
        } else {
            echo '
            <div class="no-labs wow fadeInUp">
                <i class="fas fa-flask"></i>
                <h3>No Laboratories Available</h3>
                <p>Currently there are no laboratories available for booking. Please try again later.</p>
                <p class="small">For emergency tests, please contact: <strong>+91-XXXXX-XXXXX</strong></p>
            </div>';
        }

        // Close database connection
        if(isset($conn)) {
            mysqli_close($conn);
        }
        ?>
    </div>
</div>

<?php
include "includes/footer.php";
?>
</body>
</html>