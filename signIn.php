<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Appointment | Sign In</title>
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
            max-width: 450px;
        }

        .SignIn-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            padding: 40px 35px;
            width: 100%;
        }

        .title {
            font-size: 28px;
            font-weight: 600;
            color: #333;
            text-align: center;
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 16px;
            color: #666;
            text-align: center;
            margin-bottom: 30px;
        }

        .form {
            width: 100%;
        }

        .form-items {
            position: relative;
            margin-bottom: 25px;
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

        .forgot-password {
            display: block;
            text-align: right;
            margin-bottom: 25px;
            color: #2575fc;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }

        .forgot-password:hover {
            color: #6a11cb;
            text-decoration: underline;
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
            margin-bottom: 25px;
        }

        .form-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 117, 252, 0.4);
        }

        .SignInText {
            text-align: center;
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
            color: #2575fc;
            font-weight: 600;
            margin-left: 5px;
            transition: color 0.3s;
        }

        .sign-up-link:hover {
            color: #6a11cb;
            text-decoration: underline;
        }

        @media (max-width: 576px) {
            .SignIn-container {
                padding: 30px 25px;
            }
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="SignIn-container">
            <p class="title">Welcome back</p>
            <p class="subtitle">Sign in to your account</p>
            <form class="form" action="#" method="post">
                <div class="form-items">
                    <input type="email" class="input" name="username" placeholder="Enter your email" required>
                </div>

                <div class="form-items">
                    <input type="password" class="input password-input" name="password" placeholder="Enter your password" required>
                    <span class="passEye"><i class="fa fa-eye"></i></span>
                </div>

                <a href="forgetPassword.php" class="forgot-password">Forgot Password?</a>
                
                <input class="form-btn" type="submit" name="submit" value="Sign In" />
            </form>

            <div class="SignInText">
                <a href="signUp.php" class="sign-up-label">
                    Don't have an account?<span class="sign-up-link">Sign up</span>
                </a>
            </div>
        </div>
    </div>

    <script>
        const passwordEyeBtn = document.querySelector(".passEye i");
        const passwordInput = document.querySelector(".password-input");

        passwordEyeBtn.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordEyeBtn.classList.remove('fa-eye');
                passwordEyeBtn.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordEyeBtn.classList.remove('fa-eye-slash');
                passwordEyeBtn.classList.add('fa-eye');
            }
        });
    </script>
</body>

</html>
<?php
include 'connection/connection.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $findUser = "select * from user where email='$username' and pass='$password'";
    $result = mysqli_query($conn, $findUser);
    $num = mysqli_num_rows($result);
    if ($num) {
        $userEmail = $username;
        setcookie('user_email', $userEmail, time() + (86400 * 7), '/');
        //redirect to home page
        ?>
        <script>
            alert('User Logged In Successfully');
            // redirect to sign in page
            window.location.href = 'userdashboard.php';
        </script><?php
    } else {
        ?>
        <script>alert('Incorrect Credentials');</script>
        <?php
    }
}
?>