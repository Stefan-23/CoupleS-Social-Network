<?php
require "inc/db_connect.php";
session_start();

?>
<html>
<head>
    <meta charset="UTF-8">
	<title> CoupleS </title>
	<link href="bootstrap.css" type="text/css" rel="stylesheet">
	<link href="style.css" type="text/css" rel="stylesheet">
	
</head>

<body id="home1">
    
	
	 <div> 
    <div id="nav"> 
    <ul>
	
        <li><a class="transition" href="homepage.php"> HOME </a></li>
        <li><a class="transition" href="about.html">ABOUT</a></li>
        
		<img src="pictures/logo.png" alt="logo" id="logo">
        
		<li style="float:right"><a class="active" href="inc/session.php">LOG OUT</a></li>
		<li style="float:right"><a class="active" href="#">PROFILE</a></li>
    </ul>
    </div> 
	
	<div id="homepage">
        <div id="posts">
		    <form method="POST" action="#" onsubmit="" type="multipart/form-data">
                <?php 
				    if(isset($_SESSION["userId"])){
						$username= $_SESSION["user_username"];
						echo "Hello" . " " .  $username;
				    }else{
						header("Location:login.html");
					}
				?>
                <h2 style="text-align:center; padding:2px; font-family:Brush Script MT, sans-serif;"> 
				Post something </h2>
				
                    <hr>
					
		    <div class="form-group purple-border">
                
				<label for="exampleFormControlTextarea4">Type something...</label>
                <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" name="text"></textarea>
            
			</div>
			<label>
			
       			<img src="pictures/iconcamera.png" id="iconc">
			    <input type="file" name="uplFile" id="file">
				
			</label>
			
			<input class="btn btn-primary" type="submit" name="input" value="Submit" style="float:right;">
                    
					<hr>
			
			</form>
		</div> <br> <br> <br> <br> <br>
		
		<h3 style="text-align:center; padding:2px; font-family:Brush Script MT, sans-serif;"> News feed </h3>
<?php
        include "inc/functions.php";
		
		showComments($conn);
        
		
		?>

	
</div>
</body>

</html>