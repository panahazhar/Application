<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="mycss.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
   
</head>

<body>
    <?php
$conn = mysqli_connect('localhost','root','','store');
 if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
                                    
$sql = "SELECT * FROM products";
$result = mysqli_query($conn,$sql);
$resultCheck = mysqli_num_rows($result);                                  
if ($resultCheck > 0) {

while($row = $result->fetch_assoc()) {
$himglink = 'uploads/'.$row['my_img'];
$name = $row['ProductName'];
$loc = $row['disc'];
$price = $row['Price'];
$totalPrice = $_SESSION['total'];

 echo '
 

 <div class="container d-flex justify-content-center mt-5 mb-5">

            

 <div class="row g-3">

   <div class="col-md-6">  
     
     <span>Payment Method</span>
     <div class="card">

       <div class="accordion" id="accordionExample">
         
         <div class="card">
           <div class="card-header p-0" id="headingTwo">
             <h2 class="mb-0">
               <button class="btn btn-light btn-block text-left collapsed p-3 rounded-0 border-bottom-custom" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                 <div class="d-flex align-items-center justify-content-between">

                   <span>Paypal</span>
                   <img src="https://i.imgur.com/7kQEsHU.png" width="30">
                   
                 </div>
               </button>
             </h2>
           </div>
           <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
             <div class="card-body">
               <input type="text" class="form-control" placeholder="Paypal email">
             </div>
           </div>
         </div>

         <div class="card">
           <div class="card-header p-0">
             <h2 class="mb-0">
               <button class="btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                 <div class="d-flex align-items-center justify-content-between">

                   <span>Credit card</span>
                   <div class="icons">
                     <img src="https://i.imgur.com/2ISgYja.png" width="30">
                     <img src="https://i.imgur.com/W1vtnOV.png" width="30">
                     <img src="https://i.imgur.com/35tC99g.png" width="30">
                     <img src="https://i.imgur.com/2ISgYja.png" width="30">
                   </div>
                   
                 </div>
               </button>
             </h2>
           </div>

           <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
             <div class="card-body payment-card-body">
               
               <span class="font-weight-normal card-text">Card Number</span>
               <div class="input">

                 <i class="fa fa-credit-card"></i>
                 <input type="text" class="form-control" placeholder="0000 0000 0000 0000" required>
                 
               </div> 

               <div class="row mt-3 mb-3">

                 <div class="col-md-6">

                   <span class="font-weight-normal card-text">Expiry Date</span>
                   <div class="input">

                     <i class="fa fa-calendar"></i>
                     <input type="text" class="form-control" placeholder="MM/YY" required>
                     
                   </div> 
                   
                 </div>


                 <div class="col-md-6">

                   <span class="font-weight-normal card-text">CVC/CVV</span>
                   <div class="input">

                     <i class="fa fa-lock"></i>
                     <input type="text" class="form-control" placeholder="000" required>
                     
                   </div> 
                   
                 </div>
                 

               </div>

               <span class="text-muted certificate-text"><i class="fa fa-lock"></i> Your transaction is secured with ssl certificate</span>
              
             </div>
           </div>
         </div>
         
       </div>
       
     </div>

   </div>

   <div class="col-md-6">
       <span>Summary</span>

       <div class="card">

         <div class="d-flex justify-content-between p-3">

           <div class="d-flex flex-column">

             <span>Required( Amount ) <i class="fa fa-caret-down"></i></span>
             <a href="#" class="billing">make sure your have enough fund</a>
             
           </div>

           <div class="mt-1">
             <sup class="super-price"> $ '.$totalPrice.'</sup>
             <span class="super-month"></span>
           </div>
           
         </div>

         <hr class="mt-0 line">

         <div class="p-3">

           <div class="d-flex justify-content-between mb-2">

             <span>Discount </span>
             <span>-$0.00</span>
             
           </div>

           <div class="d-flex justify-content-between">

             <span> <i class="fa fa-clock-o"></i></span>
             <span></span>
             
           </div>
           

         </div>

         <hr class="mt-0 line">


         <div class="p-3 d-flex justify-content-between">

           <div class="d-flex flex-column">

             <span>Today you pay $'.$totalPrice.'</span>
             <small>pending payment</small>
             
           </div>
           <span>$0</span>

           

         </div>


         <div class="p-3">

         <button style =" color =" white" " onclick="myFunction()" class="btn btn-primary btn-block free-button"><a href="cart_remove.php">Pay</a></button> 
        <div class="text-center">
      
        </div>
           
         </div>



         
       </div>
   </div>
   
 </div>
 

</div>

         
   ';
  
   $sql = "DELETE * FROM cart";
   mysqli_query($conn, $sql);
   header("Location: pndex.php");
   


   
     }
 } else {
     echo "0 results";
  }
$conn->close();
 
?>

<script>
  function myFunction(){

    window.alert("You have successfuly Purchased Items! ");z
  }
   
   </script>


 

</body>
</html>