<!DOCTYPE html>
<html>
<head>
<title>Movie Capital- Adminlogin</title>
 <meta name="description" content="The easiest way to log into our site as an administrator is by opening the website hosting service, logging in, and finding the control panel from there. We are aware of the latest techniques needed to create the best."/>
<!-- importing styles -->
<link rel="stylesheet" type="text/css" title="Normal" href="styleAdminLogin.css" />
<link rel="alternate stylesheet" type="text/css" title="Halloween" href="styleAdminLogin2.css" />
<link rel="alternate stylesheet" type="text/css" title="Christmas" href="styleAdminLogin3.css" />
</head>
  
<body>

 <?php
  
/*
connecting to database
*/
  
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

 
    
  
  if (isset($_POST['submit']))
  {
    
  $user="'".$_POST['uname']."'";
  $pw= "'".$_POST['pw']."'";
  
 /*
checking if user is on database with the appropiate password
*/   
  $message="select * from admin where USERNAME=".$user." and PASSKEY=".$pw;
  mysqli_query($conn, $message);
  
  if(mysqli_affected_rows($conn)==0)
  {
   echo "<script> alert('Wrong username or password') </script>";
  } 
  else 
  {
    /*
if user and password correspond, user is transported to admin profile.
*/  
   echo "<script> window.location.href = 'https://laraara.myweb.cs.uwindsor.ca/project/admin/admin.html'  ;  </script>";
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


  
  

 <form action="" method="post">
<h2 id="loginText" style="color:red">ADMINISTRATOR LOGIN</h2>
<table>
  <span class="error"> <?php echo $errMessage ?> </span>
<tr>
<td>Username:</td>
<td colspan="3">
<input type="text" id="uname" name="uname" value="" />
</td>
</tr>
  
<tr>
<td>Password:</td>
<td colspan="3">
<input type="password" id="pw" name="pw" value="" />
</td>
</tr>

<tr>
<td colspan="4" id="buttonsTd">
<input type="submit" value="submit" id="submit" name="submit" />
 
  
  
  
  
  
</td>
</tr>
</table>
</form> 
  
  
</body>
</html>