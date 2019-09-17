<?php
ob_start();
require_once "inc/db_connect.php";
session_start();

$id=$_SESSION["user_username"];
$result3 = mysqli_query($conn,"SELECT * FROM users_couples WHERE username='$id'");
while($row3 = mysqli_fetch_array($result3))
{ 
$fname   = $row3['user_firstname'];
$lname   = $row3['user_lastname'];
$address = $row3['username'];
$contact = $row3['email'];
$country = $row3['country'];
}
include "inc/hf/header.php";
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
 
		<h3> Your Profile Information </h3>
    <table width="398" border="0" align="center" cellpadding="0">
  
        <tr>
            <td width="129" rowspan="5"><img src="pictures/profile.png" width="129" height="129" alt="no image found"/></td>
            <td width="82" valign="top"><div align="left">FirstName:</div></td>
            <td width="165" valign="top"><?php echo $fname ?></td>
        </tr>
        <tr>
            <td valign="top"><div align="left">Partner name:</div></td>
            <td valign="top"><?php echo $lname ?></td>
        </tr>
        <tr>
            <td valign="top"><div align="left">Username:</div></td>
            <td valign="top"><?php echo $address ?></td>
        </tr>
        <tr>
            <td valign="top"><div align="left">Email: </div></td>
            <td valign="top"><?php echo $contact ?></td>
        </tr>
        <tr>
            <td valign="top"><div align="left">Country: </div></td>
            <td valign="top"><?php echo $country ?></td>
        </tr>
    </table>
<?php include "inc/hf/footer.php"; ?>


