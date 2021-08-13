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
                                                                                                                          
 <style>
.error {color: #FF0000;}
</style>
                                                                                                                          
</head>
                                                                                                                          
                                                                                                                          
                                                                                                                          
                                                                                                                          
<body>
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
                                                                                                                          
$imageErr="";
$priceErr="";
$titleErr="";                                                                                                                          
                                                                                                                          

  
  if(isset($_POST["submit"]))
{
  /*
getting variables from form
*/    
  $title="'".$_POST["title"]."'"; 
  $genre="'".$_POST["genre"]."'";  
  $rating="'".$_POST["rating"]."'"; 
  $discount="'".$_POST["discount"]."'";
  $description="'".$_POST["description"]."'"; 
  $dollars=$_POST["dollars"];
  $cents= $_POST["cents"];
  $price="'$ ".$dollars.".".$cents."'";
  $im_title = str_replace(' ', '', $_POST["title"]);
  $im_title = $im_title.".png";  
  
   

  
    
    
  $counter=0;
    
    
    
    /*
setting up variables to upload image
*/  
    
  $target_dir = "/home/laraara/domains/laraara.myweb.cs.uwindsor.ca/public_html/project/Images/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $real_target=  $target_dir.$im_title;
  
    
    
    
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) 
  {
    
  } 
    else 
  {
    $imageErr= "File is not an image. <br>";
    $counter = $counter+1;
  }   

if($imageFileType != "png") 
{
  $counter=$counter+1;
  $imageErr="image is not png <br>";
}

  
    
  if (is_numeric($dollars)==false or is_numeric($cents)==false)
  {
   $priceErr="Introduce only numbers<br>";
   $counter=$counter+1; 
  }

   if (strpos($title, ':') !== false or strpos($uname, '?') !== false or strpos($uname, '-') !== false or strpos($uname, '!') !== false or strpos($uname, '.') !== false ) 
{
    $titleErr= "*Invalid character in title. No signs allowed";
    $counter=$counter+1;
} 

    

   /*
if counter=0, it means that there are no errors in image, so we can proceed to upload it
*/  
if ($counter==0)
 {
    
  if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $real_target))
  {
    /*
database is updated with new values
*/  
  $message= "insert into movies values(".$title.", ".$genre.", ".$rating.", ".$discount.", ".$description.", ".$price.")";
  mysqli_query($conn, $message);
  echo "<script>alert('Movie successfully added'); </script>";
  }
  else
  {
    echo "<script> alert('failed at adding movie because of an error at uploading poster'); </script>";
  }

 }
 
}
   
  
  
  

                 
                  
                      
 ?>                  
                                                                                                                       
                                                                                                                          
                                                                                                                          
                                                                                                                          
                                                                                                                          

<section class="main">   
  <!--adding logo and ability to click on it-->
	<a href="homepage.html"><img src="logo3.png"></a>      
                                                       
  <div class="container">
    
    <div class="title">Add a movie...</div><br>
    <span class="error"> <?php echo $titleErr;?></span>                   
    <form action="add_movie.php" method="post" id="form" enctype="multipart/form-data">
      <div class="addMovie">
         <label for="ltitle" id="ltitle"> Title:  </label>
         <input type="title" id="title" name="title"><br>

        <br>Genre<br>
        <input type="radio" id="horror" name="genre" value="Horror">
        <label for="horror">Horror</label>
                           
        <input type="radio" id="romance" name="genre" value="Romance">
        <label for="romance">Romance</label>
                            
        <input type="radio" id="Superhero" name="genre" value="Superhero">
        <label for="Superhero">Superhero</label>
                              
        <input type="radio" id="documentary" name="genre" value="Documentary">
        <label for="documentary">Documentary</label>
                                
        <input type="radio" id="sports" name="genre" value="Sports">
        <label for="sports">Sports</label><br>   
  
  
        <br>Rating<br>  
                        
        <input type="radio" id="PG" name="rating" value="PG">
        <label for="PG-">PG</label>
        <input type="radio" id="PG 13" name="rating" value="PG13">
        <label for="PG 13"> PG13 </label>
        <input type="radio" id="G" name="rating" value="G">
        <label for="G">G</label>
        <input type="radio" id="R" name="rating" value="R">
        <label for="R">R</label>
        <input type="radio" id="NC 17" name="rating" value="NC17">
        <label for="NC 17">NC17</label><br>
    
        <br>Discount<br> 
        <input type="radio" id="yes" name="discount" value="YES">
        <label for="horror">Yes</label>
        <input type="radio" id="no" name="discount" value="NO">
        <label for="romance">No</label><br><br>  
    
  
        <label for="description" id="ldescription"> Description: </label>
        <input type="text" id="description" name="description"><br><br>
   
        Price <br>
        <span class="error"> <?php echo $priceErr;?></span> 
         
                                                             
        <label for="d" id="d"> Dollar amount:  </label>
        <input type="text" id="dollars" name="dollars"><br>
        <label for="c" id="c"> Cent amount:  </label>
        <input type="text" id="cents" name="cents"><br><br>
        
                                                  
        Select image for poster (png mandatory):
        <span class="error"> <?php echo $imageErr;?></span>                                          
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br>                                                        
  
        <input class="heroBtnRed" type="submit" id="submit" name="submit" value="Submit">
    
    </form>
 
  </div>
 </div>                                                                   
 <div class="backLink">                                                                    
  <br><a href='admin.html'> Back to Menu </a> 
 </div>                     
</section>                                                                                                                    
   
 
                
                     

</body>
</html>