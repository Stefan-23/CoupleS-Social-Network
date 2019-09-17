<?php
if(isset($_POST["img_upl"])){
	    $username = $_SESSION['user_username'];
	    $fileName = $_FILES["file"]["name"];
	    $fileTmp = $_FILES["file"]["tmp_name"];
	    $fileSize = $_FILES["file"]["size"];
	    $fileError = $_FILES["file"]["error"];
	
	    $fileExt = explode(".",$fileName);
	    $fileActualExt = strtolower(end($fileExt));
	
	    $allowed = array("jpg","jpeg", "png");
	
	    if(in_array($fileActualExt,$allowed)){
	        if($fileError === 0){
		        if($fileSize < 1000000){
			        $fileNewName = uniqid('',true). "." . $fileActualExt;
			        $destination = "uploads/" . $fileNewName;
			        if(move_uploaded_file($fileTmp, $destination)){
						echo $username . "<img src=".$destination." height=200 width=300 />";
					};
					header("Location: ../homepage.php?imgUploaded!");
                    
		    }else{
			    echo "Your file is to big";
		    }
	    }
	    }else{
		    echo "You can't upload files of this type";
	    } 
    }