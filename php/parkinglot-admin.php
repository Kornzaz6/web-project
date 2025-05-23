<?php
session_start();
include_once('funcCalculate.php');
$DB_cal = new DB_cal();

$showParkingLot = $DB_cal->showparking_lot();
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
    <title>Add_slot-Admin</title>
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
                        <a class="dropdown-item" href="check.php">Check time</a>
                        <a class="dropdown-item" href="add_parkinglot.php">Add-slot-Admin</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                <ul class="navbar-nav mr-auto">
                    <a href="add_parkinglot.php" class="nav-link">Add data</a><br>
                </ul>
                <li class="nav-item">
                    <a href="Register.php" class="nav-link">Sign up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
            <!-- <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form> -->
        </div>
    </nav>

    <?php
    echo "<div class='table-responsive'>";
    echo "<table class='table'>";
    echo "<tr>";
    echo "<th>Parkinglot ID</th>
            <th>Parking Number</th>
            <th>Type Vehicle</th>
            <th>Status</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_array($showParkingLot)) {
        echo "<tr>";
        echo "<td>{$row['slot_id']}</td>";
        echo "<td>{$row['slot_number']}</td>";
        echo "<td>{$row['type_vehicle']}</td>";
        if($row['status'] == 'empty'){
            echo "<td style='background:green;color:white;'>{$row['status']}</td>";
        }else {
            echo "<td style='background:red;color:white;'>{$row['status']}</td>";
        }
        echo "";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
}
    ?>
</body>

</html>