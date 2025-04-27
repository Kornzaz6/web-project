<?php
session_start();
include_once('funcCalculate.php');
if(isset($_POST['Submit']))
{
    $DB_cal                 =   new DB_cal();
    $parkingnumber          =   $_POST['slot_number'];
    $type_vehicle               =   $_POST['type_vehicle'];
    //$add_parkinglot         =   $DB_cal->add_parkinglot($parkingnumber, $type_car);
   
    if($type_vehicle == "0")
    {
        echo "<script>alert('please choose vehicle type!');</script>";
        header('refresh: 1; url=add_parkinglot.php');
    }
    else
    {
        $add_parkinglot         =   $DB_cal->add_parkinglot($parkingnumber, $type_vehicle);
        echo  "<script>alert('Added success');</script>";
        header("refresh: 1; url=parkinglot-admin.php");
    }
}

?>