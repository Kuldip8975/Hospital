<?php
include "includes/header.php";
include "includes/navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambulance Bookings - Doctor's Appointment</title>
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
        
        /* Main Content Section */
        .page-section {
            padding: 60px 0;
            background: #f8f9fa;
            min-height: 70vh;
        }
        
        /* Booking Card */
        .booking-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 30px;
        }
        
        .card-header {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            padding: 20px 30px;
            border-bottom: none;
        }
        
        .card-header h3 {
            margin: 0;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .card-header h3 i {
            font-size: 1.2rem;
        }
        
        .card-body {
            padding: 0;
        }
        
        /* Table Styling */
        .table-responsive {
            border-radius: 0 0 16px 16px;
        }
        
        .table {
            margin: 0;
            border: none;
        }
        
        .table thead th {
            background: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            padding: 18px 15px;
            font-weight: 600;
            color: #495057;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            white-space: nowrap;
        }
        
        .table tbody td {
            padding: 16px 15px;
            vertical-align: middle;
            border-color: #f1f3f4;
            font-weight: 500;
        }
        
        .table tbody tr {
            transition: all 0.3s;
        }
        
        .table tbody tr:hover {
            background-color: #f8f9fa;
            transform: translateY(-1px);
        }
        
        /* Status and Service Type Badges */
        .service-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .service-emergency {
            background: #f8d7da;
            color: #721c24;
        }
        
        .service-transfer {
            background: #d1edff;
            color: #0c5460;
        }
        
        .service-regular {
            background: #d4edda;
            color: #155724;
        }
        
        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 8px;
        }
        
        .btn-action {
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        
        .btn-delete {
            background: #dc3545;
            color: white;
        }
        
        .btn-delete:hover {
            background: #c82333;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(220, 53, 69, 0.3);
        }
        
        .btn-view {
            background: #17a2b8;
            color: white;
        }
        
        .btn-view:hover {
            background: #138496;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(23, 162, 184, 0.3);
        }
        
        /* DateTime Styling */
        .datetime-cell {
            font-weight: 600;
            color: #495057;
        }
        
        /* No Results Styling */
        .no-bookings {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }
        
        .no-bookings i {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 20px;
        }
        
        .no-bookings h3 {
            color: #495057;
            margin-bottom: 10px;
        }
        
        .no-bookings p {
            color: #6c757d;
            margin-bottom: 20px;
        }
        
        /* Statistics Cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            padding: 25px 20px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            border-left: 4px solid #2575fc;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2575fc;
            margin-bottom: 5px;
        }
        
        .stat-label {
            color: #666;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .banner-section h1 {
                font-size: 2.2rem;
            }
            
            .table-responsive {
                font-size: 0.9rem;
            }
            
            .card-header {
                padding: 15px 20px;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 5px;
            }
            
            .btn-action {
                justify-content: center;
                font-size: 0.75rem;
            }
        }
        
        @media (max-width: 576px) {
            .page-banner {
                height: 250px;
            }
            
            .banner-section h1 {
                font-size: 2rem;
            }
            
            .stats-container {
                grid-template-columns: 1fr;
            }
            
            .table thead {
                display: none;
            }
            
            .table tbody tr {
                display: block;
                margin-bottom: 15px;
                border: 1px solid #dee2e6;
                border-radius: 8px;
                padding: 15px;
            }
            
            .table tbody td {
                display: block;
                text-align: right;
                padding: 8px 10px;
                border: none;
                position: relative;
            }
            
            .table tbody td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                width: 50%;
                padding-right: 10px;
                font-weight: 600;
                text-align: left;
                text-transform: uppercase;
                font-size: 0.8rem;
                color: #495057;
            }
        }
        
        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .booking-card {
            animation: fadeInUp 0.6s ease;
        }
    </style>
</head>
<body>

<div class="page-banner overlay-dark bg-image" style="background-image: url(assets/img/bg_image_1.jpg);">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <h1 class="font-weight-normal">Ambulance Bookings Management</h1>
        </div>
    </div>
</div>

<div class="page-section">
    <div class="container">
        <?php
        include 'connection/connection.php';
        
        // Check if doctor is logged in
        if(!isset($_COOKIE['doc_email'])) {
            echo '
            <div class="no-bookings wow fadeInUp">
                <i class="fas fa-exclamation-circle"></i>
                <h3>Authentication Required</h3>
                <p>Please log in as a doctor to manage ambulance bookings.</p>
                <a href="doctor_login.php" class="btn btn-primary">Doctor Login</a>
            </div>';
        } 
        else {
            $doctor_email = $_COOKIE['doc_email'];
           
            if ($doctor_email != "") {
                // Query to retrieve all bookings
                $query = "SELECT * FROM bookingdetails";
                $result = mysqli_query($conn, $query);
                
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        // Get total bookings count for statistics
                        $totalBookings = mysqli_num_rows($result);
                        
                        echo '
                        <div class="stats-container wow fadeInUp">
                            <div class="stat-card">
                                <div class="stat-number">' . $totalBookings . '</div>
                                <div class="stat-label">Total Bookings</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-number">24/7</div>
                                <div class="stat-label">Service Available</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-number">Active</div>
                                <div class="stat-label">Ambulance Service</div>
                            </div>
                        </div>';
                        
                        echo '
                        <div class="booking-card wow fadeInUp">
                            <div class="card-header">
                                <h3><i class="fas fa-ambulance"></i> Ambulance Bookings</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Booking ID</th>
                                                <th>User Email</th>
                                                <th>Driver Name</th>
                                                <th>Date & Time</th>
                                                <th>Service Type</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                        
                        $counter = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Determine service type badge
                            $serviceType = strtolower($row['ServiceType']);
                            $serviceClass = 'service-regular';
                            
                            if (strpos($serviceType, 'emergency') !== false) {
                                $serviceClass = 'service-emergency';
                            } elseif (strpos($serviceType, 'transfer') !== false) {
                                $serviceClass = 'service-transfer';
                            }
                            
                            echo '
                                    <tr>
                                        <td data-label="No">' . $counter . '</td>
                                        <td data-label="Booking ID">#' . $row['BookingID'] . '</td>
                                        <td data-label="User Email">' . htmlspecialchars($row['user_email']) . '</td>
                                        <td data-label="Driver Name">' . htmlspecialchars($row['driver_name']) . '</td>
                                        <td data-label="Date & Time" class="datetime-cell">' . $row['DateTime'] . '</td>
                                        <td data-label="Service Type">
                                            <span class="service-badge ' . $serviceClass . '">' . $row['ServiceType'] . '</span>
                                        </td>
                                        <td data-label="Actions">
                                            <div class="action-buttons">
                                                <a href="delete_booking.php?bid=' . $row['BookingID'] . '" class="btn-action btn-delete" onclick="return confirm(\'Are you sure you want to delete this booking?\')">
                                                    <i class="fas fa-trash"></i> Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>';
                            $counter++;
                        }
                        
                        echo '
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>';
                    } else {
                        echo '
                        <div class="no-bookings wow fadeInUp">
                            <i class="fas fa-calendar-times"></i>
                            <h3>No Bookings Found</h3>
                            <p>There are currently no ambulance bookings in the system.</p>
                        </div>';
                    }
                } else {
                    echo '
                    <div class="no-bookings wow fadeInUp">
                        <i class="fas fa-exclamation-triangle"></i>
                        <h3>Database Error</h3>
                        <p>There was an error retrieving the bookings. Please try again later.</p>
                    </div>';
                }
            } else {
                echo '
                <div class="no-bookings wow fadeInUp">
                    <i class="fas fa-user-md"></i>
                    <h3>Doctor Not Found</h3>
                    <p>Unable to verify doctor credentials. Please log in again.</p>
                </div>';
            }
            
            // Close database connection
            if(isset($conn)) {
                mysqli_close($conn);
            }
        }
        ?>
    </div>
</div>

<?php
include "includes/footer.php";
?>
</body>
</html>