<?php
    require 'connection.php';
    session_start();
   // $item_id=$_GET['id'];
    $user_id=$_SESSION['id'];
    $delet_query="DELETE  FROM cart";
    $delete_result=mysqli_query($con,$delet_query) or die(mysqli_error($con));
    header('location: cart.php');
?>