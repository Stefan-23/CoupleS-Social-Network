<?php
    ob_start();
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
			    
	    if(empty($username) || empty($password) || empty($repeat_password) || empty($firstName) || empty($partnerName) || empty($email) || empty($country)){
			header("Location: ../signup.php?error=emptyfields&uname=" . $username . "fname=" . $firstName . "lname=" . $partnerName . "email=" . $email . "country=" . $country);
			exit();
		}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
			header("Location: ../signup.php?error=invalidmail&uname=" . $username);
			exit();
		}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header("Location: ../signup.php?error=invalidmail&uname=" . $username);
			exit();
		}
		elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
			header("Location: ../signup.php?error=invaliduname&mail=" . $mail);
		    exit();
		}elseif(strlen($password) < 6){
		    header("Location: ../signup.php?error=passwordshort");
			exit();
		}
		elseif($password !== $repeat_password){
			header("Location: ../signup.php?error=passwordcheck");
		    exit();
		}else{
			
		$sql ="SELECT username FROM users_couples WHERE username=?";
		$stmt = mysqli_stmt_init($conn);
		    if(!mysqli_stmt_prepare($stmt,$sql)){
	        header("Location: ../signup.php?error=sqlerror");
		    exit();
        }else{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
		    $result = mysqli_stmt_num_rows($stmt);
			if($result > 0){
				header("Location: ../signup.php?error=usertaken");
			    exit();
			}else{
				$sql = "INSERT INTO users_couples(user_firstname, user_lastname, username, password, email, country ) VALUES (?,?,?,?,?,?)";
				$stmt = mysqli_stmt_init($conn);
		        if(!mysqli_stmt_prepare($stmt,$sql)){
	                header("Location: ../signup.php?error=sqlerror");
		            exit();
            }else{
				$hashPwd= password_hash($password , PASSWORD_DEFAULT);
			    mysqli_stmt_bind_param($stmt, "ssssss", $firstName, $partnerName, $username, $hashPwd, $email, $country);
			    mysqli_stmt_execute($stmt);
			    mysqli_stmt_store_result($stmt);
				header("Location: ../signup.php?signup=succes");
			}
		}
	}
	}
	}else{ 
	    header("Location: ../signup.php");
	}
	
?>