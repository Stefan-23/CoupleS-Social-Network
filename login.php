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

<div id="login">
<h1> LOG IN </h1>
<?php 

if(isset($_GET["error"])){
        if($_GET["error"] == "emptyfields"){
			echo "You must fill all fields!";
			
		}elseif($_GET["error"] == "wrongpassword"){
		    echo "Password wrong!";
		}
		elseif($_GET["error"] == "nouser"){
			echo "Invalid user!";
			
		}
	}
	
?>
        <form action="inc/login.php" method="POST">
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="logname">
                    <br>
                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="logpassword" >
			
                <button class="button" type="submit" name="submit">LOG IN</button>
				
            </div>
        
        </form>
</div>
</div>
</body>
</html>