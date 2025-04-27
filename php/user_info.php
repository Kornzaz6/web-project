<?php
session_start();
include "../php/function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>user information</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="parkinglot.php">Parkinglot</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <!-- <li class="nav-item active">
              <a class="nav-link" href="parkinglot.php">Home <span class="sr-only">(current)</span></a>
            </li> -->

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            See more
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <!-- <a class="dropdown-item" href="check_time.php">check-Time</a> -->
                            <a class="dropdown-item" href="add_parkinglot.php">Add-slot-Admin</a>
                            <a class="dropdown-item" href="../admin_dashboard../index.php">admin_dashboard</a>
                            <a class="dropdown-item" href="history_admin.php">history</a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="Register.php" class="nav-link">Sign up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
                <div class="form-inline my-2 my-lg-0">
                    <?php
                    $name = new DB_con();
                    $show_name = $name->SelectTable("parkinglot", "user_id", $_SESSION['id'],);
                    $show_row = mysqli_fetch_array($show_name);
                    echo "<label style='color:white;'>{$show_row['fullname']} User ID {$show_row['user_id']}</label>";
                    ?>  
                </div>
            </div>
        </nav>

<div class="table-responsive">
  <table class="table">
    ...
  </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>