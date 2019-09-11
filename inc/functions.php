<?php 

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
			
			echo "<div class='comment-box'><p>";
			echo $usercomment . " " ."says:" .  "<br>" . nl2br($post) . "<br>" ;
			echo "<p align='right'>" . $date_time . "</p>";
			
			if($_SESSION['user_username'] == $usercomment){
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
				    <input type='submit' name='delete' value='Delete'>
				</form>
			</div>";
			}
		echo "<hr>";
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
			




?>