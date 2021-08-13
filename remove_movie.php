<!DOCTYPE html>
<html>
<head>
  <meta name="viewport content="with=device-width, intitial-scale=1.0" charset="utf-8">
  <title>Remove Movie</title>
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
  
  		<div class="title">Remove a movie...</div><br>
  		<form action="" method="post" id="form">
                                               
  			<label for="ltitle" id="ltitle"> Title of movie you want to remove:  </label>
  			<input type="title" id="title" name="title"><br><br>
    
            <input class="heroBtnRed" type="submit" id="submit" name="submit" value="Submit">                                                             
  		</form>
 </div>
                                                               
 <div class="backLink">                                                                    
  <br><a href='admin.html'> Back to Menu </a> 
 </div> 
</section>  
                                                               
 <?php
  /*
connecting to database
*/  
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
  
 
 
   /*
deleting movie from database
*/  
  
  $message= "delete from movie where title =".$title;
  
  $result=mysqli_query($conn, $message);
    
    /*
cchecking if successful
*/  
  
  if(mysqli_affected_rows($conn)==0)
  {
    echo '<script>alert("This title does not exist on the database. Try again.")</script>';
    
  }
   else
   {
    echo '<script>alert("Movie successfully removed")</script>';
   }
    
  }
  
 
 

 ?>
  
  
  
  

</body>
</html>