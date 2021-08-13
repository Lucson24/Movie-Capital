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
    <link rel="stylesheet" type="text/css" href="styleWelcome1.css">                                                             
	<!--linking google fonts-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
	<!--Link for bootstrap-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <head>
  <title>Movie capital</title>

</head>
 
<body>
                                                                                                                
  <div class="topnav">
  <form>
      <input type="text" placeholder="Search.." name="search">
      <button type="submit" class="heroBtnBlack">Submit</button>
    </form>
</div>
<header>
                                                
<!--adding logo and ability to click on it-->
<!--<img src="Images/logoSolo.png" class="logoSolo">-->                                               
<p id="headerTitle">Movie Capital</p>
</header>
  
  
<script>
  
     /*
This alert informs the user on the different classifications
*/
  
  alert("'Perfect match' satisfies all three requirements.\r\n'Recomendations' satisfy only two requirements.\r\n'Suggestions' satisfy only one requirement. \r\n");
  var counter=0;
  var i;
  titles=[];
  prices=[];
  
  
    /*
Function hide and seek is in charge of hiding and showing tables, according to user's decisions
*/
  function hideSeek(number) {
   
   
    
   if(number==1)
   {
   var x = document.getElementById("table1");
   }
   
   if(number==2)
   {
   var x = document.getElementById("table2");
   }
   if(number==3)
   {
   var x = document.getElementById("table3");
   }
   
  
   if (x.style.display === "none") {
    x.style.display = "table";
  } else {
    x.style.display = "none";
  }
  if (number==1 && x.style.display == "table")
  {
    var y= document.getElementById("perfectMatch");
    y.innerHTML="Hide perfect match";
  }
  if (number==1 && x.style.display == "none")
  {
    var y= document.getElementById("perfectMatch");
    y.innerHTML="Show perfect match";
  }
   
  if (number==2 && x.style.display == "table")
  {
    var y= document.getElementById("recomendations");
    y.innerHTML="Hide recomendations";
  }
  if (number==2 && x.style.display == "none")
  {
    var y= document.getElementById("recomendations");
    y.innerHTML="Show recomendations";
  }
    
  if (number==3 && x.style.display == "table")
  {
    var y= document.getElementById("suggestions");
    y.innerHTML="Hide suggestions";
  }
  if (number==3 && x.style.display == "none")
  {
    var y= document.getElementById("suggestions");
    y.innerHTML="Show suggestions";
  }
}
  
        /*
Function post is in charge of posting an array with user's bought movies to the check out page 
*/                            
  
  function post(arr)  
  {
  
  let i=0;
   
  form = document.createElement('form');
  form.setAttribute('method', 'POST');
  form.setAttribute('action', 'checkedOut.php');
        
  
  for(i=0; i<arr.length ;i++)
  {   
    myvar = document.createElement('input');
    myvar.setAttribute('name', i);
    myvar.setAttribute('type', 'hidden');
    myvar.setAttribute('value', arr[i]);
    form.appendChild(myvar);
  }
   
  document.body.appendChild(form);
  form.submit();
  
  }                       
                                   
                                  
                                  
                                  
                                  
     /*
Function checkOut is in charge of showing a message with the movies bought, with prices for each, and with total price   
*/                               
                                  
                                  
                                  
 function checkOut()
  {
    i=0;
    message="";
    var sum=0;
    
    for(i=0; i<titles.length ;i++)
    {
     if (prices[i].length==6)
     {
       message=message+"  "+prices[i]+"    "+titles[i]+"\n";
       console.log("yes!");
     }
     else
     {
      message=message+prices[i]+"    "+titles[i]+"\n";
     }  
     
    }
    
    message=message+"-------------------------------------------\n";
    
    i=0;
    var num;
    
    
    
    
    
    for(i=0; i<titles.length ;i++)
    {
     num = prices[i].replace(/\$|,/g, ''); 
     num = num.replace(/ /g, ''); 
     console.log("num is", num); 
     sum=sum+(+num);
     console.log("sum is", sum);
    }
    sum=(Math.round(sum * 100) / 100).toFixed(2);
    message=message+"$ "+sum+"      TOTAL"+"\n\n Would you like to complete your order?";
    
    
    if (confirm(message)) 
    {
      post(titles);
    } 
    else 
    {
    
    }
 
  }

                                                                                        
                                                                                        
   /*
Function toCart fills the cart with the movies that user has clicled on
*/   
                                                                                        
 function toCart(table_number, row_number)
    {
      cart=document.getElementById("cart").innerHTML;
      console.log("cart is", cart);
      row_number=row_number+2;
  
        
      var index; 
      
      if (table_number==1)
      {
        var x= document.getElementById("table1");
      }  
      if (table_number==2)
      {
        var x= document.getElementById("table2");
      }  
      if (table_number==3)
      {
        var x= document.getElementById("table3");
      }
      
      
      if (titles.includes(x.rows[row_number].cells[0].innerText)==false)
      {
        cart=+cart+1;
        document.getElementById("cart").innerHTML=cart;
        titles.push(x.rows[row_number].cells[0].innerText);
        prices.push(x.rows[row_number].cells[4].innerText);
        
      }
      else
      {
        cart=+cart-1;
        document.getElementById("cart").innerHTML=cart;
        index=titles.indexOf(x.rows[row_number].cells[0].innerText);
        titles.splice(index, 1); 
        prices.splice(index, 1);        
      }
      
      
     
      console.log("table number: ", table_number);
      console.log("row number: ", row_number);
      console.log(titles);
      console.log(prices);
      
    }
  
  

