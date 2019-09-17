<?php 
ob_start();
require "db_connect.php";

function showComments($conn){
	if(isset($_POST['input'])){
			if(!empty($_POST['text'])){
			    $username = $_SESSION['user_username'];
			    $comment = $_POST['text'];
			
			    $sql="INSERT INTO posts (post_by,post_caption, date_comment) VALUE ('{$username}','{$comment}', NOW()) ";
	            $query = mysqli_query($conn,$sql);
			}else{
				echo "You must type in something! <br>";
			}
			header("Location: " . $_SERVER["REQUEST_URI"]); //pervent duplicate submit on refreshing page
            exit;
		}
		
	    $sql1= "SELECT*FROM posts";
        $find_comments=mysqli_query($conn,$sql1);
		
		if(mysqli_num_rows($find_comments) == 0){
			echo "<h3 align='center'>No posts to show!</h3>";
		}
		
		while($row=mysqli_fetch_assoc($find_comments)){
			$usercomment = $row['post_by'];
			$post= $row['post_caption'];
			$date_time = $row['date_comment'];
			
			echo "<div class='comment-box'><p>
			<div class='comment-response'<p>";
			echo "<b>" . $usercomment . "</b>" . " " ."says:" .  "<br>" . nl2br($post) . "<br>" ;
			echo "<p align='right'>" . $date_time . "</p></div>";
			
			if($_SESSION['user_username'] == "admin"){
			echo "</p> 
			
			    <form class='edit_form' method='POST' action='inc/editcomments.php'>
				    <input type='hidden' name='id_post' value='". $row['id_post'] ."'>
					<input type='hidden' name='post_by' value='". $row['post_by'] ."'>
					<input type='hidden' name='post_caption' value='". $row['post_caption'] ."'>
					<input type='hidden' name='date_comment' value='". $row['date_comment'] ."'>
				    <input type='submit' value='Edit'>
				</form>
				<form class='delete_form' method='POST' action='".deleteComments($conn)."'>
				    <input type='hidden' name='id_post' value='". $row['id_post'] ."'>
				    <input type='submit' name='delete' value='Delete'> <br>
				</form>
			</div>";
			}elseif($_SESSION['user_username'] == $usercomment){
				echo "</p> 
			
			    <form class='edit_form' method='POST' action='inc/editcomments.php'>
				    <input type='hidden' name='id_post' value='". $row['id_post'] ."'>
					<input type='hidden' name='post_by' value='". $row['post_by'] ."'>
					<input type='hidden' name='post_caption' value='". $row['post_caption'] ."'>
					<input type='hidden' name='date_comment' value='". $row['date_comment'] ."'>
				    <input type='submit' value='Edit'>
				</form>
				<form class='delete_form' method='POST' action='".deleteComments($conn)."'>
				    <input type='hidden' name='id_post' value='". $row['id_post'] ."'>
				    <input type='submit' name='delete' value='Delete'> <br>
				</form>
			</div>";
			}
		
		}
}

function editComments($conn){
	if(isset($_POST['edit'])){
		$id=$_POST['id_post'];
		$usercomment =$_POST['post_by'];
		$post = $_POST['post_caption'];
	    $date_time = $_POST['date_comment'];
		
		$sql = "UPDATE posts SET post_caption='$post' WHERE id_post='$id'";
		$result = $conn->query($sql);
		{
		
		  header("Location:../homepage.php");
		
		}
	
	}
}

function deleteComments($conn){
	if(isset($_POST['delete'])){
		$id=$_POST['id_post'];

		$sql = "DELETE FROM posts WHERE id_post='$id'";
		$result = $conn->query($sql);
	    header("Location: " . $_SERVER["REQUEST_URI"]);
		exit;
	}
}

function imgUpload($conn){
	if(isset($_POST['img_upl'])){
		   
		   $file = $_FILES['file']['name'];
		   
		   $user_image = $_SESSION["user_username"];
		   $destination = "../inc/uploads/" . basename($file);
		   
	       $sql = "INSERT INTO image_upload(image,user_image) VALUE ('$file','$user_image')";
		   $query = mysqli_query($conn,$sql);
		   if($query){
			   mysqli_error($conn);
		   if(move_uploaded_file($_FILES['file']['tmp_name'],$destination)){
			   echo "Image uploaded succesfull!";
		   }else{
			   echo "Error uploading image";
		   }
		   }else echo mysqli_error($conn);
	    header("Location: " . $_SERVER["REQUEST_URI"]);
		exit;
	   }
    
}
function showImages($conn){
	
		$sql = "SELECT*FROM image_upload";
		$query = mysqli_query($conn,$sql);
		
		if(mysqli_num_rows($query) == 0){
			echo "<h3 align='center'>No posts to show!</h3>";
		}
		
		while($row=mysqli_fetch_assoc($query)){
			$user_img = $row['user_image'];
			
	    echo "<b>" . $row['user_image'] . ": </b>" . "<br>" . "<div class='images_box'>";
        echo "<img id='imagepost' src='../inc/uploads/".$row['image']."' height='500px' width='600px'>";
        echo "</div><br><hr class='hr'>";
		if($_SESSION['user_username'] == "admin"){
		echo "<form class='delete_form' method='POST' action='".deleteImages($conn)."'>
				    <input type='hidden' name='id_image' value='". $row['id_image'] ."'>
				    <input type='submit' name='delete_pic' value='Delete'> <br>
				</form>";
		}elseif($_SESSION['user_username'] == $user_img){
		echo "<form class='delete_form' method='POST' action='".deleteImages($conn)."'>
				    <input type='hidden' name='id_image' value='". $row['id_image'] ."'>
				    <input type='submit' name='delete_pic' value='Delete'> <br>
				</form>";
				
		}
		}
		
		}
			
			

function deleteImages($conn){
 	if(isset($_POST['delete_pic'])){
		$id_img=$_POST['id_image'];
           
		$sql = "DELETE FROM image_upload WHERE id_image ='$id_img'";
		$result = $conn->query($sql);
	    header("Location: " . $_SERVER["REQUEST_URI"]);
		exit;
    }
}
