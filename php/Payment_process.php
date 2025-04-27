<?php
session_start();
include "function.php";
$Payment = new DB_con();
if(isset($_POST['pay_submit'])) {
    $check_price = $Payment->updatepayment($_SESSION['trans_id'],$_POST['userMoney']);
    echo "<script>alert('Payment successful');</script>";
    header("refresh: 1; url=check_time.php");
}
?>