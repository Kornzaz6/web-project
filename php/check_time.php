<?php
session_start();
include "function.php";
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
    <title>Check-time</title>
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
                        <a class="dropdown-item" href="history_user.php">parking History</a>
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
            <!-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
        </div>
    </nav>
</body>

<?php
if (!isset($_SESSION['id'])) {
    echo "<script>alert('please login first!')</script>";
    header("refresh: 2; url=login.php");
} else {    
    $_SESSION['id'];
    $check = new DB_con();
    $check_time = $check->check_time($_SESSION['id']);

    while ($check_times = mysqli_fetch_array($check_time)) {
        echo "<div class='table-responsive bodyfit'>";
        echo "<table class='table'>";
        echo "<tr>";
        echo "<th>User ID</th><th>ParkingTime-Start</th>
          <th>ParkingTime-End</th>
          <th>Price</th>
          <th>Pay Now</th>
          <th>Status</th>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>User ID {$check_times['user_id']}</td><br>";
        echo "<td>TimeStart {$check_times['parkingtime_start']}</td><br>";
        echo "<td>TimeEnd {$check_times['parkingtime_end']}</td><br>";
        echo "<td>Price {$check_times['price']}</td><br>";
        echo "<td><a href='Payment.php?transaction_id=" . $check_times['teansec_id'] . "'>Click!</a></td>";
        echo "<td>Status {$check_times['trans_status']}</td>";
        echo "</tr>";

        /*
    $datetime_1 = '2022-04-10 11:15:30';
    echo "<br>".$datetime_1."<br>"; 
    $datetime_2 = '2022-04-12 13:30:45'; 
    */
        /*
        $datetime_1 = $check_times['parkingtime_start'];
        $datetime_2 = $check_times['parkingtime_end'];

        $from_time = strtotime($datetime_1); 
        $to_time = strtotime($datetime_2); 
        $diff_minutes = round(abs($from_time - $to_time) / 60,2). " minutes";
        $diff_minutes = intval($diff_minutes);
        echo "<br><label>Totle Time: {$diff_minutes}</label><br>";
        }
        $car = array(0,20,40,60,80,100,200);
        $motocycle = array(0,10,20,30,40,50,100);

        $diff_minutes = 241;

        if ($diff_minutes <= 60) {
            echo $car[0];
        }elseif($diff_minutes <= 360){
            // echo $car[];
            $cost = (ceil($diff_minutes / 60)-1) * 20;
            echo $cost;
        }else{z 
            echo $car[6];
        }
        //$start_datetime = new DateTime($datetime_1); 
        //$diff = $start_datetime->diff(new DateTime($datetime_2)); 
        /*
        $start_datetime = new DateTime($check_times['parkingtime_start']);
        $diff = $start_datetime->diff(new DateTime($check_times['parkingtime_end']));
         
        echo $diff->days.' Days total<br>'; 
        echo $diff->y.' Years<br>'; 
        echo $diff->m.' Months<br>'; 
        echo $diff->d.' Days<br>'; 
        echo $diff->h.' Hours<br>'; 
        echo $diff->i.' Minutes<br>'; 

        $total_minutes = ($diff->days * 24 * 60); 
        $total_minutes += ($diff->h * 60); 
        $total_minutes += $diff->i; 
         
        echo 'Diff in Minutes: '.$total_minutes;
        */
    }
    echo "</table>";
    echo "</div>";
}
}
?>

</html>