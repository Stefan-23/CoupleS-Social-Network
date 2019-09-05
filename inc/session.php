<?php
include "db_connect.php";
session_start();

$userchk = $_SESSION['login_user'];

$session_sql = mysqli_query($conn, "SELECT FROM users_couples WHERE username = '$userchk' ");

$row = mysqli_fetch_assoc($session_sql,MSQLI_ASSOC);

$loggin_session = $row['username'];


if(!isset($_SESSION['login_user'])){
	header("location: ../login.php ");
    die();
}





?>