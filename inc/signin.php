<?php
	require "db_connect.php";
    session_start();


    if(isset($_POST['insert'])){      
	
	        $username = trim($_POST['uname']);
            $password = trim($_POST['password']);
			$repeat_password = trim($_POST['password-repeat']);
            $firstName = trim($_POST['fname']);
            $partnerName = trim($_POST['lname']);
            $email = trim($_POST['email']);
			$country= trim($_POST['country']);
			    if(strlen($password) < 6){
				    echo "Password must be at least 6 characters long";
				    die();
			    }
	    if(empty($username) || empty($password) || empty($repeat_password) || empty($firstName) || empty($partnerName) || empty($email) || empty($country)){
			header("Location: ../signup.html?error=emptyfields&uname=" . $username . "fname=" . $firstName . "lname=" . $partnerName . "email=" . $email . "country=" . $country);
			exit();
		}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
			header("Location: ../signup.html?error=invalidmail&uname" . $username);
			exit();
		}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header("Location: ../signup.html?error=invalidmail&uname" . $username);
			exit();
		}
		elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
			header("Location: ../signup.html?error=invaliduname&mail" . $mail);
		    exit();
		}
		elseif($password !== $repeat_password){
			header("Location: ../signup.html?error=passwordcheckuname=" . $username . "&mail=" . $mail);
		    exit();
		}else{
			
		$sql ="SELECT username FROM users_couples WHERE username=?";
		$stmt = mysqli_stmt_init($conn);
		    if(!mysqli_stmt_prepare($stmt,$sql)){
	        header("Location: ../signup.html?error=sqlerror");
		    exit();
        }else{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
		    $result = mysqli_stmt_num_rows($stmt);
			if($result > 0){
				header("Location: ../signup.html?error=usernametaken&email=" . $email);
			    exit();
			}else{
				$sql = "INSERT INTO users_couples(user_firstname, user_lastname, username, password, email, country ) VALUES (?,?,?,?,?,?)";
				$stmt = mysqli_stmt_init($conn);
		        if(!mysqli_stmt_prepare($stmt,$sql)){
	                header("Location: ../signup.html?error=sqlerror");
		            exit();
            }else{
				$hashPwd= password_hash($password , PASSWORD_DEFAULT);
			    mysqli_stmt_bind_param($stmt, "ssssss", $firstName, $partnerName, $username, $hashPwd, $email, $country);
			    mysqli_stmt_execute($stmt);
			    mysqli_stmt_store_result($stmt);
				header("Location: ../signup.html?signup=succes");
			}
		}
	}
	}
	}else{ 
	    header("Location: ../signup.html");
	}