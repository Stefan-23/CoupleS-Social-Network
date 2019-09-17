<?php
ob_start();
require "inc/db_connect.php";
include "inc/functions.php";
session_start();

include "inc/hf/header.php" ;
?>


<body id="home1">
    <div id="nav"> 
        <ul>
	
            <li class="dropdown">
		        <button class="dropbtn">News</button>
                    <div class="dropdown-content">
                        <a href="homepage.php">Comments</a>
                        <a href="news/picturespage.php">Pictures</a>         
                    </div>
		    </li>
        
        
		        <img src="pictures/logo.png" alt="logo" id="logo">
        
		    <li style="float:right">
		        <a class="active" href="inc/session.php">LOG OUT</a>
		    </li>
		    
			<li style="float:right">
			    <a class="active" href="profile.php"><?php echo $_SESSION["user_username"]; ?></a>
			</li>
        </ul>
    </div> 
	
	<div id="homepage">
        <div id="posts">
		    <form method="POST" action="#" onsubmit="" enctype="multipart/form-data">
                <h2> 
				Post comments
				</h2>
		
		    <div class="form-group purple-border">
                		
                <textarea class="form-control" placeholder="Type something..."id="exampleFormControlTextarea4" rows="3" name="text"></textarea>
            
			</div>
			
			<input class="btn btn-primary" type="submit" name="input" value="Comment" style="float:right;">
                    
			</form>
			
		</div> 
		<hr>
		<br> <br> 
		
		<h3> News feed </h3>


<?php showComments($conn);  ?>


 

	
<?php include "inc/hf/footer.php"; ?>