</script>
  
  
  
  
<?php 
                                
     
                                


                                
  /*
connecting the database
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



    /*
    setting variables
*/

  $genre= '"'.$_POST["genre"].'"'; 

  $discount= '"'.$_POST["discount"].'"'; 

  $rating= '"'.$_POST["rating"].'"'; 
  
  
  
                                
                                
                                
                                
  
  if($discount=='"yes"')
  {
    $mdiscount='"discount"'; 
  }
  else
  {
    $mdiscount='"no discount"';
  }
  
  
    
  $header1= $genre."+".$rating."+".$mdiscount;
  $header2= $genre."+".$mdiscount;
  $header3= $rating;
  
  
   /*
updating the popularityStats table
*/ 
                                
   $message="update popularityStats set numberOfSearches=numberOfSearches+1 where Genre=".$genre;                           
   $result= mysqli_query($conn, $message);   
                               
                                
                                
                                
  
 

   /*
setting up buttons
*/
  
 echo "<button type='button' onclick=hideSeek(1) id='perfectMatch' class='heroBtnRed'>Show perfect match!</button>";
 echo "<button type='button' onclick=hideSeek(2) id='recomendations' class='heroBtnRed'>Show recomendations!</button>";
 echo "<button type='button' onclick=hideSeek(3) id='suggestions' class='heroBtnRed'>Show suggestions!</button>";
   
  
   /*
this messages will be queried to the database to get the movies that fulfill user's requirements
*/
  
  $message= "select * from movies where genre=".$genre."and rating=".$rating."and discount=".$discount.";"; 
  $message2= "select * from movies where genre=".$genre."and discount=".$discount.";";
  $message3= "select * from movies where rating=".$rating.";"; 
   


  $result= mysqli_query($conn, $message);
  $result2= mysqli_query($conn, $message2);
  $result3= mysqli_query($conn, $message3);
 

  
   
