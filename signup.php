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
        <li><a class="transition" href="index.html"> HOME </a></li>
        <li><a class="transition" href="about.html">ABOUT</a></li>
        <li style="float:right"><a class="active" href="signup.php">SIGN UP</a></li>
		<li style="float:right"><a class="active" href="login.php">LOG IN</a></li>
    </ul>
</div>

<div id="main3">

<h1> SIGN UP </h1>
<?php 
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyfields"){
			echo "You must fill all fields!";
			
		}
		elseif($_GET["error"] == "invalidmail&uname"){
			echo "Invalid mail!";
			
		}elseif($_GET["error"] == "passwordcheck"){
			echo "Password did not match!";
			
		}elseif($_GET["error"] == "usertaken"){
			echo "E-mail and username are taken!";
		}
		elseif($_GET["error"] == "passwordshort"){
		    echo "Password must be 6 characters long!";
		}
	}
	
	if(isset($_GET["signup"])){
		if($_GET["signup"] == "succes"){
			echo "Sign in succesful!";
	}
	}
?>
        <div class="container">
        <form action="inc/signin.php" method="POST">
        
            <label for="uname"><b> Username: </b></label>
            <input type="text" placeholder="Enter Username" name="uname">
                    <br>
            <label for="password"><b> Password: </b></label>
            <input type="password" placeholder="Enter Password" name="password" >
			        <br>
			<label for="password"><b> Repeat password: </b></label>
            <input type="password" placeholder="Enter Password" name="password-repeat" >
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
			<label for="country"> <b> Country: </b> </label>
			<input type="text" placeholder="Where are you from?" name="country">
                    <br> <br>
            <button class="button" type="submit" name="insert" value="insert" >SIGN IN</button>      
        </form>
		</div>
<div id="footer">
</div>
</body>
</html>