<?php
ob_start();
require "../inc/db_connect.php";
include "../inc/functions.php";
session_start();

?>
<html>
<head>
    <meta charset="UTF-8">
	<title> CoupleS </title>
	<link href="../bootstrap.css" type="text/css" rel="stylesheet">
	<link href="../style.css" type="text/css" rel="stylesheet">
	
</head>
<body id="home1"> 
    <div id="nav"> 
        <ul>
	        <li class="dropdown">
		        <button class="dropbtn">News</button>
                <div class="dropdown-content">
                    <a href="../homepage.php">Comments</a>
                    <a href="picturespage.php">Pictures</a>
                </div>
		    </li>
        
                <img src="../pictures/logo.png" alt="logo" id="logo">
        
		    <li style="float:right">
		        <a class="active" href="../inc/session.php">LOG OUT</a>
			</li>
		    <li style="float:right">
		        <a class="active" href="../profile.php"><?php echo $_SESSION["user_username"]; ?></a>
            </li>
    </ul>
    </div> 
	
	<div id="homepage">
        <div id="posts">
		    <form method="POST" action="#" onsubmit="" enctype="multipart/form-data">
                <h2> 
				Post pictures 
				</h2>
				
			    <form action="inc/upload.php" method="POST" enctype="multipart/form-data">
			        <label>
       			
				        <img src="../pictures/iconcamera.png" id="iconc">
			    
				        <input type="file" name="file" id="file">
				            <br>
				        <input class="btn btn-primary" type="submit" name="img_upl" value="Upload">
			        </label>
			    </form>
			</form>
			<?php imgUpload($conn); ?>
			<hr>
		</div> 
	
        	<br> 
	        <br>
		
		<h3> 
		News feed 
		</h3>
<?php
		showImages($conn);	
?>


 

	
</div>
</body>
</html>