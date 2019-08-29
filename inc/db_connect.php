<?php
$serverName="localhost";
$userName="root";
$userPass="";
$dbName="couples_db";

$conn= mysqli_connect($serverName, $userName, $userPass, $dbName);

if(!$conn){
	echo "Connection failed" or die("Connection failed:" . mysqli_connect_error());
}
?>