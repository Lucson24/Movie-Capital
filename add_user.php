<?php

/*
connecting to database
*/  
$serverName = "localhost";
$userName = "laraara_movies";
$password = "movies";
$name = "laraara_movies";

$conn = mysqli_connect($serverName, $userName, $password, $name);

if ($conn == false)
{
    echo "unable to connect to database! ";
    echo 'Connection error: ' . mysqli_connect_error();
}

if (isset($_POST['submit']))
{
  /*
getting variables from form
*/  
    $Uname = $_POST['username'];
    $Pword = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    
    
    /*
selecting user
*/  
    $message = "select * from user where user_name = '" . $Uname . "'";
    $q = mysqli_query($conn, $message);
    

    $result = mysqli_affected_rows($conn);

    if ($result == 1)
    {
        echo '<script>alert("Chosen Username Already Exists")</script>';
    }
    else
    {
        $new = "insert into user values('$Uname', '$Pword', '$fname', '$lname', '$email', '', '', NULL)";
        echo $new;
        mysqli_query($conn, $new);
        echo '<script>alert("New User Successfully Added")</script>';
      
    }
}
mysqli_close($conn)
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport content="with=device-width, intitial-scale=1.0" charset="utf-8">
  <title>Add User</title>
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
		<div class="title">New User...</div><br>
    
	
		<form action="" method="post">
                               
			<br><label> Username: </label>
    		<input type="text" name="username" required>
        
     		<br>
            <br>
     
     		<label>Password: </label>
     		<input type="password" name="password" required>
                                                  
            <br>
            <br>
     
     		<label>First Name: </label>
     		<input type="text" name="fname" required>
             
            <br>
            <br>
     
     		<label>Last Name: </label>
     		<input type="text" name="lname" required>                               
             
             <br>
            <br>
     
     		<label>Email Address: </label>
     		<input type="email" id="email" name="email" required>   
             
             <br>
            <br>                                         
                                                    

  			<br><input class="heroBtnRed" type="submit" id="submit" name="submit" value="Submit">    
  		</form>
    </div>
   	<div class="backLink">                                                                    
  		<br><a href='admin.html'> Back to Menu </a> 
 	</div> 
</section> 
</body>
</html>


