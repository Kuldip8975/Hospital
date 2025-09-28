<?php
include "includes/header.php";
include "includes/usernavbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Doctors - Doctor's Appointment</title>
    <style>
        /* Banner Section */
        .page-banner {
            position: relative;
            height: 400px;
            display: flex;
            align-items: center;
            background-size: cover;
            background-position: center;
        }
        
        .banner-section {
            width: 100%;
        }
        
        .banner-section h1 {
            font-size: 3rem;
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
        
        .SearchDoctor select {
            flex: 1;
            min-width: 250px;
            padding: 12px 15px;
            border: none;
            border-radius: 8px;
            background: white;
            font-size: 16px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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
        
        /* Doctors Grid */
        .team {
            padding: 80px 0;
            background: #f8f9fa;
        }
        
        .team-thumb {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            margin-bottom: 30px;
            height: 100%;
        }
        
        .team-thumb:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }
        
        .team-thumb img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        
        .team-info {
            padding: 25px;
        }
        
        .team-info h3 {
            color: #333;
            font-weight: 700;
            margin-bottom: 8px;
            font-size: 1.4rem;
        }
        
        .team-info p {
            color: #666;
            margin-bottom: 15px;
        }
        
        .team-contact-info {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }
        
        .team-contact-info a {
            color: #2575fc;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        
        .team-contact-info a:hover {
            color: #6a11cb;
        }
        
        .contact-info-item {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 8px;
            color: #555;
        }
        
        .contact-info-item i {
            color: #2575fc;
            width: 16px;
        }
        
        .fees-badge {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }
        
        .exp-badge {
            background: #e9ecef;
            color: #495057;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.9rem;
        }
        
        /* No Results Message */
        .no-results {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }
        
        .no-results i {
            font-size: 3rem;
            color: #ddd;
            margin-bottom: 20px;
        }
        
        /* Appointment Form */
        .appointment-form {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }
        
        .form-control {
            border: 1px solid #e1e5eb;
            border-radius: 8px;
            padding: 12px 15px;
            margin-bottom: 20px;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.25);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 117, 252, 0.4);
        }
        
        /* Breadcrumb */
        .breadcrumb {
            background: none;
            padding: 0;
            margin-bottom: 20px;
        }
        
        .breadcrumb a {
            color: #2575fc;
            text-decoration: none;
        }
        
        .breadcrumb a:hover {
            text-decoration: underline;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .banner-section h1 {
                font-size: 2.2rem;
            }
            
            .SearchDoctor form {
                flex-direction: column;
            }
            
            .SearchDoctor select {
                min-width: 100%;
            }
            
            .team-thumb {
                margin-bottom: 25px;
            }
        }
        
        @media (max-width: 576px) {
            .page-banner {
                height: 350px;
            }
            
            .banner-section h1 {
                font-size: 1.8rem;
            }
            
            .appointment-form {
                padding: 25px;
            }
        }
    </style>
</head>
<body>

<div class="page-banner overlay-dark bg-image" style="background-image: url(assets/img/bg_image_1.jpg);">
  <div class="banner-section">
    <div class="container text-center wow fadeInUp">
      <h1 class="font-weight-normal">Find Your Doctor</h1>
      <p class="text-white mb-4">Choose from our specialized healthcare professionals</p>

      <div class="SearchDoctor">
        <form action="doctors.php" method="get">
          <select name="specilization" class="form-select" required>
            <option value="">Choose specialization..</option>
            <option value="Skin & Hair">Skin & Hair</option>
            <option value="Child Specialist">Child Specialist</option>
            <option value="General Physician">General Physician</option>
            <option value="Dental Care">Dental Care</option>
            <option value="Ear Nose Throat">Ear Nose Throat</option>
            <option value="Homoeopathy">Homoeopathy</option>
            <option value="Bone and joints">Bone and joints</option>
          </select>
          <button type="submit" name="SearchDoctor">
            <i class="fas fa-search me-2"></i>Search Doctors
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="team page-section">
  <div class="container">
    <?php if(isset($_GET['SearchDoctor']) && !empty($_GET['specilization'])): ?>
    <div class="mb-4">
      <h3>Search Results for: <span class="text-primary"><?= htmlspecialchars($_GET['specilization']) ?></span></h3>
    </div>
    <?php endif; ?>
    
    <div class="row">
      <?php
      include 'connection/connection.php';
      if (isset($_GET['SearchDoctor'])) {
        $specialization = $_GET['specilization'];

        if ($specialization != "") {
          $query = "SELECT * FROM doctor WHERE role = '$specialization'";
          $result = mysqli_query($conn, $query);

          if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              ?>
              <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="team-thumb wow fadeInUp">
                  <img src="assets/img/doctors/doctor4.png" class="img-fluid" alt="Dr. <?= htmlspecialchars($row['docname']) ?>">
                  <div class="team-info">
                    <h3>Dr. <?= htmlspecialchars($row['docname']) ?></h3>
                    <p class="text-primary fw-bold"><?= htmlspecialchars($row['role']) ?></p>
                    
                    <div class="contact-info">
                      <div class="contact-info-item">
                        <i class="fas fa-phone"></i>
                        <span><?= htmlspecialchars($row['mno']) ?></span>
                      </div>
                      <div class="contact-info-item">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:<?= htmlspecialchars($row['email']) ?>" class="text-decoration-none">
                          <?= htmlspecialchars($row['email']) ?>
                        </a>
                      </div>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mt-3">
                      <span class="fees-badge">Fees: ₹100</span>
                      <span class="exp-badge">Exp: <?= htmlspecialchars($row['experience']) ?> years</span>
                    </div>
                    
                    <div class="team-contact-info">
                      <a href="bookAppointment.php?id=<?= $row['did'] ?>" class="btn-appointment">
                        <i class="fas fa-calendar-check me-2"></i>Book Appointment
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
          } else {
            echo '
            <div class="col-12">
              <div class="no-results wow fadeInUp">
                <i class="fas fa-user-md"></i>
                <h3>No Doctors Found</h3>
                <p>Sorry, we couldn\'t find any doctors matching your criteria.</p>
                <a href="doctors.php" class="btn btn-primary mt-3">View All Specializations</a>
              </div>
            </div>';
          }
        } else {
          echo '
          <div class="col-12">
            <div class="no-results wow fadeInUp">
              <i class="fas fa-exclamation-circle"></i>
              <h3>Please Select a Specialization</h3>
              <p>Choose a specialization from the dropdown to find doctors.</p>
            </div>
          </div>';
        }
      } else {
        echo '
        <div class="col-12">
          <div class="no-results wow fadeInUp">
            <i class="fas fa-search"></i>
            <h3>Find Your Specialist</h3>
            <p>Use the search form above to find doctors by specialization.</p>
          </div>
        </div>';
      }
      ?>
    </div>
  </div>
</div>

<?php
// Close database connection
if(isset($conn)) {
    mysqli_close($conn);
}
?>

<?php
include "includes/footer.php";
?>
</body>
</html>