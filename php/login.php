<?php
session_start();
include_once('function.php');
$userdata = new DB_con();

if (isset($_POST['login'])) {
    $uEmail = $_POST['Email'];
    $password = $_POST['password'];

    $result = $userdata->signin($uEmail, $password);
    $num = mysqli_fetch_array($result);

    if ($num > 0 && $num['User_role'] == 'member') {
        $_SESSION['id'] = $num['user_id'];
        $_SESSION['email'] = $num['useremail'];
        $_SESSION['UserRole'] = $num['User_role'];
        echo "<script>alert('Login Successful!');</script>";
        echo "<script>window.location.href='parkinglot_User.php'</script>";
        // header('Refresh:3 ; URL=parkinglot.php');
    } else if($num > 0 && $num['User_role'] == 'admin'){
        // echo "<script>alert('Something went wrong! please try agian.');</script>";
        // echo "<script>window.location.href='login.php'</script>";
        $_SESSION['id'] = $num['user_id'];
        $_SESSION['email'] = $num['useremail'];
        $_SESSION['UserRole'] = $num['User_role'];
        echo "<script>alert('Login Successful!');</script>";
        echo "<script>window.location.href='parkinglot.php'</script>";
    }else {
        echo "<script>alert('somethings went wrong! please try agian.');</script>";
        header('Refresh:3 ; URL=login.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="imgs/ffxv.png" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <title>Login</title>
        <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(120deg, #2980b9, #8e44ad);
            height: 100vh;
            overflow: hidden;
        }

        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            background: white;
            border-radius: 10px;
        }

        .center h2 {
            text-align: center;
            padding: 0 0 20px 0;
            border-bottom: 1px solid silver;
        }

        .center form {
            padding: 0 40px;
            box-sizing: border-box;
        }

        form .txt_field {
            position: relative;
            border-bottom: 2px solid #adadad;
            margin: 30px 0;
        }

        .txt_field input {
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 16px;
            border: none;
            background: none;
            outline: none;
        }

        .txt_field label {
            position: absolute;
            top: 50%;
            left: 5px;
            color: #adadad;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
            transition: .5s;
        }

        .txt_field span::before {
            content: '';
            position: absolute;
            top: 40px;
            left: 0;
            width: 0%;
            height: 2px;
            background: #2980b9;
            transition: .5s;
        }

        .txt_field input:focus~label,
        .txt_field input:valid~label {
            top: -5px;
            color: #2980b9;
        }

        .txt_field input:focus~span::before,
        .txt_field input:valid~span::before {
            width: 100%;
        }

        .pass {
            margin: -5px 0 20px 5px;
            color: #a6a6a6;
            cursor: pointer;
        }

        .pass:hover {
            text-decoration: underline;
        }

        input[type="submit"] {
            width: 100%;
            height: 50%;
            border: 1px solid;
            background: #2691d9;
            border-radius: 25px;
            font-size: 18px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
        }

        input[type="submit"]:hover {
            border-color: #2691d9;
            transition: .5s;
        }

        .signup_link {
            margin: 30px 0;
            text-align: center;
            font-size: 16px;
            color: #666666;
        }

        .signup_link a {
            color: #2691d9;
            text-decoration: none;
        }

        .signup_link a:hover {
            text-decoration: underline;
        }
        </style>
    </head>

    <body>

        <div class="center">
            <h2>Login</h2>
            <form method="post">
                <div class="txt_field">
                    <input type="email" id="Email" name="Email" required>
                    <label for="">Email</label>
                </div>
                <div class="txt_field">
                    <input type="password" id="password" name="password" required>
                    <label for="">Password</label>
                </div>
                <!-- <div class="pass">
                    <a href="reset_pass.php"></a>
                </div> -->
                <input type="submit" value="Login" name="login">
                <div class="signup_link">
                    Not a member? <a href="register.php">Sign up</a><br>
                    Forgot password? <a href="reset_pass.php">Click!</a>
                </div>
            </form>
        </div>

    </body>

    </html>
</body>

</html>