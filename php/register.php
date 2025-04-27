<?php
include_once('function.php');

$userdata = new DB_con();

if (isset($_POST['submit'])) {
    $fname = $_POST['fullname'];
    $uname = $_POST['username'];
    $uemail = $_POST['email'];
    $password = $_POST['password'];
    // $con_pass = $_POST['con_password'];

    $sql = $userdata->registration($fname, $uname, $uemail, $password);

    if ($sql) {
        echo "<script>alert('Registor Successful!');</script>";
        echo "<script>window.location.href='login.php'</script>";
    }else {
        echo "<script>alert('Something went wrong! Please try again.');</script>";
        echo "<script>window.location.href='login.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="imgs/ffxv.png" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function checkusername(val) {
            $.ajax({
                type: 'POST',
                url: 'checkuser.php',
                data: 'username=' + val, // fixed the data format here
                success: function (data) {
                    $('#usernamevaliable').html(data);
                }
            })
        }
        // function checkpass(pass) {
        //     $.ajax({
        //         type: 'POST',
        //         url: 'checkuser.php',
        //         data: 'con_password=' + pass,
        //         success:function(data) {
        //             $('#check_pass').html(data);
        //         }
        //     })
        // }

    </script>
    <title>Register</title>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Register</h1>
        <hr>
        <form action="" method="post">
            <div class="form-group">
                <label for="fullname">Fullname</label>
                <input type="text" class="form-control" id="username" name="fullname" placeholder="Your Fullname"
                    required>
            </div>
            <div class="form-group">
                <label for="username">username</label>
                <input type="text" class="form-control" id="username" name="username" onblur="checkusername(this.value)"
                    placeholder="Your Username" required>
                <span id="usernamevaliable"></span>
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Your Password"
                    required>
            </div>
            <!-- <div class="form-group">
                <label for="password">confirm password</label>
                <input type="password" class="form-control" id="con_password" name="con_password"
                    placeholder="Your Password" onblur="checkpass(this.value)" required>
                    <span id="check_pass"></span>
            </div> -->
            <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
            <button type="reset" id="reset" name="reset" class="btn btn-primary">Reset</button>
        </form>
    </div>
</body>

</html>