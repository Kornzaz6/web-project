<?php
include "function.php";
$Reset = new DB_con();

if (isset($_POST['Snewpass'])) {
    $user_email = $_POST['emailpass'];
    $newPass = $_POST['newpass'];
    $Nsql = $Reset->Reset_pass($newPass, $user_email);
    if ($Nsql) {
        
    
        echo "<script>alert('Update new password success!');</script>";
        header("refresh: 1;url=login.php");
    }else{
        echo "<script>alert('Update new password fail. Please try again');</script>";
        header("refresh: 1; url=reset_pass.php");
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
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
        </script>
    <link rel="icon" type="image/png" href="imgs/ffxv.png" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <title>Reset Password</title>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Rest Password</h1>
        <hr>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="RestPass">Email</label>
                <input type="email" name="emailpass" id="emailpass" class="form-control">
            </div>
            <div class="form-group">
                <label for="newpass">New Password</label>
                <input type="password" name="newpass" id="resetpass" class="form-control">
            </div>
            <button type="submit" id="Snewpass" name="Snewpass" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>