<?php 
session_start();
include "db_connect.php";
include "functions.php";
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
                        <a href="../news/picturespage.php">Pictures</a>
                    </div>
		    </li>
        
        
		        <img src="../pictures/logo.png" alt="logo" id="logo">
        
		    <li style="float:right">
		        <a class="active" href="inc/session.php">LOG OUT</a>
		    </li>
		    
			<li style="float:right">
			    <a class="active" href="../profile.php"><?php echo $_SESSION["user_username"]; ?></a>
			</li>
        </ul>
    </div> 
	
	<div id="homepage">
        <h2 align="center"> Edit your post... </h2>        
	
<?php

    $id_post = $_POST['id_post'];
    $usercomment=$_POST['post_by'];
    $post= $_POST['post_caption'];
	$date_time = $_POST['date_comment'];
	
	
	echo "     
	            <form class='edit_form' method='POST' action='".editComments($conn)."'>
				    <input type='hidden' name='id_post' value='". $_POST['id_post'] ."'>
					<input type='hidden' name='post_by' value='". $_POST['post_by'] ."'>
					<label for='exampleFormControlTextarea4'></label>
                <textarea class='form-control' id='exampleFormControlTextarea4' rows='3' name='post_caption'>".$post."</textarea>
					<br>
					<input type='hidden' name='date_comment' value='". $_POST['date_comment'] ."'>
				    <button type='submit' class='btn btn-primary' name='edit'> Edit </button>
				</form>
			";
?>
</div>
</body>
</html>

