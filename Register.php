<!DOCTYPE html>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<title>Movie Capital- Registration</title>
<meta name="description" content= "Our free registration forms make it ultra-easy to collect information and data, get payments, stay in touch with email. We are aware of the latest techniques needed to create the best."/>
<!-- importing styles -->
<!--<link rel="stylesheet" href="2.css" />-->
<link rel="stylesheet" type="text/css" title="Normal" href="styleRegister.css" />
<link rel="alternate stylesheet" type="text/css" title="Halloween" href="styleRegister2.css" />
<link rel="alternate stylesheet" type="text/css" title="Christmas" href="styleRegister3.css" />
</head>
  
<body>

<div id="header">
<!-- logo with title -->
<!--<img alt="Movie capital"
src="https://e7.pngegg.com/pngimages/285/477/png-clipart-web-development-web-design-internet-web-hosting-service-world-wide-web-logo-symmetry.png" />-->
	<img alt="Movie capital" src="Images/logoSolo.png" />

  <p id="headerTitle">Movie Capital</p>

</div>


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
 $counter=0;
  
    /*
setting up the errors
*/
  $nameErr = "";
  $lastErr="";
  $emailErr ="";
  $userErr = "";
  $yearErr="";
   
$uname=$_POST["uname"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$email=$_POST["email"];
$pw=$_POST["pw"];
$sex=$_POST["sex"];
$day=$_POST["day"];
$month=$_POST["month"];
$credit=$_POST["credit"];  
$year=(int)$_POST["year"];

   /*
checking if inputs are empty, and if that is the case, write the error message
*/  
if (empty($fname))
{
$nameErr="*Introduce a valid name";
$counter=$counter+1;
} 
if (empty($uname))
{
$userErr="*Introduce a valid username";
$counter=$counter+1;
} 
if (empty($lname))
{
$lastErr="*Introduce a valid last name";
$counter=$counter+1;  
}
if (empty($credit))
{
$cardErr="*Introduce a valid credit card";
$counter=$counter+1;  
}

 if (strlen($credit)<9)
 {
 $cardErr="*Introduce a valid credit card";
 $counter=$counter+1; 
 
 }  
  
  
  
     /*
checking if user is under 18
*/
if ($year<18)
{
  if($month<7)
  {
   $yearErr="*You cannot register if you are under 18 years of age";
   $counter=$counter+1; 
  }
 
}   
  
     /*
checking for invalid user names
*/
  if (strpos($uname, ' ') !== false or strpos($uname, ':') !== false or strpos($uname, '?') !== false or strpos($uname, '-') !== false or strpos($uname, '!') !== false) 
{
    $userErr= "*Invalid character in username. No spaces or signs allowed";
    $counter=$counter+1;
}  
     
     /*
cheking if email is valid
*/

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
{
 $emailErr ="*Introduce a valid email address";
 $counter=$counter+1; 
} 
  
$message="select * from user where user_name='".$uname."'";

$result= mysqli_query($conn, $message);  

if(mysqli_affected_rows($conn)!=0)
   {
    $userErr="username already taken";
    $counter=$counter+1;
   }  
   
   /*
if counter=0, it means that all information provided is correct. Then new user is introduced to table. 
*/
if ($counter==0)
{
 session_start();
 $_SESSION['user']=$_POST["uname"]; 
 $uname="'".$uname."'";
 $pw="'".$pw."'";
 $fname="'".$fname."'";
 $lname="'".$lname."'";
 $email="'".$email."'";
  
 $message2="insert into user values(".$uname.", ".$pw.", ".$fname.", ".$lname.", ".$email.", '', '', NULL)"; 
   
 $_SESSION['message']=$message2; 
 mysqli_query($conn, $message2);
  
$letter = "Thank you for registering to movie capital. Enjoy our services";
$email= "'".$email."'";
echo $email;    
mail($email, 'My Subject', $letter);
echo "<script> alert('Your registration was successful! enjoy our services'); window.location.href = 'https://laraara.myweb.cs.uwindsor.ca/project/user/userprofile.php'; </script>";
}
     

}  

  
?>   
  
  
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="form">
<h2 id="registerText">Register</h2>
<table>
<tr>
<td>Username:</td>
<td colspan="3">
<input type="text" id="uname" name="uname" value="" />
<span class="error"> <?php echo $userErr;?></span>
</td>
</tr>

<tr>
<td>Firstname:</td>
<td colspan="3">
<input type="text" id="fname" name="fname" value="" />
<span class="error"> <?php echo $nameErr;?></span>  
</td>
</tr>

<tr>
<td>Lastname:</td>
<td colspan="3">
<input type="text" id="lname" name="lname" value="" />
<span class="error"> <?php echo $lastErr;?></span>  
</td>
</tr>
  
<tr>
<td>Credit card:</td>
<td colspan="3">
<input type="text" id="lname" name="credit" value="" />
<span class="error"> <?php echo $cardErr;?></span>  
</td>
</tr>  
  

<tr>
<td>E-mail:</td>
<td colspan="3">
<input type="text" id="email" name="email" value="" />
<span class="error"> <?php echo $emailErr;?></span>  
</td>
</tr>
  
<tr>
<td>Password:</td>
<td colspan="3">
<input type="password" id="pw" name="pw" value="" />
</td>
</tr>

<tr>
<td>Gender:(optional)</td>
<td colspan="3">
<input type="radio" name="sex" id="man1" value="1" />
<label for="man1">Male</label>
<input type="radio" name="sex" id="man2" value="0" />
<label for="man2">Female</label>
</td>
</tr>

<tr>
<td>Date of birth:</td>
<td>Day:
<select name="day">
<option value="1" selected>1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
</td>

<td>Month:
<select name="month">
<option value="1" selected>Jan</option>
<option value="2">Feb</option>
<option value="3">Mar</option>
<option value="4">Apr</option>
<option value="5">May</option>
<option value="6">Jun</option>
<option value="7">Jul</option>
<option value="8">Aug</option>
<option value="9">Sep</option>
<option value="10">Oct</option>
<option value="11">Nov</option>
<option value="12">Dec</option>
</select>
</td>

<td>Year:
<select name="year">
<option value="1" selected>2020</option>
<option value="2">2019</option>
<option value="3">2018</option>
<option value="4">2017</option>
<option value="5">2016</option>
<option value="6">2015</option>
<option value="7">2014</option>
<option value="8">2013</option>
<option value="9">2012</option>
<option value="10">2011</option>
<option value="11">2010</option>
<option value="12">2009</option>
<option value="13">2008</option>
<option value="14">2007</option>
<option value="15">2006</option>
<option value="16">2005</option>
<option value="17">2004</option>
<option value="18">2003</option>
<option value="19">2002</option>
<option value="20">2001</option>
<option value="21">2000</option>
<option value="22">1999</option>
<option value="23">1998</option>
<option value="24">1997</option>
<option value="25">1996</option>
<option value="26">1995</option>
</select>
</td> 
</tr>
   
<tr>
<span class="error"> <?php echo $yearErr;?></span>   
<td colspan="4" id="buttonsTd">
<input type="submit" value="Register" id="submit" name="submit" />
<input type="reset" value="Rewrite" id="btn" />
</td>
</tr>
</table>
</form>
  
</body>
</html>



