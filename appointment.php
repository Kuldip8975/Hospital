<?php
include "includes/header.php";
include "includes/usernavbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Appointments - Doctor's Appointment</title>
    <style>
        /* Banner Section */
        .page-banner {
            position: relative;
            height: 350px;
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
            margin-bottom: 2rem;
            font-weight: 700;
        }
        
        /* Search Section */
        .SearchDoctor {
            max-width: 500px;
            margin: 0 auto;
        }
        
        .SearchDoctor form {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .SearchDoctor input {
            flex: 1;
            min-width: 300px;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            background: white;
            font-size: 16px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }
        
        .SearchDoctor input:focus {
            outline: none;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.2);
        }
        
        .SearchDoctor button {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            white-space: nowrap;
        }
        
        .SearchDoctor button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 117, 252, 0.4);
        }
        
        /* Appointment Section */
        .page-section {
            padding: 60px 0;
            background: #f8f9fa;
            min-height: 60vh;
        }
        
        .appointment-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
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
        }
        
        .table-responsive {
            border-radius: 0 0 12px 12px;
        }
        
        .table {
            margin: 0;
            border: none;
        }
        
        .table thead th {
            background: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            padding: 15px 12px;
            font-weight: 600;
            color: #495057;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }
        
        .table tbody td {
            padding: 15px 12px;
            vertical-align: middle;
            border-color: #f1f3f4;
        }
        
        .table tbody tr {
            transition: all 0.3s;
        }
        
        .table tbody tr:hover {
            background-color: #f8f9fa;
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        /* Status Badges */
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .status-pending {
            background: #fff3cd;
            color: #856404;
        }
        
        .status-confirmed {
            background: #d1edff;
            color: #0c5460;
        }
        
        .status-completed {
            background: #d4edda;
            color: #155724;
        }
        
        .status-cancelled {
            background: #f8d7da;
            color: #721c24;
        }
        
        /* Date and Time Styling */
        .appointment-time {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 4px;
        }
        
        /* No Results Styling */
        .no-appointments {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }
        
        .no-appointments i {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 20px;
        }
        
        .no-appointments h3 {
            color: #495057;
            margin-bottom: 10px;
        }
        
        .no-appointments p {
            color: #6c757d;
            margin-bottom: 20px;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .banner-section h1 {
                font-size: 2.2rem;
            }
            
            .SearchDoctor form {
                flex-direction: column;
            }
            
            .SearchDoctor input {
                min-width: 100%;
                margin-bottom: 10px;
            }
            
            .table-responsive {
                font-size: 0.9rem;
            }
            
            .card-header {
                padding: 15px 20px;
            }
        }
        
        @media (max-width: 576px) {
            .page-banner {
                height: 300px;
            }
            
            .banner-section h1 {
                font-size: 1.8rem;
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
    </style>
</head>
<body>

<div class="page-banner overlay-dark bg-image" style="background-image: url(assets/img/bg_image_1.jpg);">
  <div class="banner-section">
    <div class="container text-center wow fadeInUp">
      <h1 class="font-weight-normal">Check Your Appointments</h1>
      <p class="text-white mb-4">Enter doctor's email to view your appointment details</p>

      <div class="SearchDoctor">
        <form action="appointment.php" method="get">
          <input type="email" name="email" placeholder="Enter doctor's email address" required>
          <button type="submit" name="SearchAppointment">
            <i class="fas fa-search me-2"></i>Search Appointments
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="page-section">
  <div class="container">
    <?php
    include 'connection/connection.php';
    
    // Check if user is logged in
    if(!isset($_COOKIE['user_email'])) {
        echo '
        <div class="no-appointments wow fadeInUp">
            <i class="fas fa-exclamation-circle"></i>
            <h3>Authentication Required</h3>
            <p>Please log in to view your appointments.</p>
            <a href="signIn.php" class="btn btn-primary">Sign In</a>
        </div>';
    } 
    elseif (isset($_GET['SearchAppointment'])) {
        $Email = $_GET['email'];
        $user_email = $_COOKIE['user_email'];
       
        if ($Email != "") {
            // Query to retrieve user appointments
            $query = "SELECT * FROM user_request WHERE doc_email = '$Email' AND user_email = '$user_email'";
            $result = mysqli_query($conn, $query);
            
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    echo '
                    <div class="appointment-card wow fadeInUp">
                        <div class="card-header">
                            <h3><i class="fas fa-calendar-check me-2"></i>Your Appointments</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Appointment ID</th>
                                            <th>Doctor Name</th>
                                            <th>Specialization</th>
                                            <th>Date & Time</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>';

                    $counter = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Determine status badge class
                        $statusClass = 'status-' . strtolower($row['status']);
                        
                        echo '
                                <tr>
                                    <td data-label="No">' . $counter . '</td>
                                    <td data-label="Appointment ID">#' . $row['id'] . '</td>
                                    <td data-label="Doctor Name">Dr. ' . htmlspecialchars($row['doc_name']) . '</td>
                                    <td data-label="Specialization">' . htmlspecialchars($row['doc_role']) . '</td>
                                    <td data-label="Date & Time">
                                        <div>' . $row['rdate'] . '</div>
                                        <div class="appointment-time">' . $row['rtime'] . '</div>
                                    </td>
                                    <td data-label="Status">
                                        <span class="status-badge ' . $statusClass . '">' . $row['status'] . '</span>
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
                    <div class="no-appointments wow fadeInUp">
                        <i class="fas fa-calendar-times"></i>
                        <h3>No Appointments Found</h3>
                        <p>No appointments found for the specified doctor email.</p>
                        <p class="small">Please check the email address and try again.</p>
                    </div>';
                }
            } else {
                echo '
                <div class="no-appointments wow fadeInUp">
                    <i class="fas fa-exclamation-triangle"></i>
                    <h3>Database Error</h3>
                    <p>There was an error retrieving your appointments. Please try again later.</p>
                </div>';
            }
        } else {
            echo '
            <div class="no-appointments wow fadeInUp">
                <i class="fas fa-info-circle"></i>
                <h3>Enter Doctor\'s Email</h3>
                <p>Please enter a doctor\'s email address to search for appointments.</p>
            </div>';
        }
    } else {
        echo '
        <div class="no-appointments wow fadeInUp">
            <i class="fas fa-search"></i>
            <h3>Find Your Appointments</h3>
            <p>Enter the doctor\'s email address in the search form above to view your appointments.</p>
        </div>';
    }
    
    // Close database connection
    if(isset($con)) {
        mysqli_close($con);
    }
    ?>
  </div>
</div>

<?php
include "includes/footer.php";
?>
</body>
</html>