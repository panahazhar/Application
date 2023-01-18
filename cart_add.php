<?php
session_start();
    require 'connection.php';
$userID = $_SESSION['id'];

$_SESSION['total'];
    $item_name=$_POST['topic'];
    $item_price=$_POST['pric'];

    $add_querycart="insert into cart(product_name,user_id,product_price) values ('$item_name',$userID,$item_price)";
    $result=mysqli_query($con,$add_querycart) or die(mysqli_error($con));
    header('location: pndex.php');
?>