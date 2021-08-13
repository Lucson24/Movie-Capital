<!DOCTYPE html>

<?php
  
$serverName="localhost"; 

$userName="laraara_movies"; 

$password="movies"; 

$name="laraara_movies"; 

  

$conn = mysqli_connect($serverName, $userName, $password, $name); 

  

if ($conn == false) 

{ 

  echo "unable to connect to database! "; 

  echo 'Connection error: ' . mysqli_connect_error(); 

} 

  
  if(isset($_POST["submit"]))
{
  $username="'".$_POST["username"]."'"; 
 
   $message= "delete from user where user_name =".$username;
   
    
  $result=mysqli_query($conn, $message);
    
    
  
  if(mysqli_affected_rows($conn)==0)
  {
    echo '<script>alert("User does not exist on the database. Try again.")</script>';
    
  }
   else
   {
    echo '<script>alert("User successfully removed")</script>';
   }
    
  }
  

 ?>












<html>
<head>
  <meta name="viewport content="with=device-width, intitial-scale=1.0" charset="utf-8">
  <title>Remove User</title>
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
		<div class="title">Remove A User...</div><br>
    
	
		<form action="remove_user.php" method="post">
       
			<br><label> Username of user to be removed: </label>
    		<input type="text" name="username" required>
        

  			<br><input class="heroBtnRed" type="submit" id="submit" name="submit" value="Submit">    
  		</form>
    </div>
   	<div class="backLink">                                                                    
  		<br><a href='admin.html'> Back to Menu </a> 
 	</div> 
</section> 
</body>
</html>
                         
