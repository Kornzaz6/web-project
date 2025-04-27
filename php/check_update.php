<?php
session_start();
include "function.php";

$update_status = new DB_con();

if (isset($_POST['up_submit'])) {
    $check_update = $update_status->updateSlotstatus($_SESSION['slot_id'],$_POST['check_empty']);
    echo "<script>alert('Update Slot Status complete.');</script>";
    header("refres:1; url=update-slot.php");
}
?>