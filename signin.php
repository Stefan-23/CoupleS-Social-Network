<html>
<head lang="en">
    <meta charset="UTF-8"> 
    <title> Couples </title>
    <link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div> 
    <div id="nav"> 
    <ul>
        <li><a class="transition" href="index.php"> HOME </a></li>
        <li><a class="transition" href="about.php">ABOUT</a></li>
        <img src="pictures/logo.png" alt="logo" id="logo">
        <li style="float:right"><a class="active" href="signin.php">SIGN UP</a></li>
		<li style="float:right"><a class="active" href="login.php">LOG IN</a></li>
    </ul>
</div>

<div id="main3">

<h1> SIGN UP </h1>
        <div class="container">
        <form action="#" method="POST">
        
            <label for="uname"><b> Username: </b></label>
            <input type="text" placeholder="Enter Username" name="uname">
                    <br>
            <label for="password"><b> Password: </b></label>
            <input type="password" placeholder="Enter Password" name="password" >
			        <br>
			<label for="fname"> <b> First name: </b></label>
			<input type="text" placeholder="Your first name" name="fname">
			        <br>
			<label for="lname"> <b> Partner name: </b> </label>
			<input type="text" placeholder="Your partner name" name="lname">
			        <br>
			<label for="email"> <b> E-mail: </b> </label>
			<input type="text" placeholder="E-mail" name="email">
			        <br>
			<label for="email"> <b> Country: </b> </label>
			<input type="text" placeholder="Where are you from?" name="email">
                    <br> <br>
            <button type="submit" name="insert" value="insert" >SIGN IN</button>      
        </form>
		</div>
<div id="footer">
<?php
    session_start();


    if(isset($_POST['insert'])){                   
		if(isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && !empty($_POST['country'])){                          
	        if(!empty($_POST['uname']) && !empty($_POST['password']) && !empty($_POST['fname']) && !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['country'])){
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
        require 'inc/db_connect.php';
            $username    = mysqli_real_escape_string($conn,$username);
			$password    = mysqli_real_escape_string($conn,$password);
			$firstName   = mysqli_real_escape_string($conn,$firstName);
			$partnerName = mysqli_real_escape_string($conn,$partnerName);
            $email       = mysqli_real_escape_string($conn,$email);
			$country     = mysqli_real_escape_string($conn,$country);
		   $query = "INSERT INTO users_couples(user_firstname, user_lastname, username, password, email ) VALUES ('{$firstName}','{$partnerName}','{$username}','{$password}','{$email}')";
                               
		if(mysqli_query($conn,$query) === TRUE){
		echo "Succesful sign-up ";
		header("location:login.php");
		exit();
	        }else {
		echo "Error";
	    }
		}else {
			echo "You must fill all fields";
		}
		}else {
			echo "Error";
		}
	}
?>
<div>



</div>
</div>
</body>
</html>