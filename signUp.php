<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor's Appointment | Sign Up</title>
  <link rel="stylesheet" href="assets/css/style.css">
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
      background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
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
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      padding: 40px 30px;
      width: 100%;
    }

    .title {
      font-size: 24px;
      font-weight: 600;
      color: #333;
      text-align: center;
      margin-bottom: 30px;
    }

    .form-group {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      margin-bottom: 20px;
    }

    .form-items {
      flex: 1 1 100%;
      position: relative;
    }

    .form-group.two-column .form-items {
      flex: 1 1 calc(50% - 8px);
    }

    .input {
      width: 100%;
      padding: 14px 16px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 16px;
      transition: all 0.3s;
      background-color: #f9f9f9;
    }

    .input:focus {
      outline: none;
      border-color: #4a90e2;
      box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
      background-color: white;
    }

    .input:disabled {
      background-color: #e9ecef;
      color: #6c757d;
      cursor: not-allowed;
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
      color: #4a90e2;
    }

    .form-btn {
      width: 100%;
      padding: 14px;
      background: linear-gradient(to right, #6a11cb, #2575fc);
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s;
      margin-top: 10px;
    }

    .form-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(37, 117, 252, 0.4);
    }

    .SignUpText {
      text-align: center;
      margin-top: 25px;
      color: #666;
    }

    .sign-up-label {
      color: #666;
      text-decoration: none;
    }

    .sign-up-link {
      color: #2575fc;
      font-weight: 600;
      margin-left: 5px;
    }

    .sign-up-link:hover {
      text-decoration: underline;
    }

    @media (max-width: 576px) {
      .SignUp-Container {
        padding: 30px 20px;
      }
      
      .form-group.two-column .form-items {
        flex: 1 1 100%;
      }
    }
  </style>
</head>

<body>
  <div class="content">
    <div class="SignUp-Container">
      <p class="title">Register For New User</p>
      <form class="form" method="POST">

        <div class="form-group">
          <div class="form-items">
            <input type="text" class="input" name="hname" placeholder="Enter Your Hospital Name.." required>
          </div>
        </div>

        <div class="form-group">
          <div class="form-items">
            <input type="text" class="input" name="ownerName" placeholder="Enter Your Owner Name.." required>
          </div>
        </div>

        <div class="form-group">
          <div class="form-items">
            <input type="date" class="input" name="dob" required>
          </div>
        </div>

        <div class="form-group">
          <div class="form-items">
            <input type="email" class="input" name="email" placeholder="Enter Your Email.." required>
          </div>
        </div>

        <div class="form-group">
          <div class="form-items">
            <input type="number" class="input" name="mno" placeholder="Enter Your Mobile No.." required>
          </div>
        </div>

        <div class="form-group two-column">
          <div class="form-items">
            <input type="text" class="input" name="address" placeholder="Enter Your Address.." required>
          </div>
          <div class="form-items">
            <input type="text" class="input" name="address" placeholder="Enter Your Address.." value="Dhule" disabled>
          </div>
        </div>

        <div class="form-group two-column">
          <div class="form-items position-relative">
            <input type="password" class="input password-input" name="password" placeholder="Enter Password.." required>
            <span class="passEye"><i class="fa-solid fa-eye"></i></span>
          </div>
          <div class="form-items">
            <input type="password" class="input" name="rpassword" placeholder="Re-Enter Password.." required>
          </div>
        </div>

        <input class="form-btn" type="submit" name="submit" value="Sign Up" />
      </form>

      <div class="SignUpText">
        <a href="signIn.php" class="sign-up-label">If You Already Have An Account!<span class="sign-up-link">Sign In</span></a>
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
  </script>
</body>

</html>

<?php
include 'connection/connection.php';
if(isset($_POST['submit']))
{
    $hname=$_POST['hname'];
    $ownerName=$_POST['ownerName'];
    $dob=$_POST['dob'];
    $email=$_POST['email'];
    $mno=$_POST['mno'];
    $address=$_POST['address'];
    $password=$_POST['password'];
    $rpassword=$_POST['rpassword'];
    if($password==$rpassword)
    {
        $userEntry="insert into user(hospital_name, user_name, dob, mno, email, addr, pass) values ('$hname','$ownerName','$dob','$mno','$email','$address','$password')";
        $result=mysqli_query($conn,$userEntry);
        if($result)
        {
            ?><script>
            alert('User registered successfully');
            // redirect to sign in page
            window.location.href = 'signIn.php';
        </script>
            <?php
           // redirect to sign in page
            // header('location:signIn.php');
        }
        else
        {
            ?>
            <script>alert('Data Not Inserted');</script>
            <?php
        }
    }
    else
    {
        ?><script>alert('Password Not Matched');</script>
        <?php
    }
}
?>