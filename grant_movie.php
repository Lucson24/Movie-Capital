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
  $user="'".$_POST["username"]."'";
  $movie="'".$_POST["movie"]."'";
  $userErr="";
  $titleErr="";  
  $counter=0;  
    
  $message= "select * from user where user_name=".$user;  
  $result=mysqli_query($conn, $message);   
  $row=mysqli_fetch_assoc($result);
  
  if(mysqli_affected_rows($conn)==0)
  {
    $userErr= "user does not exist";
    $counter=$counter+1;
  }
    
     
    
  $message= "select * from movies where title=".$movie;
    
  mysqli_query($conn, $message);
  
  if(mysqli_affected_rows($conn)==0)  
  {
    $titleErr= "movie does not exist in our database. You may have to add it first";
    $counter=$counter+1;
  } 
  
    
  if ($counter==0)  
  {  
  $lenght=strlen($row['movies']);  
    
  if($lenght>0)
  {  
  $message="update user set movies=CONCAT(movies, '-', ".$movie.") where user_name=".$user;
  $result=mysqli_query($conn, $message);
  
  $message="update user set dates=CONCAT(dates, '-', '".date("Y/m/d")."') where user_name=".$user;
  mysqli_query($conn, $message);  
   
  }
  else
  {
  $message="update user set movies=CONCAT(movies, ".$movie.") where user_name=".$user;
  $result= mysqli_query($conn, $message);
  
  $message="update user set dates=CONCAT(dates, '".date("Y/m/d")."') where user_name=".$user;
  mysqli_query($conn, $message);  
    
  }
    
   echo '<script>alert("Movie Successfully Granted")</script>'; 
  }  
    
    
  
  }
    
    
  
  
  

?>
 

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport content="with=device-width, intitial-scale=1.0" charset="utf-8">
  <title>Grant Movie</title>
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
		<div class="title">Granting Movie To A user...</div><br>
    
	
		<form action="" method="post">
                               
			<br><label> Username To Whom Movie Will Be Granted: </label>
            <p style="color:red"> <?php echo $userErr;?> </p>                          
    		<input type="text" name="username" required>  
             
                                              
             <br><br><label> Name Of Movie To Be Granted: </label>
             <p style="color:red"> <?php echo $titleErr;?> </p>                                  
    		<input type="text" name="movie" required>

  			<br><input class="heroBtnRed" type="submit" id="submit" name="submit" value="Submit">    
  		</form>
    </div>
   	<div class="backLink">                                                                    
  		<br><a href='admin.html'> Back to Menu </a> 
 	</div> 
</section> 
</body>
</html>
  
