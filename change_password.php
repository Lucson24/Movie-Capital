<!DOCTYPE html>

<?php
$serverName = "localhost";
$userName = "laraara_movies";
$password = "movies";
$name = "laraara_movies";

$conn = mysqli_connect($serverName, $userName, $password, $name);

if ($conn == false)
{
    echo "unable to connect to database! ";
    echo 'Connection error: ' . mysqli_connect_error();
}


if (isset($_POST['submit']))
{
  $username = "'".$_POST['username']."'";
  $oldPass = "'".$_POST['old_pswd']."'";
  $newPass = "'".$_POST['new_pswd']."'";
  
  $message = "update user set passkey = ".$newPass." where passkey = ".$oldPass." and user_name = " .$username;
  
   $q = mysqli_query($conn, $message);
  $result = mysqli_affected_rows($conn);
  
  if ($result == 0)
    {
        echo '<script>alert("Username or Password does Not Exist")</script>';
    }
  else
    {
        
        echo '<script>alert("Password succesfully Changed")</script>';
    }
           
}

?>


<html>
<head>
  <meta name="viewport content="with=device-width, intitial-scale=1.0" charset="utf-8">
  <title>Add User</title>
  <link rel="stylesheet" type="text/css" href="admin.css">
  <!--linking google fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
                                                                                                                        
</head>   
<body>
<section class="main">
    <!--adding logo and ability to click on it-->
	<a href="homepage.html"><img src="logo3.png"></a>  
                                                
    <div class="container">  
		<div class="title">Change A Password...</div><br>
    
	
		<form action="change_password.php" method="post">
       
			<br><label> Username: </label>
    		<input type="text" name="username" required>
        
     		<br>
            <br>
     
     		<label>Current Password: </label>
     		<input type="password" name="old_pswd" required>
                                 
             <br>
            <br>
     
     		<label>New Password: </label>
     		<input type="password" name="new_pswd" required>

  			<br><input class="heroBtnRed" type="submit" id="submit" name="submit" value="Submit">    
  		</form>
    </div>
   	<div class="backLink">                                                                    
  		<br><a href='admin.html'> Back to Menu </a> 
 	</div> 
</section> 
</body>
</html>

