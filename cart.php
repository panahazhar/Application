<?php
    session_start();
    require 'connection.php';
    
    if(!isset($_SESSION['email'])){
        header('location: login.php');
    }
    $user_id=$_SESSION['id'];
    $U_productQuery="SELECT * FROM cart where user_id = $user_id ";
    $Product_result=mysqli_query($con,$U_productQuery) or die(mysqli_error($con));
    $No_product= mysqli_num_rows($Product_result);
    $sum=0;
    if($No_product==0){
        //echo "Add items to cart first.";
    ?>
        <script>
        window.alert("no Item in the Cart! (-_-) left ");
        </script>
    <?php
    }else{
        while($row=mysqli_fetch_array($Product_result)){
            $sum=$sum+$row['product_price'];
        $_SESSION['total'] = $sum;
       }
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>e-commerce</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
   
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
     
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div>
            <?php 
               require 'header.php';
            ?>
            <br>
            <div class="container">
                <table class="table table-bordered table-striped">
                <tbody>
                        <tr>
                            <th>Item Number</th><th>Item Name</th><th>Price</th><th></th>
                        </tr>
                        <form>
                            <input type="hidden" name="productdelete">
                        </form>
                       <?php 
                        $Product_result=mysqli_query($con,$U_productQuery) or die(mysqli_error($con));
                        $No_product= mysqli_num_rows($Product_result);
                        $counter=1;
                       while($row=mysqli_fetch_array($Product_result)){
                           
                         ?>
                        <tr>
                            <th><?php echo $counter ?></th><th><?php echo $row['product_name']?></th><th><?php echo $row['product_price']?></th>
                            <th><a href='cartitem_remove.php?id=<?php $_SESSION['productdelete'] = $row['product_name'] ?>'>Remove</a></th>
                        </tr>
                       <?php $counter=$counter+1;}?>
                        <tr>
                            <th></th><th>Total</th><th>$ <?php echo $sum;?>/-</th><th><a href="payment.php" class="btn btn-primary">Confirm Order</a></th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br><br><br><br><br><br><br>
            <footer class="footer">
               <div class="container">
                <center>
                   <p>Copyright &copy </p>
                   <p>This website is developed by Safin Yasin & Pana Hazhar</p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>
