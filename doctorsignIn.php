<?php
include 'connection/connection.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepared statement for security
    $stmt = $conn->prepare("SELECT * FROM doctor WHERE email = ? AND pass = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Successful login
        $doctoremail = $username;
        setcookie('doc_email', $doctoremail, time() + (86400 * 7), '/');
        header('location:dashboard.php');
        exit();
    } else {
        echo "<script>alert('Incorrect Credentials');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Appointment | Sign In</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Reset and base styles */
        body.doctor-login-body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            margin: 0 !important;
            padding: 0 !important;
            min-height: 100vh !important;
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            font-family: Arial, sans-serif !important;
        }

        .doctor-login-content {
            width: 100% !important;
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            padding: 20px !important;
        }

        .doctor-login-container {
            background: white !important;
            border-radius: 15px !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2) !important;
            padding: 40px 30px !important;
            width: 100% !important;
            max-width: 400px !important;
            margin: 0 auto !important;
        }

        .doctor-login-title {
            font-size: 28px !important;
            font-weight: bold !important;
            color: #2c3e50 !important;
            text-align: center !important;
            margin-bottom: 30px !important;
        }

        .doctor-login-form-items {
            margin-bottom: 20px !important;
            position: relative !important;
            width: 100% !important;
        }

        .doctor-login-input {
            width: 100% !important;
            padding: 14px 16px !important;
            border: 2px solid #e1e5eb !important;
            border-radius: 8px !important;
            font-size: 16px !important;
            background: #f8f9fa !important;
            transition: all 0.3s ease !important;
            box-sizing: border-box !important;
        }

        .doctor-login-input:focus {
            outline: none !important;
            border-color: #667eea !important;
            background: white !important;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1) !important;
        }

        .doctor-login-passEye {
            position: absolute !important;
            right: 15px !important;
            top: 50% !important;
            transform: translateY(-50%) !important;
            cursor: pointer !important;
            color: #6c757d !important;
            transition: color 0.3s ease !important;
            z-index: 2 !important;
        }

        .doctor-login-passEye:hover {
            color: #667eea !important;
        }

        .doctor-login-page-link {
            display: block !important;
            text-align: right !important;
            margin-bottom: 25px !important;
            color: #667eea !important;
            text-decoration: none !important;
            font-weight: 500 !important;
            transition: color 0.3s ease !important;
            background: none !important;
            border: none !important;
        }

        .doctor-login-page-link:hover {
            color: #764ba2 !important;
            text-decoration: underline !important;
        }

        .doctor-login-form-btn {
            width: 100% !important;
            padding: 14px !important;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            color: white !important;
            border: none !important;
            border-radius: 8px !important;
            font-size: 16px !important;
            font-weight: 600 !important;
            cursor: pointer !important;
            transition: all 0.3s ease !important;
        }

        .doctor-login-form-btn:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4) !important;
        }

        .doctor-login-SignInText {
            text-align: center !important;
            margin-top: 25px !important;
            padding-top: 20px !important;
            border-top: 1px solid #e9ecef !important;
            color: #6c757d !important;
        }

        .doctor-login-sign-up-label {
            color: #6c757d !important;
            text-decoration: none !important;
        }

        .doctor-login-sign-up-link {
            color: #667eea !important;
            font-weight: 600 !important;
            margin-left: 5px !important;
            transition: color 0.3s ease !important;
        }

        .doctor-login-sign-up-link:hover {
            color: #764ba2 !important;
            text-decoration: underline !important;
        }

        /* Override any conflicting styles */
        .content, .SignIn-container, .title, .form-items, .input, .passEye, 
        .page-link, .form-btn, .SignInText, .sign-up-label, .sign-up-link {
            all: unset !important;
        }
    </style>
</head>

<body class="doctor-login-body">
    <div class="doctor-login-content">
        <div class="doctor-login-container">
            <p class="doctor-login-title">Doctor Login</p>
            <form class="form" action="#" method="post">
                <div class="doctor-login-form-items">
                    <input type="email" class="doctor-login-input" name="username" placeholder="Enter Your Username.." required>
                </div>
                <div class="doctor-login-form-items">
                    <input type="password" class="doctor-login-input" name="password" placeholder="Enter Your Password.." required>
                    <span class="doctor-login-passEye"><i class="fa fa-eye"></i></span>
                </div>
                <a href="forgetPassword.php" class="doctor-login-page-link">
                    <span class="page-link-label">Forgot Password?</span>
                </a>
                <input class="doctor-login-form-btn" type="submit" name="submit" value="Sign In" />
            </form>
            <div class="doctor-login-SignInText">
                <a href="doctorsignup.php" class="doctor-login-sign-up-label">
                    Don't have an account?<span class="doctor-login-sign-up-link">Sign up</span>
                </a>
            </div>
        </div>
    </div>

    <script>
        const passwordeyebtn = document.querySelector(".doctor-login-passEye i");
        const passtext = document.querySelector(".doctor-login-form-items input[type='password']");

        passwordeyebtn.onclick = () => {
            if (passtext.type === 'password') {
                passtext.type = 'text';
                passwordeyebtn.classList.remove('fa-eye');
                passwordeyebtn.classList.add('fa-eye-slash');
            } else {
                passtext.type = 'password';
                passwordeyebtn.classList.remove('fa-eye-slash');
                passwordeyebtn.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>