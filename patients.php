<?php
include "includes/header.php";
include "includes/navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Patients - Doctor's Appointment</title>
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
        
        /* Patients Card */
        .patients-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 30px;
        }
        
        .card-header {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
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
        
        /* Status and Details */
        .details-cell {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        .details-cell:hover {
            white-space: normal;
            overflow: visible;
            background: white;
            position: relative;
            z-index: 1;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 8px;
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
        
        /* Status Badge */
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .status-accepted {
            background: #d4edda;
            color: #155724;
        }
        
        /* No Results Styling */
        .no-patients {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }
        
        .no-patients i {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 20px;
        }
        
        .no-patients h3 {
            color: #495057;
            margin-bottom: 10px;
        }
        
        .no-patients p {
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
            border-left: 4px solid #28a745;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #28a745;
            margin-bottom: 5px;
        }
        
        .stat-label {
            color: #666;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        /* Patient Info Cards for Mobile */
        .patient-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
            border-left: 4px solid #28a745;
        }
        
        .patient-info {
            display: grid;
            gap: 10px;
        }
        
        .patient-item {
            display: flex;
            justify-content: between;
            padding: 5px 0;
            border-bottom: 1px solid #f1f3f4;
        }
        
        .patient-label {
            font-weight: 600;
            color: #495057;
            min-width: 120px;
        }
        
        .patient-value {
            color: #6c757d;
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
            
            .desktop-table {
                display: none;
            }
            
            .mobile-cards {
                display: block;
            }
        }
        
        @media (min-width: 769px) {
            .mobile-cards {
                display: none;
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
        
        .patients-card {
            animation: fadeInUp 0.6s ease;
        }
    </style>
</head>
<body>

<div class="page-banner overlay-dark bg-image" style="background-image: url(assets/img/bg_image_1.jpg);">
    <div class="banner-section">
        <div class="container text-center wow fadeInUp">
            <h1 class="font-weight-normal">Your Patients</h1>
            <p class="text-white mb-0">Manage your accepted patient appointments</p>
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
            // Get patient count for statistics
            $countQuery = "SELECT COUNT(*) as total_patients FROM user_request WHERE doc_email = '$doctor_email' AND status='Accepted'";
            $countResult = mysqli_query($conn, $countQuery);
            $patientCount = $countResult ? mysqli_fetch_assoc($countResult)['total_patients'] : 0;

            echo '
            <div class="stats-container wow fadeInUp">
                <div class="stat-card">
                    <div class="stat-number">' . $patientCount . '</div>
                    <div class="stat-label">Active Patients</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">Ready</div>
                    <div class="stat-label">For Treatment</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">Care</div>
                    <div class="stat-label">In Progress</div>
                </div>
            </div>';

            // Query to retrieve user appointments
            $query = "SELECT * FROM user_request WHERE doc_email = '$doctor_email' AND status='Accepted'";
            $result = mysqli_query($conn, $query);
            
            if ($result && mysqli_num_rows($result) > 0) {
                echo '
                <div class="patients-card wow fadeInUp">
                    <div class="card-header">
                        <h3><i class="fas fa-user-injured me-2"></i>Your Patients List</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive desktop-table">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Appointment ID</th>
                                        <th>Patient Email</th>
                                        <th>Illness Details</th>
                                        <th>Date & Time</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>';

                $counter = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                            <tr>
                                <td>' . $counter . '</td>
                                <td>#' . $row['id'] . '</td>
                                <td>' . htmlspecialchars($row['user_email']) . '</td>
                                <td class="details-cell" title="' . htmlspecialchars($row['detail']) . '">' . htmlspecialchars($row['detail']) . '</td>
                                <td>
                                    <div class="date-time">
                                        <span class="date">' . $row['rdate'] . '</span>
                                        <span class="time">' . $row['rtime'] . '</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="status-badge status-accepted">Accepted</span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="reject_user.php?aid=' . $row['id'] . '" class="btn-action btn-delete" onclick="return confirm(\'Are you sure you want to remove this patient appointment?\')">
                                            <i class="fas fa-trash"></i> Remove
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
                        
                        <!-- Mobile Cards View -->
                        <div class="mobile-cards">';
                
                mysqli_data_seek($result, 0); // Reset result pointer
                $counter = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                            <div class="patient-card">
                                <div class="patient-info">
                                    <div class="patient-item">
                                        <span class="patient-label">Appointment ID:</span>
                                        <span class="patient-value">#' . $row['id'] . '</span>
                                    </div>
                                    <div class="patient-item">
                                        <span class="patient-label">Patient Email:</span>
                                        <span class="patient-value">' . htmlspecialchars($row['user_email']) . '</span>
                                    </div>
                                    <div class="patient-item">
                                        <span class="patient-label">Illness Details:</span>
                                        <span class="patient-value">' . htmlspecialchars($row['detail']) . '</span>
                                    </div>
                                    <div class="patient-item">
                                        <span class="patient-label">Date:</span>
                                        <span class="patient-value">' . $row['rdate'] . '</span>
                                    </div>
                                    <div class="patient-item">
                                        <span class="patient-label">Time:</span>
                                        <span class="patient-value">' . $row['rtime'] . '</span>
                                    </div>
                                    <div class="patient-item">
                                        <span class="patient-label">Status:</span>
                                        <span class="status-badge status-accepted">Accepted</span>
                                    </div>
                                    <div class="patient-item">
                                        <span class="patient-label">Actions:</span>
                                        <a href="reject_user.php?aid=' . $row['id'] . '" class="btn-action btn-delete" onclick="return confirm(\'Are you sure you want to remove this patient appointment?\')">
                                            <i class="fas fa-trash"></i> Remove
                                        </a>
                                    </div>
                                </div>
                            </div>';
                    $counter++;
                }
                
                echo '
                        </div>
                    </div>
                </div>';
            } else {
                echo '
                <div class="no-patients wow fadeInUp">
                    <i class="fas fa-user-friends"></i>
                    <h3>No Patients Found</h3>
                    <p>You don\'t have any accepted patient appointments at the moment.</p>
                    <p class="small">Accepted appointment requests will appear here.</p>
                </div>';
            }
        } else {
            echo '
            <div class="no-patients wow fadeInUp">
                <i class="fas fa-user-md"></i>
                <h3>Doctor Not Found</h3>
                <p>Unable to verify doctor credentials. Please log in again.</p>
                <a href="doctorsignIn.php" class="btn btn-primary">Doctor Login</a>
            </div>';
        }

        // Close database connection
        if(isset($conn)) {
            mysqli_close($conn);
        }
        ?>
    </div>
</div>

<script>
    // Add confirmation for delete actions
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.btn-delete');
        
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                if (!confirm('Are you sure you want to remove this patient appointment?')) {
                    e.preventDefault();
                }
            });
        });
        
        // Tooltip for truncated details
        const detailCells = document.querySelectorAll('.details-cell');
        detailCells.forEach(cell => {
            cell.addEventListener('mouseenter', function() {
                this.title = this.textContent;
            });
        });
    });
</script>

<?php
include "includes/footer.php";
?>
</body>
</html>