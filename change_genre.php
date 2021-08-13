<!DOCTYPE html>
<html>
<head>
  <meta name="viewport content="with=device-width, intitial-scale=1.0" charset="utf-8">
  <title>Add Movie</title>
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
  
  		<div class="title">Change Genre...</div><br>

  		<form action="" method="post" id="form">
  
  			<label for="ltitle" id="ltitle"> Title of movie whose genre you want to change:  </label>
  			<input type="title" id="title" name="title"><br><br>
  
  			Select new genre <br>
 			<input type="radio" id="horror" name="genre" value="Horror">
 			<label for="horror">horror</label><br>
 			<input type="radio" id="romance" name="genre" value="Romance">
 			<label for="romance">romance</label><br>
 			<input type="radio" id="Superhero" name="genre" value="Superhero">
 			<label for="Superhero">Superhero</label><br>
 			<input type="radio" id="documentary" name="genre" value="Documentary">
 			<label for="documentary">documentary</label><br>
 			<input type="radio" id="sports" name="genre" value="Sports">
 			<label for="sports">sports</label><br> 

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
    /*
geting variables from posted form
*/  
  $title="'".$_POST["title"]."'"; 
  $genre="'".$_POST["genre"]."'";  
  
 
 
   /*
updating database
*/  
  
  $message= "update movies set genre=".$genre."where title=".$title;
  
  $result= mysqli_query($conn, $message);
  
    
    
  
  if(mysqli_affected_rows($conn)==0)
  {
   echo '<script>alert("This title does not exist on the database. Try again.")</script>';   
  }
   else
   {
     echo '<script>alert("Genre successfully changed")</script>'; 
   }
    
  }
  
 
 

 ?>
  


</body>
</html>