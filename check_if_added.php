<?php
    
    function check_if_added_to_cart($item_id){
        //session_start();    
        require 'connection.php';
        $user_id=$_SESSION['id'];
        $checkQuery="select * from users_items where item_id='$item_id' and user_id='$user_id' and status='Added to cart'";
        $checkResult=mysqli_query($con,$checkQuery) or die(mysqli_error($con));
        $num_rows=mysqli_num_rows($checkResult);
        if($num_rows>=1)return 1;
        return 0;
    }
?>