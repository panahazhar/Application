<?php
session_start();

$conn = mysqli_connect('localhost','root','','store');
 if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

?>
<!DOCTYPE html>
<html lang="">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="styyle.css">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/ac0d5aa83e.js" crossorigin="anonymous"></script>
    <link
    rel="stylesheet"
@font
    href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css"
  >

  <style>
 .dropbtn {
  background-color: rgba(32, 167, 255, 0.9);
  box-shadow: #3c4fe0 0 3px 7px ;
  transform: translateY(2px);
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: rgba(62, 157, 255, 0.9);
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  box-shadow: rgba(45, 35, 66, .4) 0 4px 8px, rgba(45, 35, 66, .3) 0 7px 13px -3px, #3c4fe0 0 -3px 0 inset;
  transform: translateY(-2px);
}
/* CSS */
.button-29 {
  align-items: center;
  appearance: none;
  background-image: radial-gradient(100% 100% at 100% 0, #5adaff 0, #5468ff 100%);
  border: 0;
  border-radius: 6px;
  box-shadow: rgba(45, 35, 66, .4) 0 2px 4px,rgba(45, 35, 66, .3) 0 7px 13px -3px,rgba(58, 65, 111, .5) 0 -3px 0 inset;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-flex;
  font-family: "JetBrains Mono",monospace;
  height: 48px;
  justify-content: center;
  line-height: 1;
  list-style: none;
  overflow: hidden;
  padding-left: 16px;
  padding-right: 16px;
  position: relative;
  text-align: left;
  text-decoration: none;
  transition: box-shadow .15s,transform .15s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  white-space: nowrap;
  will-change: box-shadow,transform;
  font-size: 18px;
}

.button-29:focus {
  box-shadow: #3c4fe0 0 0 0 1.5px inset, rgba(45, 35, 66, .4) 0 2px 4px, rgba(45, 35, 66, .3) 0 7px 13px -3px, #3c4fe0 0 -3px 0 inset;
}

.button-29:hover {
  box-shadow: rgba(45, 35, 66, .4) 0 4px 8px, rgba(45, 35, 66, .3) 0 7px 13px -3px, #3c4fe0 0 -3px 0 inset;
  transform: translateY(-2px);
}

.button-29:active {
  box-shadow: #3c4fe0 0 3px 7px inset;
  transform: translateY(2px);
}

 
.inp {
 border: none;
 width: 180px;
 height: 40px;
 box-shadow: #3c4fe0 0 3px 7px inset;

}
.nn{

border: none;
outline: none;
background: none;
font-size: 20px;
text-align: center;

}  
a{
  text-align: center;
    color: white;
    text-decoration: none;
}
  </style>

</head>
<body>

    
    
    <div class="nav">


        <div class="menu">

            <div class="optt">
                       
                <h4>  <span>SHOP</span></h4>
     </div>

            <div class="opt">
            <i class="fa-solid fa-cart-shopping"></i>      
                       <h5><a href="cart.php">Cart</a> </h5>
            </div>
            <div class="opt">
                <i class="fa-duotone fa-square-phone-flip"></i>       
                       <h5><a href="contact.html">Contact </a></h5>
            </div>
            <div class="opt">
                <i class="fa-duotone fa-house-blank"></i>        
                       <h5><a href="index.php">Home</a></h5>
            </div>


            <div class="opt">
                <i class="fa-duotone fa-key" <?php echo !empty($_SESSION['email']) ? 'style="display:none;"' : '' ?>></i>        
                       <h5>  <a href="login.php" <?php echo !empty($_SESSION['email']) ? 'style="display:none;"' : '' ?> >Login</a></h5>
            </div>


            <div class="opt">
                <i class="fa-duotone fa-bars"></i>      
                       <h5>More</h5>
            </div>

        </div>
    </div>
    <div class="infro">
        
       </div>
       

    <div class="ddv">
     
    </div>
   
<div class="flter">
    <?php
    error_reporting(0);
    $filter = $_POST['device'];
    $sql =null;
        if(isset($_POST['SearchButton'])){
        $itemname = $_POST['searchitem'];
    
       
        $sql = "SELECT * FROM products WHERE ProductName Like '".$itemname."%'  ";
        } else if(isset($_POST['device'])) {
      
      
          $sql = "SELECT * FROM products WHERE productType  Like '".$filter."%'  "; 
           
        }  else{
          $sql = "SELECT * FROM products ";
        }                      
        
    ?>
<form method="post" action="pndex.php">
<label for="inp" class="inp">
  <input type="text" class="inp" name="searchitem" placeholder="Search">
</label>

<input  class="button-29" type="submit" name="SearchButton" value="SearchButton">
<input class="button-29" type="submit" name="bla" value="Reset" formaction="pndex.php">
</form>



<form method="post" action="pndex.php">
<div class="dropdown">
  <button class="dropbtn">Categories</button>
  <div class="dropdown-content">
    
  <a><input  class="nn" type="submit" name="device" value="mobile"></a>
  <a><input  class="nn" type="submit" name="device" value="laptop"></a>
  <a><input  class="nn" type="submit" name="device" value="watch"></a>

  </div>
</div>

</form>

</div>




       <div class="xanw">
    <div class="flex">     
   

    
<?php 




$result = mysqli_query($conn,$sql);
$resultCheck = mysqli_num_rows($result);                                  
if ($resultCheck > 0) {

while($row = $result->fetch_assoc()) {
    
$himglink = 'uploads/'.$row['my_img'];
$name = $row['ProductName'];
$loc = $row['disc'];
$price = $row['Price'];


 echo '
 <form action="cart_add.php" method ="post">
 <div class="card">
 <div class="imgc">
     <img src="'.$himglink.'" alt="image">
 </div>
 <div class="infoc">
   <i class="fa-light fa-location-crosshairs"></i>
 <h1>Product Name:'.$name.'</h1>
 <input type="hidden" name="topic" value="'.$name.'" />
 </div>
 <div class="infoc">
   <i class="fa-light fa-square"></i>
   <h1>Product Discreaption:'.$loc.'</h1>
 </div>

 <div class="infoc">
   <i class="fa-light fa-money-bill-1-wave"></i>
 <h1>Price:'.$price.'</h1>
 <input type="hidden" name="pric" value="'.$price.'" />
 <input type="hidden" name="total" value="" />


 </div>

 <div class="infoc">

 

 </div>
<div class="infoc">
<div class="bcardd">



         
   ';

?>

<button <?php echo empty($_SESSION['email']) ? 'formaction ="login.php" ' : '' ?> class="button-29" type="submit" name="submit" value="Add to Card">Add to Cart</button>


</form>

   </div>

</div>
 
  
</div>


<?php


   
     }
 } else {
     echo "0 results";
  }
$conn->close();
 
?>

 




   </div>          
         
       </div>

</body>
</html>