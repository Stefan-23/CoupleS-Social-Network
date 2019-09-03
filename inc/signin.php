<?php
    session_start();
	require "db_connect.php";


    if(isset($_POST['insert'])){                   
		if(isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['country'])){                          
	        if(!empty($_POST['uname']) && !empty($_POST['password']) && !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['country'])){           
			
			$username = trim($_POST['uname']);
            $password = trim($_POST['password']);
            $firstName = trim($_POST['fname']);
            $partnerName = trim($_POST['lname']);
            $email = trim($_POST['email']);
			$country= trim($_POST['country']);
			if(strlen($password) < 6){
				echo "Password must be at least 6 characters long";
				die();
			}
            $username    = mysqli_real_escape_string($conn,$username);
			$password    = mysqli_real_escape_string($conn,$password);
			$firstName   = mysqli_real_escape_string($conn,$firstName);
			$partnerName = mysqli_real_escape_string($conn,$partnerName);
            $email       = mysqli_real_escape_string($conn,$email);
			$country     = mysqli_real_escape_string($conn,$country);
		    $query = "INSERT INTO users_couples(user_firstname, user_lastname, username, password, email, country ) VALUES ('{$firstName}','{$partnerName}','{$username}','{$password}','{$email}','{$country}')";
                               
		if(mysqli_query($conn,$query) === TRUE){
		echo "Succesful sign-up ";
		header("location:../login.html");
		exit();
	        }else {
		echo "Error";
	    }
		}else {
			echo "You must fill all fields";
		}
		}else {
			echo "Error2";
		}
	}
?>
