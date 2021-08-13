<!DOCTYPE html>
<html>
<head>
  <meta name="viewport content="with=device-width, intitial-scale=1.0" charset="utf-8">
  <title>Change Rating</title>
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
  
  		<div class="title">Change Rating...</div><br>

  		<form action="" method="post" id="form">
  
  			<label for="ltitle" id="ltitle"> Title of movie whose rating you want to change:  </label>
  			<input type="title" id="title" name="title"><br><br>
  
   			Updated rating<br>  
			<input type="radio" id="PG" name="rating" value="PG">
			<label for="PG-">PG</label><br>
			<input type="radio" id="PG 13" name="rating" value="PG13">
			<label for="PG 13"> PG13 </label><br>
			<input type="radio" id="G" name="rating" value="G">
			<label for="G">G</label><br>
			<input type="radio" id="R" name="rating" value="R">
			<label for="R">R</label><br>
			<input type="radio" id="NC 17" name="rating" value="NC17">
			<label for="NC 17">NC17</label><br>

  			<input class="heroBtnRed" type="submit" id="submit" name="submit" value="Submit">    
  		</form>
    </div>
   	<div class="backLink">                                                                    
  		<br><a href='admin.html'> Back to Menu </a> 
 	</div> 
</section> 
  
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
  $title="'".$_POST["title"]."'"; 
  $rating="'".$_POST["rating"]."'";  
  
 
 
   
  
  $message= "update movies set rating=".$rating."where title=".$title;
  
  $result= mysqli_query($conn, $message);
  
    
    
  
  if(mysqli_affected_rows($conn)==0)
  {
   echo '<script>alert("This title does not exist on the database. Try again.")</script>';
  }
   else
   {
    echo '<script>alert("Rating successfully changed")</script>';
   }
    
  }
  
 
 

 ?>
  
  
  
  

</body>
</html>