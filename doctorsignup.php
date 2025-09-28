<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor | Sign Up - Doctor's Appointment</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .content {
      width: 100%;
      max-width: 500px;
    }

    .SignUp-Container {
      background-color: white;
      border-radius: 16px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
      padding: 40px 35px;
      width: 100%;
    }

    .title {
      font-size: 28px;
      font-weight: 700;
      color: #333;
      text-align: center;
      margin-bottom: 30px;
      position: relative;
    }

    .title::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 60px;
      height: 4px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border-radius: 2px;
    }

    .form {
      width: 100%;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-label {
      display: block;
      font-weight: 600;
      color: #333;
      margin-bottom: 8px;
      font-size: 14px;
    }

    .form-items {
      position: relative;
      width: 100%;
    }

    .input, .form-select {
      width: 100%;
      padding: 14px 16px;
      border: 2px solid #e1e5eb;
      border-radius: 10px;
      font-size: 16px;
      transition: all 0.3s;
      background-color: #f9f9f9;
    }

    .input:focus, .form-select:focus {
      outline: none;
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
      background-color: white;
    }

    .form-select {
      appearance: none;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23666' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 16px center;
      background-size: 16px;
    }

    .password-group {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 15px;
    }

    .position-relative {
      position: relative;
    }

    .passEye {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #6c757d;
      transition: color 0.3s;
    }

    .passEye:hover {
      color: #667eea;
    }

    .form-btn {
      width: 100%;
      padding: 16px;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      margin-top: 10px;
    }

    .form-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }

    .SignUpText {
      text-align: center;
      margin-top: 25px;
      padding-top: 20px;
      border-top: 1px solid #eee;
      color: #666;
    }

    .sign-up-label {
      color: #666;
      text-decoration: none;
      font-size: 15px;
    }

    .sign-up-link {
      color: #667eea;
      font-weight: 600;
      margin-left: 5px;
      transition: color 0.3s;
    }

    .sign-up-link:hover {
      color: #764ba2;
      text-decoration: underline;
    }

    .doctor-icon {
      text-align: center;
      margin-bottom: 20px;
    }

    .doctor-icon i {
      font-size: 3rem;
      color: #667eea;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    /* Responsive Design */
    @media (max-width: 576px) {
      .SignUp-Container {
        padding: 30px 25px;
      }
      
      .password-group {
        grid-template-columns: 1fr;
        gap: 15px;
      }
      
      .title {
        font-size: 24px;
      }
    }

    @media (max-width: 480px) {
      body {
        padding: 15px;
      }
      
      .SignUp-Container {
        padding: 25px 20px;
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

    .SignUp-Container {
      animation: fadeInUp 0.6s ease;
    }
  </style>
</head>

<body>
  <div class="content">
    <div class="SignUp-Container">
      <div class="doctor-icon">
        <i class="fas fa-user-md"></i>
      </div>
      <p class="title">Doctor Registration</p>
      <form class="form" method="POST">
        <div class="form-group">
          <label for="docname" class="form-label">Full Name</label>
          <div class="form-items">
            <input type="text" class="input" name="docname" id="docname" placeholder="Enter your full name" required>
          </div>
        </div>

        <div class="form-group">
          <label for="mno" class="form-label">Mobile Number</label>
          <div class="form-items">
            <input type="tel" class="input" name="mno" id="mno" placeholder="Enter your mobile number" required>
          </div>
        </div>

        <div class="form-group">
          <label for="gender" class="form-label">Gender</label>
          <select name="hname" class="form-select" id="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>

        <div class="form-group">
          <label for="specialization" class="form-label">Specialization</label>
          <select name="role" class="form-select" id="specialization" required>
            <option value="">Select Specialization</option>
            <option value="Skin & Hair">Skin & Hair</option>
            <option value="Child Specialist">Child Specialist</option>
            <option value="General Physician">General Physician</option>
            <option value="Dental Care">Dental Care</option>
            <option value="Ear Nose Throat">Ear Nose Throat</option>
            <option value="Homoeopathy">Homoeopathy</option>
            <option value="Bone and joints">Bone and Joints</option>
          </select>
        </div>

        <div class="form-group">
          <label for="experience" class="form-label">Years of Experience</label>
          <div class="form-items">
            <input type="number" class="input" name="experience" id="experience" placeholder="Enter years of experience" min="0" max="50" required>
          </div>
        </div>

        <div class="form-group">
          <label for="email" class="form-label">Email Address</label>
          <div class="form-items">
            <input type="email" class="input" name="email" id="email" placeholder="Enter your email address" required>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Password</label>
          <div class="password-group">
            <div class="form-items position-relative">
              <input type="password" class="input password-input" name="password" placeholder="Create password" required>
              <span class="passEye"><i class="fa-solid fa-eye"></i></span>
            </div>
            <div class="form-items">
              <input type="password" class="input" name="rpassword" placeholder="Confirm password" required>
            </div>
          </div>
        </div>

        <input class="form-btn" type="submit" name="submit" value="Create Account" />
      </form>

      <div class="SignUpText">
        <a href="doctorsignIn.php" class="sign-up-label">
          Already have an account? <span class="sign-up-link">Sign In</span>
        </a>
      </div>
    </div>
  </div>

  <script>
    const passwordEyeBtn = document.querySelector(".passEye i");
    const passwordInputs = document.querySelectorAll(".password-input");

    passwordEyeBtn.addEventListener('click', () => {
      passwordInputs.forEach(input => {
        if (input.type === 'password') {
          input.type = 'text';
          passwordEyeBtn.classList.remove('fa-eye');
          passwordEyeBtn.classList.add('fa-eye-slash');
        } else {
          input.type = 'password';
          passwordEyeBtn.classList.remove('fa-eye-slash');
          passwordEyeBtn.classList.add('fa-eye');
        }
      });
    });

    // Form validation
    document.querySelector('.form').addEventListener('submit', function(e) {
      const password = document.querySelector('input[name="password"]').value;
      const confirmPassword = document.querySelector('input[name="rpassword"]').value;
      const mobile = document.querySelector('input[name="mno"]').value;
      
      // Password match validation
      if (password !== confirmPassword) {
        e.preventDefault();
        alert('Passwords do not match. Please check your password confirmation.');
        return;
      }
      
      // Password length validation
      if (password.length < 6) {
        e.preventDefault();
        alert('Password should be at least 6 characters long.');
        return;
      }
      
      // Mobile number validation
      if (mobile.length !== 10 || !/^\d+$/.test(mobile)) {
        e.preventDefault();
        alert('Please enter a valid 10-digit mobile number.');
        return;
      }
    });
  </script>
</body>

</html>

<?php
include 'connection/connection.php';

if (isset($_POST['submit'])) {
  $hname = mysqli_real_escape_string($conn, $_POST['hname']);
  $docname = mysqli_real_escape_string($conn, $_POST['docname']);
  $mno = mysqli_real_escape_string($conn, $_POST['mno']);
  $experience = mysqli_real_escape_string($conn, $_POST['experience']);
  $role = mysqli_real_escape_string($conn, $_POST['role']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $rpassword = mysqli_real_escape_string($conn, $_POST['rpassword']);

  if ($password == $rpassword) {
    // Check if the email already exists
    $emailCheckQuery = "SELECT * FROM doctor WHERE email = '$email'";
    $emailCheckResult = mysqli_query($conn, $emailCheckQuery);

    if (mysqli_num_rows($emailCheckResult) > 0) {
      // Email already exists, show alert
      echo '<script>alert("Email already exists. Please use a different email address.");</script>';
    } else {
      // Email is unique, proceed with insertion
      $doctorEntry = "INSERT INTO doctor(hname, docname, mno, role, experience, email, pass) VALUES ('$hname', '$docname', '$mno', '$role', '$experience', '$email', '$password')";
      $result = mysqli_query($conn, $doctorEntry);

      if ($result) {
        echo '<script>
                alert("Doctor registered successfully!");
                window.location.href = "doctorsignIn.php";
              </script>';
      } else {
        echo '<script>alert("Registration failed. Please try again.");</script>';
      }
    }
  } else {
    echo '<script>alert("Passwords do not match. Please check your password confirmation.");</script>';
  }
  
  // Close database connection
  if(isset($conn)) {
    mysqli_close($conn);
  }
}
?>