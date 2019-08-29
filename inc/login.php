<?php

    session_start();
	require("db_connect.php");
	
	if(isset($_POST["logname"])){
	    $username = trim($_POST['logname']);
	    $password = trim($_POST['logpassword']);
	    $username = mysqli_real_escape_string($conn,$username);
	    $password = mysqli_real_escape_string($conn,$password);
	
	$sql = "SELECT*FROM users_couples WHERE username ='".$username."' and password='".$password."'";
   
    $result = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($result);
	
	if($count==1){
		header("location:homepage.php");
		exit();
	}else echo "You must sign-in first!";
	}
?>