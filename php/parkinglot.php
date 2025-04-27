<?php
use CodeIgniter\Database\Query;

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
        <title>Parkinglot</title>
        <style>
            .slot {
                width: 40px;
                height: 40px;
                margin: 5px;
                background-color: #ccc;
                border: 1px solid #666;
                display: inline-block;
            }

            .selected {
                background-color: #ffcc00;
            }

            input {
                border-radius: 5px;
            }

            /* input:hover {
                    border-radius: 5px;
                    background-color: red;
                } */

            button {
                border-radius: 5px;
                background-color: whitesmoke;
            }

            button:hover {
                border-radius: 5px;
                background-color: gainsboro;
                color: red;
            }

            .custom-button {
                background-color: #4CAF50;
                color: white;
                padding: 10px 20px;
                border: none;
                cursor: pointer;
            }

            .red-background {
                background-color: red;
            }

            a.disabled {
                pointer-events: none;
                cursor: default;
            }

            .bodyfit {
                position: 0;
                padding: 16px;
            }
        </style>

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

        <div class="table-responsive bodyfit">
            <h3>Service rate</h3>
            <table class="table">
                <tr>
                    <th>Car</th>
                    <th>Hour</th>
                    <th>Price</th>
                    <th>Motorcycle </th>
                    <th>Hour</th>
                    <th>Price</th>
                </tr>
                <?php
                // include "function.php";
                $service_rate = new DB_con();
                $show_service = $service_rate->SelectTable("service_rate", "type_vehicle", "car");
                $show_service_moto = $service_rate->SelectTable("service_rate", "type_vehicle", "motocycle");
                while ($row_service = mysqli_fetch_array($show_service)) {
                    $row_service2 = mysqli_fetch_array($show_service_moto);
                    echo "<tr>";
                    echo "<td>{$row_service['type_vehicle']}</td>";
                    echo "<td>{$row_service['Time-rate']}</td>";
                    echo "<td>{$row_service['service_rate']} Baht</td>";
                    echo "<td>{$row_service2['type_vehicle']}</td>";
                    echo "<td>{$row_service['Time-rate']}</td>";
                    echo "<td>{$row_service2['service_rate']} Baht</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>

        <!-- for loop for array
    String[] cars = {"Volvo", "BMW", "Ford", "Mazda"};
    for (int i = 0; i < cars.length; i++) {
    System.out.println(cars[i]);
    } -->

    </body>

    </html>
    <?php
    // include_once("function.php");
    $show = new DB_con();
    $Show_parklot = $show->showparking_lot();
    echo "<div class='table-responsive bodyfit'>";
    echo "<table class='table'>";
    echo "<tr>";
    echo "<th>slot Id</th>
      <th>Slot Number</th>
      <th>Type Vehicle</th>
      <th>Status</th>
      <th>Booking</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_array($Show_parklot)) {

        echo "<tr>";
        echo "<td>{$row['slot_id']}</td>";
        echo "<td>{$row['slot_number']}</td>";
        echo "<td>{$row['type_vehicle']}</td>";
        echo "<td>{$row['status']}</td>";
        if ($row['status'] == 'empty') {
            echo "<td style='background-color:green;border-radius: 10px;'><a href='transection.php?parkinglot_id=" . $row['slot_id'] . "' style='color:white;'>see</a></td>";
        } else {
            echo "<td style='background-color:red;border-radius: 10px;'><a href='transection.php?parkinglot_id=" . $row['slot_id'] . "' style='color:white;' class='disabled'>see</a></td>";
        }
        echo "</tr>";
    }
    /*
    if (isset($_SESSION['username'])) {
      $select = "SELECT * FROM transection "
    }
    */
    echo "</table>";
    echo "</div>";
    
    include "./templates./footers.php";
    
}
?>