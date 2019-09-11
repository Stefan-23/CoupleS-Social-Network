<?php
session_start();
include "db_connect.php";
include "functions.php";

    $id_post = $_POST['id_post'];
    $usercomment=$_POST['post_by'];
    $post= $_POST['post_caption'];
	$date_time = $_POST['date_comment'];
	
	
	echo "     
	            <form class='edit_form' method='POST' action='".editComments($conn)."'>
				    <input type='hidden' name='id_post' value='". $_POST['id_post'] ."'>
					<input type='hidden' name='post_by' value='". $_POST['post_by'] ."'>
					<textarea name='post_caption'>".$post."</textarea> <br>
					<input type='hidden' name='date_comment' value='". $_POST['date_comment'] ."'>
				    <input type='submit' name='edit' value='Edit'>
				</form>
			";
			
