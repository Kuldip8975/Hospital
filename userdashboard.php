<?php
include "includes/header.php";
include "includes/usernavbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Doctor's Appointment</title>
    <style>
        /* Hero Section Styles */
        .page-hero {
            position: relative;
            height: 70vh;
            display: flex;
            align-items: center;
            background-size: cover;
            background-position: center;
        }
        
        .hero-section {
            width: 100%;
        }
        
        .hero-section .subhead {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 1rem;
            display: block;
        }
        
        .hero-section h1 {
            font-size: 3.5rem;
            color: white;
            margin-bottom: 2rem;
            font-weight: 700;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        
        /* Feedback Section Styles */
        .feedback {
            padding: 80px 0;
            background-color: #f8f9fa;
        }
        
        .feedback .section-title h2 {
            color: #333;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        
        .feedback-form {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
        }
        
        .feedback-image {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            height: 100%;
        }
        
        .feedback-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
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
        
        label {
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }
        
        #cf-submit {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            margin-top: 10px;
            transition: all 0.3s;
        }
        
        #cf-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 117, 252, 0.4);
        }
        
        /* Animation Classes */
        .wow {
            visibility: visible;
        }
        
        .fadeInUp {
            animation-name: fadeInUp;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 40px, 0);
            }
            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }
        
        /* Responsive Styles */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.5rem;
            }
            
            .feedback-form {
                padding: 25px;
            }
            
            .feedback-image {
                margin-bottom: 30px;
                height: 300px;
            }
        }
        
        @media (max-width: 576px) {
            .hero-section h1 {
                font-size: 2rem;
            }
            
            .page-hero {
                height: 60vh;
            }
        }
    </style>
</head>
<body>

  <div class="page-hero bg-image overlay-dark" style="background-image: url(assets/img/bg_image_1.jpg);">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <span class="subhead">Let's make your life joyful</span>
        <h1 class="display-4">Doctor's Appointment</h1>
        <a href="doctors.php" class="btn btn-primary">Get Appointment</a>
      </div>
    </div>
  </div>

  <div class="feedback" id="FeedBackSection">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
          <div class="feedback-image wow fadeInLeft">
            <img src="assets/img/appointment-image.jpg" class="img-fluid" alt="Doctor Appointment">
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="feedback-form wow fadeInRight">
            <div class="section-title">
              <h2>Share Your Feedback</h2>
              <p>We value your opinion. Let us know how we can improve our services.</p>
            </div>
            
            <form id="feedback-form" role="form" method="post">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
                  </div>
                </div>
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                  </div>
                </div>
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
                  </div>
                </div>
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="message">Your Feedback</label>
                    <textarea class="form-control" rows="5" id="message" name="message" placeholder="Please share your feedback with us..." required></textarea>
                  </div>
                </div>
                
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary w-100" id="cf-submit" name="submit">Submit Feedback</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
include 'connection/connection.php';

// Check if user is logged in
if(isset($_COOKIE['user_email'])) {
    $userEmail = $_COOKIE['user_email'];
    
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        
        // Validate inputs
        if(!empty($name) && !empty($email) && !empty($phone) && !empty($message)) {
            $updateQuery = "UPDATE user SET feedback = '$message' WHERE email = '$userEmail'";
            
            if (mysqli_query($conn, $updateQuery)) {
                echo "<script>
                    alert('Thank you for your feedback!');
                    window.location.href = 'userdashboard.php';
                </script>";
            } else {
                echo "<script>alert('Error updating feedback. Please try again.')</script>";
            }
        } else {
            echo "<script>alert('Please fill in all fields.')</script>";
        }
        
        mysqli_close($conn);
    }
} else {
    echo "<script>
        alert('Please login to submit feedback.');
        window.location.href = 'signIn.php';
    </script>";
}
?>

<?php
include "includes/footer.php";
?>
</body>
</html>