<?php
include "includes/header.php";
include "includes/usernavbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Ambulance - Doctor's Appointment</title>
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
        
        /* Ambulance Section */
        .ambulance-section {
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
        
        /* Ambulance Cards */
        .ambulance-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
        }
        
        .ambulance-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid #f1f3f4;
        }
        
        .ambulance-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }
        
        .ambulance-image {
            height: 200px;
            overflow: hidden;
            position: relative;
        }
        
        .ambulance-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .ambulance-card:hover .ambulance-image img {
            transform: scale(1.05);
        }
        
        .emergency-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .ambulance-info {
            padding: 25px;
        }
        
        .driver-name {
            color: #333;
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .hospital-name {
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
        
        .status-available {
            background: #d4edda;
            color: #155724;
        }
        
        .status-busy {
            background: #f8d7da;
            color: #721c24;
        }
        
        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
        }
        
        .dot-available {
            background: #28a745;
        }
        
        .dot-busy {
            background: #dc3545;
        }
        
        /* No Drivers Message */
        .no-drivers {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }
        
        .no-drivers i {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 20px;
        }
        
        .no-drivers h3 {
            color: #495057;
            margin-bottom: 10px;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .banner-section h1 {
                font-size: 2.2rem;
            }
            
            .ambulance-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .ambulance-card {
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
            
            .ambulance-info {
                padding: 20px;
            }
            
            .driver-name {
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
        
        .ambulance-card {
            animation: fadeInUp 0.6s ease;
        }
    </style>
</head>
<body>

<div class="page-banner overlay-dark bg-image" style="background-image: url(assets/img/bg_image_1.jpg);">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <h1 class="font-weight-normal">Emergency Ambulance Service</h1>
            <p class="subtitle">24/7 available ambulance services with trained drivers</p>
        </div>
    </div> 
</div> 

<div class="ambulance-section">
    <div class="container">
        <div class="section-header wow fadeInUp">
            <h2>Available Ambulance Drivers</h2>
            <p>Choose from our verified ambulance drivers for emergency medical transportation</p>
        </div>
        
        <?php
        // Assuming you have a database connection established
        include 'connection/connection.php';

        // Query to retrieve all drivers from the driver_details table
        $query = "SELECT * FROM driver_details";
        $result = mysqli_query($conn, $query);

        // Check and display data
        if ($result && mysqli_num_rows($result) > 0) {
            echo '<div class="ambulance-grid">';
            
            while ($row = mysqli_fetch_assoc($result)) {
                // Determine availability status (you can add this field to your database)
                $isAvailable = true; // This should come from your database
                $statusClass = $isAvailable ? 'status-available' : 'status-busy';
                $statusDot = $isAvailable ? 'dot-available' : 'dot-busy';
                $statusText = $isAvailable ? 'Available Now' : 'Currently Busy';
                
                echo '
                <div class="ambulance-card wow fadeInUp">
                    <div class="ambulance-image">
                        <img src="assets/img/driver/ambulance.jpg" alt="Ambulance">
                        <span class="emergency-badge">24/7 Emergency</span>
                    </div>
                    <div class="ambulance-info">
                        <h3 class="driver-name">' . htmlspecialchars($row['driver_name']) . '</h3>
                        <p class="hospital-name">' . htmlspecialchars($row['hospital_name']) . '</p>
                        
                        <div class="contact-info">
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <span>' . htmlspecialchars($row['phone_number']) . '</span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:' . htmlspecialchars($row['email']) . '">' . htmlspecialchars($row['email']) . '</a>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Dhule, Maharashtra</span>
                            </div>
                        </div>
                        
                        <div class="status-indicator ' . $statusClass . '">
                            <span class="status-dot ' . $statusDot . '"></span>
                            ' . $statusText . '
                        </div>
                        
                        <a href="bookambulance.php?id=' . $row['driver_id'] . '" class="book-button">
                            Book Ambulance <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>';
            }
            
            echo '</div>';
        } else {
            echo '
            <div class="no-drivers wow fadeInUp">
                <i class="fas fa-ambulance"></i>
                <h3>No Ambulance Drivers Available</h3>
                <p>Currently there are no ambulance drivers available. Please try again later.</p>
                <p class="small">For emergency, please call: <strong>108</strong></p>
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