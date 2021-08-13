<!DOCTYPE html>

<html>
  
  <?php 
    /*
session is started
*/
  session_start();
  $user= $_SESSION['user'];
 
  ?>
  
  <head>
    <meta name="viewport content="with=device-width, intitial-scale=1.0" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styleProto.css">                                                                                    
	<!--linking google fonts-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
	<!--Link for bootstrap-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <head>
  <title>Movie Search</title>

</head>


<body>
<section class="main">
	<div class="container">
  
		<form action="welcome.php" method="post">
  
        <!-- these are the genre options -->                                        
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
  			<label for="sports">sports</label><br><br>
  <!-- these are the rating options -->
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
  			<label for="NC 17">NC17</label><br><br>
  
  <!-- These are the discount options -->
  			Do you want a discount? <br>
  			<input type="radio" id="yes" name="discount" value="yes">
  			<label for="yes">yes</label><br>
  
  			<input type="radio" id="no" name="discount" value="no">
  			<label for="no">no</label><br>
  
  
  			<br>
  			<input type="submit" value="Submit" class="heroBtnRed">
		</form>

      </div>
</section>


</body>

</html>