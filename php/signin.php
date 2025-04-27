<?php
session_start();
include "function.php";

if (isset($_POST['login'])) {
    $email = $_POST['Email'];
    $password = $_POST['password'];
}
?>