<?php
    require 'connection.php';
    session_start();

$user_id = $_SESSION['productdelete'];
    $delet_query="DELETE  FROM cart where product_name Like '".$user_id."' ";
    $delete_result=mysqli_query($con,$delet_query) or die(mysqli_error($con));
    header('location: cart.php');
?>