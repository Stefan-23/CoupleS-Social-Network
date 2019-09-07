<?php
require "inc/db_connect.php";
session_start();

?>
<html>
<head>
    <meta charset="UTF-8">
	<title> CoupleS </title>
	<link href="style.css" type="text/css" rel="stylesheet">
	<link href="bootstrap.css" type="text/css" rel="stylesheet">
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
		</div> <br> <br> <br> <br>
		
		<h3 style="text-align:center; padding:2px; font-family:Brush Script MT, sans-serif;"> News feed </h3>
<?php
        
        if(isset($_POST['input'])){
			$username= $_SESSION['user_username'];
			$comment = $_POST['text'];
			
			
			$sql="INSERT INTO posts (post_by,post_caption) VALUE ('{$username}','{$comment}') ";
	        $query = mysqli_query($conn,$sql);
	    if(!$query){
		    echo mysqli_error($conn);
		}     
		}
	    $sql1= "SELECT*FROM posts";
        $find_comments=mysqli_query($conn,$sql1);
		
		while($row=mysqli_fetch_assoc($find_comments)){
			$username=$_SESSION['user_username'];
			$post= $row['post_caption'];
			
			echo $username . ":". "<br>" . $post . "<br>" . "<hr>";?>
			<form method="POST" action="#">
                <textarea name="txt-rpl"> </textarea> <br>
				<input type="submit" name="reply" value="Reply">
			</form><?php
		}
		if(isset($_POST['reply'])){
	    if(!empty($_POST['reply'])){
		    $user= $_SESSION["user_username"];
			$reply=trim($_POST["txt-rpl"]);
			
		$query1="INSERT INTO posts (post_by,reply) VALUE ('{$user}','{$reply}') ";
			$repyls= mysqli_query($conn,$query1);
			if(!$repyls){
				echo mysqli_error($conn);
			}
	    }
		/*$sql="SELECT*FROM posts WHERE reply=1";
		$result = mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result)){
			echo $row["reply"];
		}*/
		
	}
?>
</div>
</body>

</html>