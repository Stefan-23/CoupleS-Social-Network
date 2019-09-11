<?php

	require("db_connect.php");

	if(isset($_POST["logname"])){
	    $username = trim($_POST['logname']);
	    $password = trim($_POST['logpassword']);

        if(empty($username) || empty($password)){
            header("Location: ../login.html?error=emptyfields");
            exit();
        }else{
            $sql= "SELECT*FROM users_couples WHERE username=? OR password=?";
            $stmt=mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: ../login.html?error=sqlerror");
                exit();
        }else{
            mysqli_stmt_bind_param($stmt, "ss", $username,$password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
	        if($row=mysqli_fetch_assoc($result)){
		        $pwdCheck = password_verify($password, $row["password"]);
		            if($pwdCheck == FALSE){
			            header("Location: ../login.html?error=wrongpassword");
                        exit();
		            }elseif($pwdCheck == TRUE){
                        session_start();
                        $_SESSION["userId"] = $row["user_id"];
                        $_SESSION["user_username"] = $row["username"];

 						header("Location: ../homepage.php?login=succes!");
                        exit();
		        }else{
			   header("Location: ../login.html?error=passwordnotmatch");
               exit();
		    }
	    }else{
		    header("Location: ../login.html?error=nouser");
            exit();
	   }
    }
}
}  