/*
These arrays will contain the data from the database
*/   

  
  $titles0=array();
  $sentences0=array();
  $paths0=array();
  $ratings0=array();
  $discounts0=array();
  $prices0=array();
                                
  
  $titles=array();
  $sentences=array();
  $paths=array();
  $ratings=array();
  $discounts=array();
  $prices=array();
  
  $titles2=array();
  $sentences2=array();
  $paths2=array();
  $ratings2=array();
  $discounts2=array();
  $prices2=array();
  
                                
                                
  $i=0;
                                /*
Formatting the data that was acquired from the database
*/
  
  while($row=mysqli_fetch_assoc($result))
  {
    $titles0[$i]=str_replace(':', '', $row['TITLE']);
    $sentences0[$i]=$row['DESCRIPTION'];
    $sentences0[$i]= str_replace('.', '.<br>', $sentences0[$i]);
    $image=str_replace(' ', '', $titles0[$i]);
    $paths0[$i]= '<img src=Images/'.$image.'.png height=200 width=200 alt= poster not available onclick= toCart(2,'.$i.')>';
    $discounts0[$i]=$row['DISCOUNT'];
    $ratings0[$i]=$row['RATING'];
    $titles0[$i]=$row['TITLE'];
    $prices0[$i]=$row['PRICE'];
    $i=$i+1;
  }                              
                                
                                
  $i=0;
    /*
Formatting the data that was acquired from the database
*/
  while($row2=mysqli_fetch_assoc($result2))
  {
    $titles[$i]=str_replace(':', '', $row2['TITLE']);
    $sentences[$i]=$row2['DESCRIPTION'];
    $sentences[$i]= str_replace('.', '.<br>', $sentences[$i]);
    $image=str_replace(' ', '', $titles[$i]);
    $paths[$i]= '<img src=Images/'.$image.'.png height=200 width=200 alt= poster not available onclick= toCart(2,'.$i.')>';
    $discounts[$i]=$row2['DISCOUNT'];
    $ratings[$i]=$row2['RATING'];
    $titles[$i]=$row2['TITLE'];
    $prices[$i]=$row2['PRICE'];
    $i=$i+1;
  }
  
  $i=0;
    /*
Formatting the data that was acquired from the database
*/
  while($row3=mysqli_fetch_assoc($result3))
  {
    $titles2[$i]=str_replace(':', '', $row3['TITLE']);
    $sentences2[$i]=$row3['DESCRIPTION'];
    $sentences2[$i]= str_replace('.', '.<br>', $sentences2[$i]);
    $image=str_replace(' ', '', $titles2[$i]);
    $paths2[$i]= '<img src=Images/'.$image.'.png height=200 width=200 alt= poster not available onclick= toCart(3,'.$i.')>';
    $discounts2[$i]=$row3['DISCOUNT'];
    $ratings2[$i]=$row3['RATING'];
    $titles2[$i]=$row3['TITLE'];
    $prices2[$i]=$row3['PRICE'];
    $i=$i+1;
  }
  
  
  $title=str_replace(':', '', $row['TITLE']);
  
  
  $sentence=$row['DESCRIPTION']; 
  $sentence= str_replace('.', '.<br>', $sentence);
  
  $image=str_replace(' ', '', $title);
  $path= '<img src=Images/'.$image.'.png height=200 width=200 alt= poster not available onclick= "toCart(1, 0)">';
    
    
    /*
    This echo statement produces the first table "perfect match"
*/
  
    echo  
  
  "
   CART= <span id=cart> 0 </span>
   
   <button onclick=checkOut() class='heroBtnRed'> Check Out</button><br>
  
  <table border=2 id='table1' class='tableContent'> 
  
  <tr> 

    <td colspan=6> $header1 </td> 

  </tr> 
  <tr class='tableCol'> 

    <td> <b> Title </b> </td> 

    <td><b> Description </b> </td> 

    <td><b> Image </b></td>
    
    <td> <b> Rating </b> </td>
    
    <td> <b> Price </b> </td>
    
    <td> <b> Discount </b> </td>

  </tr>"; 

    $a=0;
   $size=count($titles0);                             
  
    /*
This for loop fills the table
*/                              
  for($a=0; $a<$size;$a++)          
  {
  echo "<tr> 

    <td>${titles0[$a]}</td> 

    <td>${sentences0[$a]}</td> 

    <td>${paths0[$a]}</td> 
    
    <td>${ratings0[$a]}</td> 
    
    <td>${prices0[$a]}</td> 
    
    <td>${discounts0[$a]}</td> 

  </tr>"; 
    } 

echo "</table>
<br>
<br>"; 
  
  
  
  
  
    /*
This echo statement opens the second table, "suggestions"
*/
  
  echo 
      
  "<table border=2 id='table2' class='tableContent'> 
   
   
   
   <tr> 

    <td colspan=6> $header2 </td> 

  </tr>
  <tr class='tableCol'> 

    <th>Title</th> 

    <th>Description</th> 

    <th>Image</th>
    
    <th>Rating</th>
    
    <th>Price</th>
    
    <th>Discount</th>

  </tr>"; 
                                
   $a=0;
   $size=count($titles);                             
    /*
This for loop fills the second table
*/
                                
  for($a=0; $a<$size;$a++)          
  {
  echo "<tr> 

    <td>${titles[$a]}</td> 

    <td>${sentences[$a]}</td> 

    <td>${paths[$a]}</td> 
    
    <td>${ratings[$a]}</td> 
    
    <td>${prices[$a]}</td> 
    
    <td>${discounts[$a]}</td> 

  </tr>"; 
    }
echo  "</table>
<br><br>";
         
   
      
      
     /*
This echo statement opens the third table, "recomendations"
*/
     
   echo 
      
  "<table border=2 id='table3' class='tableContent'> 
   
   
    <tr> 

    <td colspan=6> $header3 </td> 

  </tr> 
   
  <tr class='tableCol'> 

    <th>Title</th> 

    <th>Description</th> 

    <th>Image</th>
    
    <th>Rating</th>
    
    <th>Prices</th>
    
    <th>Discount</th>

  </tr>"; 

    $a=0;
   $size=count($titles2);                             
    /*
This for loop fills the third table
*/
  for($a=0; $a<$size;$a++)          
  {
  echo "<tr> 

    <td>${titles2[$a]}</td> 

    <td>${sentences2[$a]}</td> 

    <td>${paths2[$a]}</td> 
    
    <td>${ratings2[$a]}</td> 
    
    <td>${prices2[$a]}</td> 
    
    <td>${discounts2[$a]}</td> 

  </tr>"; 
    }
echo  "</table>
<br><br>";
    
  

?>
<script type="text/javascript">window.loop11_pp = [100, 81605];</script><script src="//cdn.loop11.com/embed.js" type="text/javascript" async="async"></script>
</body>
</html>