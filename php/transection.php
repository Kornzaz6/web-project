<?php
session_start();
include "function.php";
if (!isset($_SESSION['id'])) {
    echo "<script>alert('please login first')</script>";
    header("refresh: 1; url=login.php");
} else {
if (isset($_POST['Submit'])) {
    $desc = new DB_con();
    $price = 0;
    $time_start = $_POST['timestart'];
    $time_end = $_POST['timeend'];
    // $dif_time   = $time_end - $time
    //$check_time = $desc->check_time($_SESSION['id']);
    //$check_times = mysqli_fetch_array($check_time);
    //$datetime_1 = $check_times['parkingtime_start'];
    //$datetime_2 = $check_times['parkingtime_end'];
    $check_type = $desc->check_typeCar($_GET['parkinglot_id']);
    $type = mysqli_fetch_array($check_type);

    $from_time = strtotime($time_start);
    $to_time = strtotime($time_end);
    $diff_minutes = round(abs($from_time - $to_time) / 60, 2) . " minutes";
    $diff_minutes = intval($diff_minutes);
    //echo "<br><label>Totle Time: {$diff_minutes}</label><br>";

    $car = array(0, 20, 40, 60, 80, 100, 200);
    $motocycle = array(0, 10, 20, 30, 40, 50, 100);

    //$diff_minutes = 241;
    if ($type['type_vehicle'] == 'car') {
        if ($diff_minutes <= 60) {
            $show_desc = $desc->description($_SESSION['id'], $_GET['parkinglot_id'], $_POST['timestart'], $_POST['timeend'], $car[0]);
        } elseif ($diff_minutes <= 360) {
            $cost = (ceil($diff_minutes / 60) - 1) * 20;
            $show_desc = $desc->description($_SESSION['id'], $_GET['parkinglot_id'], $_POST['timestart'], $_POST['timeend'], $cost);
        } elseif ($diff_minutes > 360 && $diff_minutes <= 1440) {
            $cost = 40 + ((ceil($diff_minutes / 60) - 6) * 40); // เพิ่มค่าเพิ่มเข้าไปตามระยะเวลาต่อ 24 ชั่วโมง
            $show_desc = $desc->description($_SESSION['id'], $_GET['parkinglot_id'], $_POST['timestart'], $_POST['timeend'], $cost);
        } elseif ($diff_minutes > 1440) {
            // ค่าเพิ่มเป็น 24 ชั่วโมงแรก
            $cost = 40 + 20 + ((ceil(($diff_minutes - 1440) / 60) - 1) * 20);
            $show_desc = $desc->description($_SESSION['id'], $_GET['parkinglot_id'], $_POST['timestart'], $_POST['timeend'], $cost);
        } else {
            $show_desc = $desc->description($_SESSION['id'], $_GET['parkinglot_id'], $_POST['timestart'], $_POST['timeend'], $car[6]);
        }
        echo "<script>alert('booking successful!')</script>";
        header("refresh: 1.5; url=parkinglot_User.php");
    } else {
        if ($diff_minutes <= 60) {
            $show_desc = $desc->description($_SESSION['id'], $_GET['parkinglot_id'], $_POST['timestart'], $_POST['timeend'], $motocycle[0]);
        } elseif ($diff_minutes <= 360) {
            $cost = (ceil($diff_minutes / 60) - 1) * 10;
            $show_desc = $desc->description($_SESSION['id'], $_GET['parkinglot_id'], $_POST['timestart'], $_POST['timeend'], $cost);
        } elseif ($diff_minutes > 360 && $diff_minutes <= 1440) {
            $cost = 20 + ((ceil($diff_minutes / 60) - 6) * 20); // เพิ่มค่าเพิ่มเข้าไปตามระยะเวลาต่อ 24 ชั่วโมง
            $show_desc = $desc->description($_SESSION['id'], $_GET['parkinglot_id'], $_POST['timestart'], $_POST['timeend'], $cost);
        } elseif ($diff_minutes > 1440) {
            // ค่าเพิ่มเป็น 24 ชั่วโมงแรก
            $cost = 20 + 40 + ((ceil(($diff_minutes - 1440) / 60) - 1) * 40);
            $show_desc = $desc->description($_SESSION['id'], $_GET['parkinglot_id'], $_POST['timestart'], $_POST['timeend'], $cost);
        } else {
            $show_desc = $desc->description($_SESSION['id'], $_GET['parkinglot_id'], $_POST['timestart'], $_POST['timeend'], $motocycle[6]);
        }
        echo "<script>alert('booking successful!')</script>";
        header("refresh: 1.5; url=parkinglot_User.php");
    }
    
    

    $update_status = $desc->updatestatus($_GET['parkinglot_id']);

}
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
    <title>Transection</title>
    <style>
        a {
            text-decoration: none;
        }

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
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="parkinglot_User.php">Parkinglot</a>
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
                        <a class="dropdown-item"
                            href="history_user.php?user_id=<?php echo $_SESSION['id']; ?>">history</a>
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
                $show_name = $name->SelectTable("parkinglot", "user_id", $_SESSION['id']);
                $show_row = mysqli_fetch_array($show_name);
                echo "<label style='color:white;'>Welcome {$show_row['fullname']} User ID {$show_row['user_id']}</label>";
                ?>
            </div>
        </div>
    </nav>

    <div class="container">
    <h1 class="mt-5">Slot Booking</h1>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="">Time Start</label>
                <input type="datetime-local" name="timestart" class="form-control">
            </div class="form-group">
            <label for="">Time End</label>
            <input type="datetime-local" name="timeend" class="form-control">
            <div>
                <input type="submit" name="Submit" class="input">
                <input type="reset" class="input">
            </div>
        </form>
    </div>
    <!-- INSERT INTO `service_rate` (`Service_id`, `type_vehicle`, `service_rate`, `Time-rate`) VALUES (NULL, 'car', '0', '1'); -->
</body>

</html>

<!-- <?php
$cars = array("Volvo", "BMW", "Toyota");
echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";
    }?> -->