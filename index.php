<!DOCTYPE html>
<html>
<head>
 <style>
.error {color: #FF0000;}
</style>  
<title>Movie Capital-Index</title>
 <meta name="description" content="Our index includes not just the URLs, but all content, including texts, images, videos and, in principle, everything within the HTML code of the URL. We are aware of the latest techniques needed to create the best."/>
<!-- importing styles -->
<!--<link rel="stylesheet" href="1.css" />-->
<link rel="stylesheet" type="text/css" title="Normal" href="styleindex1.css" />
<link rel="alternate stylesheet" type="text/css" title="Halloween" href="styleindex2.css" />
<link rel="alternate stylesheet" type="text/css" title="Christmas" href="styleindex3.css" />
</head>
  
<body>
 <?php
$errMessage="";
  
$user= "'".$_SESSION['user']."'";

$serverName="localhost"; 

$userName="laraara_movies"; 

$password="movies"; 

$name="laraara_movies"; 

  

$conn = mysqli_connect($serverName, $userName, $password, $name); 

  

if ($conn == false) { 

  echo "unable to connect to database! "; 

  echo 'Connection error: ' . mysqli_connect_error(); 

}

 
    
  
  if (isset($_POST['submit']   ))
  {
  $user="'".$_POST['uname']."'";
  $pw= "'".$_POST['pw']."'";
  $message="select * from user where user_name=".$user." and passkey=".$pw;
  mysqli_query($conn, $message);
  
  if(mysqli_affected_rows($conn)==0)
  {
  $errMessage="*Wrong username or password";
  } 
  else 
  {
   session_start();
   $_SESSION['user']=$_POST['uname']; 
     
   echo "<script> window.location.href = 'https://laraara.myweb.cs.uwindsor.ca/project/user/index.php'  ;  </script>";
  }  
  
  
  
  }
  
  
  ?>
  
  
<div id="header">
<!-- logo with title -->
<!--<img alt="Movie capital"
src="https://e7.pngegg.com/pngimages/285/477/png-clipart-web-development-web-design-internet-web-hosting-service-world-wide-web-logo-symmetry.png" />-->
  <img alt="Movie capital"
src="Images/logoSolo.png" />

<p id="headerTitle">Movie Capital</p>

</div>
  
  <form action="welcome.php" method="post">

Choose a genre: <br>
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

Choose a rating <br>
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


Do you want a discount? <br>
<input type="radio" id="yes" name="discount" value="yes">
<label for="yes">yes</label><br>

<input type="radio" id="no" name="discount" value="no">
<label for="no">no</label><br>


<br>
<input type="submit" value="Submit">
</form>





</body>

</html>