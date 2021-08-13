<!DOCTYPE html>
<html>
<head>
<title>Movie Capital- CheckOut</title>
  <meta name="description" content="Our website process orders in 2 steps. In the first step, customers are required to fill out their contact and shipping info. Followed by payment methods in the next step. We are aware of the latest techniques needed to create the best."/>
<link rel="stylesheet" type="text/css" href="checkedOutStyle.css" />
</head>
  
<body>
  <?php
  /*
connecting to database
*/
session_start();
$user= $_SESSION['user'];
  
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
     /*
selecting the user with the given username
*/
$message="select * from user where user_name= '".$user."'";
$result=mysqli_query($conn, $message);  
$row=mysqli_fetch_assoc($result);  
$counter=0;  
  
$size=count($_POST);
$i=0;
  
   /*
this for loop fills the movie column of user dataset, with all the new movies that user has bought.
*/
  
for ($i=0; $i<$size; $i++)
{
 if ($counter==0 && strlen($row['movies'])<1  )
 {
   $message="update user set movies=CONCAT(movies, '".$_POST[$i]."') where user_name='".$user."'";
   mysqli_query($conn, $message);
   $message="update user set dates=CONCAT(dates, '".date("Y/m/d")."') where user_name='".$user."'";
   mysqli_query($conn, $message);
   $counter=$counter+1;
   $message= "insert into orders values ('".$_POST[$i]."', '".date("Y/m/d")."')";
   mysqli_query($conn, $message);
 
 } 
 else
 {
   $message="update user set movies=CONCAT(movies,'-', '".$_POST[$i]."') where user_name='".$user."'";
   mysqli_query($conn, $message);
   $message="update user set dates=CONCAT(dates,'-', '".date("Y/m/d")."') where user_name='".$user."'";
   mysqli_query($conn, $message); 
   $message= "insert into orders values ('".$_POST[$i]."', '".date("Y/m/d")."')";
   mysqli_query($conn, $message);
 }  
   
 
}    
  
?>
   
  <div class="mainText">
  <h2>YOUR ORDER HAS BEEN PROCESSED.<br/><br/> THANK YOU FOR CHOOSING MOVIE CAPITAL.</h2>
 <a href="https://laraara.myweb.cs.uwindsor.ca/project/user/userprofile.php">Back to Profile </a>   
  </div>
</body>
</html>