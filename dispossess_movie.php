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

  
  if(isset($_POST["Submit"]))
{
  $username="'".$_POST["username"]."'";
  $movie=$_POST["movie"]; 
  $userErr="";
  $titleErr="";  
  $counter=0;  
     
    
    
  
  $message = "select * from user where user_name = ".$username; 
  $result=mysqli_query($conn, $message);
  $row=mysqli_fetch_assoc($result);
  
  
    
  if(mysqli_affected_rows($conn)==0)
  {
    $userErr="This Username does not exist on the database. Try again.";
    $counter=$counter+1;
  }
    
  $titles= [];
  $dates= [];   
    
  $titles= explode("-", $row['movies']);
  $dates= explode("-", $row['dates']); 
    
    
   
  
    
    
    
    
  $index = array_search($movie, $titles);
  
  
    
    
    
  if ($index===false)
  {
  $titleErr="this movie is not in posession";
  $counter=$counter+1;  
  }
  else  
  {
    
  array_splice($titles, $index, 1);
  array_splice($dates, $index, 1);  
  
  }  
  
  
    
    
   $title_input= implode("-", $titles); 
   $date_input= implode("-", $dates); 
   $title_input= "'".$title_input."'";
   $date_input= "'".$date_input."'"; 
    
  
   $message = "update user set movies=".$title_input." where user_name = ".$username;
   
   mysqli_query($conn, $message);
    
   $message = "update user set dates=".$date_input." where user_name = ".$username;
  
   mysqli_query($conn, $message); 
    
    
  
    
    
  
    
  }

?>
 

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport content="with=device-width, intitial-scale=1.0" charset="utf-8">
  <title>Disposses User</title>
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
		<div class="title">Disposing A Movie From A User...</div><br>
    
	
		<form action="" method="post">
                               
			<br><label> Username Of whom Movie Will Be Disposed: </label>
    		<input type="text" name="username" required> 
            <p style="color:red"> <?php echo $userErr;?> </p>                                   
             
            <br><label> Name of movie: </label>
    		<input type="text" name="movie" required>      
            <p style="color:red"> <?php echo $titleErr;?> </p>                                

  			<br><input class="heroBtnRed" type="Submit" id="submit" name="Submit" value="Submit">    
  		</form>
    </div>
   	<div class="backLink">                                                                    
  		<br><a href='admin.html'> Back to Menu </a> 
 	</div> 
</section> 
</body>
</html>
  
