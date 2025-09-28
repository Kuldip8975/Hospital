<?php
include "includes/header.php";
include "includes/navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Requests - Doctor's Appointment</title>
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
        
        /* Request Card */
        .request-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 30px;
        }
        
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
        
        /* Status and Badges */
        .illness-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .illness-emergency {
            background: #f8d7da;
            color: #721c24;
        }
        
        .illness-regular {
            background: #d1edff;
            color: #0c5460;
        }
        
        .illness-chronic {
            background: #d4edda;
            color: #155724;
        }
        
        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        
        .btn-action {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
        }
        
        .btn-accept {
            background: #28a745;
            color: white;
        }
        
        .btn-accept:hover {
            background: #218838;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(40, 167, 69, 0.3);
        }
        
        .btn-reject {
            background: #dc3545;
            color: white;
        }
        
        .btn-reject:hover {
            background: #c82333;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(220, 53, 69, 0.3);
        }
        
        /* DateTime Styling */
        .datetime-cell {
            font-weight: 600;
            color: #495057;
        }
        
        .date-time {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        
        .date {
            font-weight: 600;
            color: #495057;
        }
        
        .time {
            font-size: 0.85rem;
            color: #6c757d;
        }
        
        /* No Results Styling */
        .no-requests {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }
        
        .no-requests i {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 20px;
        }
        
        .no-requests h3 {
            color: #495057;
            margin-bottom: 10px;
        }
        
        .no-requests p {
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
            border-left: 4px solid #667eea;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #667eea;
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
                font-size: 0.8rem;
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
        
        .request-card {
            animation: fadeInUp 0.6s ease;
        }
    </style>
</head>
<body>

<div class="page-banner overlay-dark bg-image" style="background-image: url(assets/img/bg_image_1.jpg);">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <h1 class="font-weight-normal">Patient Requests</h1>
            <p class="text-white mb-0">Manage appointment requests from your patients</p>
        </div>
    </div>
</div>

<div class="page-section">
    <div class="container">
        <?php
        include 'connection/connection.php';

        // Get doctor_email from cookie
        $doctor_email = $_COOKIE['doc_email'] ?? '';

        if ($doctor_email != "") {
            // Get request count for statistics
            $countStmt = $conn->prepare("SELECT COUNT(*) as total_requests FROM user_request WHERE doc_email = ? AND status='Requested'");
            $countStmt->bind_param("s", $doctor_email);
            $countStmt->execute();
            $countResult = $countStmt->get_result();
            $requestCount = $countResult->fetch_assoc()['total_requests'];
            $countStmt->close();

            echo '
            <div class="stats-container wow fadeInUp">
                <div class="stat-card">
                    <div class="stat-number">' . $requestCount . '</div>
                    <div class="stat-label">Pending Requests</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Availability</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">Quick</div>
                    <div class="stat-label">Response Time</div>
                </div>
            </div>';

            // Prepared statement to prevent SQL injection
            $stmt = $conn->prepare("SELECT * FROM user_request WHERE doc_email = ? AND status='Requested'");
            $stmt->bind_param("s", $doctor_email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo '
                <div class="request-card wow fadeInUp">
                    <div class="card-header">
                        <h3><i class="fas fa-user-injured me-2"></i>Patient Appointment Requests</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Appointment ID</th>
                                        <th>Patient Email</th>
                                        <th>Illness</th>
                                        <th>Date & Time</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>';

                $counter = 1;
                while ($row = $result->fetch_assoc()) {
                    // Determine illness badge class
                    $illness = strtolower($row['illness']);
                    $illnessClass = 'illness-regular';
                    
                    if (strpos($illness, 'emergency') !== false || strpos($illness, 'urgent') !== false) {
                        $illnessClass = 'illness-emergency';
                    } elseif (strpos($illness, 'chronic') !== false) {
                        $illnessClass = 'illness-chronic';
                    }
                    
                    echo '
                            <tr>
                                <td data-label="No">' . $counter . '</td>
                                <td data-label="Appointment ID">#' . $row['id'] . '</td>
                                <td data-label="Patient Email">' . htmlspecialchars($row['user_email']) . '</td>
                                <td data-label="Illness">
                                    <span class="illness-badge ' . $illnessClass . '">' . htmlspecialchars($row['illness']) . '</span>
                                </td>
                                <td data-label="Date & Time">
                                    <div class="date-time">
                                        <span class="date">' . $row['rdate'] . '</span>
                                        <span class="time">' . $row['rtime'] . '</span>
                                    </div>
                                </td>
                                <td data-label="Actions">
                                    <div class="action-buttons">
                                        <a href="accept_user.php?aid=' . $row['id'] . '" class="btn-action btn-accept" onclick="return confirm(\'Are you sure you want to accept this appointment?\')">
                                            <i class="fas fa-check"></i> Accept
                                        </a>
                                        <a href="reject_user.php?aid=' . $row['id'] . '" class="btn-action btn-reject" onclick="return confirm(\'Are you sure you want to reject this appointment?\')">
                                            <i class="fas fa-times"></i> Reject
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
                <div class="no-requests wow fadeInUp">
                    <i class="fas fa-inbox"></i>
                    <h3>No Patient Requests</h3>
                    <p>You don\'t have any pending appointment requests at the moment.</p>
                    <p class="small">New requests will appear here as patients book appointments.</p>
                </div>';
            }

            // Close statements
            $stmt->close();
        } else {
            echo '
            <div class="no-requests wow fadeInUp">
                <i class="fas fa-exclamation-circle"></i>
                <h3>Doctor Not Found</h3>
                <p>Unable to verify doctor credentials. Please log in again.</p>
                <a href="doctorsignIn.php" class="btn btn-primary">Doctor Login</a>
            </div>';
        }

        // Close database connection
        if(isset($conn)) {
            $conn->close();
        }
        ?>
    </div>
</div>

<script>
    // Add confirmation for actions
    document.addEventListener('DOMContentLoaded', function() {
        const acceptButtons = document.querySelectorAll('.btn-accept');
        const rejectButtons = document.querySelectorAll('.btn-reject');
        
        acceptButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                if (!confirm('Are you sure you want to accept this appointment?')) {
                    e.preventDefault();
                }
            });
        });
        
        rejectButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                if (!confirm('Are you sure you want to reject this appointment?')) {
                    e.preventDefault();
                }
            });
        });
    });
</script>

<?php
include "includes/footer.php";
?>
</body>
</html>