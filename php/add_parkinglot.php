<?php
session_start();
if (!isset($_SESSION['id'])) {
    echo "<script>alert('please login first')</script>";
    header("refresh: 1; url=login.php");
} else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <style>
    .input {
        margin: 2px;
        padding: 2px;
        border: 1px solid #0062cc;
        border-radius: 5px;
        color: black;
    }

    .input:hover {
        border-radius: 5px;
        background-color: #0062cc;
        color: white;
    }
    </style>
    <title>Document</title>
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
                        <a class="dropdown-item" href="check_time.php">Check time</a>
                        <a class="dropdown-item" href="add_parkinglot.php">Add-slot-Admin</a>
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
                    include "function.php";
                    $name = new DB_con();
                    $show_name = $name->SelectTable("parkinglot", "user_id", $_SESSION['id'],);
                    $show_row = mysqli_fetch_array($show_name);
                    echo "<label style='color:white;'>{$show_row['fullname']} User ID {$show_row['user_id']}</label>";
                    ?>  
                </div>
        </div>
    </nav>

    <div class="container">
        <form action="check_add_parkinglot.php" method="POST">
        </form>
    </div>
    <div class="container">
        <h1 class="mt-5">Add Parking slot</h1>
        <hr>
        <form action="check_add_parkinglot.php" method="post">
            <div class="form-group">
                <label for="fullname">parking Slot Number</label>
                <input type="text" name="slot_number" id="slot_number" class="form-control">
            </div>
            <div class="form-group">
                <select class="form-select" aria-label="Default select example" name="type_vehicle">
                    <option name="type_vehicle">Please choose Vehicle Type</option>
                    <option value="car">Car</option>
                    <option value="motorcycle">Motorcycle</option>
                </select>
            </div>
            <button type="submit" id="Submit" name="Submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>
<?php 
}
?>