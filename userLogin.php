<!DOCTYPE html>
<html>
<head>
 <style>
.error {color: #FF0000;}
</style>  
<title>Movie Capital - Userlogin</title>
<meta name="description" content="When it comes to quick and easy login pages, Movie Capital just might take the prize. We are aware of the latest techniques needed to create the best."/>
<!-- importing styles -->
<!--<link rel="stylesheet" href="1.css" />-->
<link rel="stylesheet" type="text/css" title="Normal" href="styleUserLogin.css" />
<link rel="alternate stylesheet" type="text/css" title="Halloween" href="styleindex2.css" />
<link rel="alternate stylesheet" type="text/css" title="Christmas" href="styleindex3.css" />
</head>
  
<body>
 <?php
  
    /*
connecting to databse
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
     
  if (isset($_POST['submit']   ))
  {
  $user="'".$_POST['uname']."'";
  $pw= "'".$_POST['pw']."'";
  
      /*
sending a query to see if user is in database
*/
    
  $message="select * from user where user_name=".$user." and passkey=".$pw;
  mysqli_query($conn, $message);
  
  if(mysqli_affected_rows($conn)==0)
  {
  $errMessage="*Wrong username or password";
  } 
  else 
  {
      /*
if user is found, then translate to user profile page.
*/
   session_start();
   $_SESSION['user']=$_POST['uname']; 
     
   echo "<script> window.location.href = 'https://laraara.myweb.cs.uwindsor.ca/project/user/userprofile.php'  ;  </script>";
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
<h2 id="loginText">Login</h2>
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
<br> <br> Dont have an account? Click here to register!<br> 
<!--<input type="button" value="Register"id="btn"onclick="javascrtpt:window.location.href='https://cui11d.myweb.cs.uwindsor.ca/project/Register.html'" />-->
<input type="button" value="Register"id="btn"onclick="javascrtpt:window.location.href='Register.php'" />  
 
 <br> <br> Are you an administrator? Click here for admin login!<br> 
<!--<input type="button" value="Register"id="btn"onclick="javascrtpt:window.location.href='https://cui11d.myweb.cs.uwindsor.ca/project/adminLogin.php'" />-->
<input type="button" value="admin login"id="btn"onclick="javascrtpt:window.location.href='adminLogin.php'" />   
  
</td>
</tr>
</table>
</form>
 <script type="text/javascript">window.loop11_pp = [100, 81605];</script><script src="//cdn.loop11.com/embed.js" type="text/javascript" async="async"></script>
</body>
</html>