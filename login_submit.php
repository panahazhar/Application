<?php
    require 'connection.php';
    session_start();
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $regex_email="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
    if(!preg_match($regex_email,$email)){
        echo "Incorrect email. Redirecting you back to login page...";
        ?>
        <meta http-equiv="refresh" content="2;url=login.php" />
        <?php
    }
    $password=md5(md5(mysqli_real_escape_string($con,$_POST['password'])));
    if(strlen($password)<6){
        echo "Password should have atleast 6 characters. Redirecting you back to login page...";
        ?>
        <meta http-equiv="refresh" content="2;url=login.php" />
        <?php
    }
    $LoginCheck="select id,email from users where email='$email' and password='$password'";
    $LoginResult=mysqli_query($con,$LoginCheck) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($LoginResult);
    if($rows_fetched==0){

        $adminCheck="select admin_id,adminUser,pass from admin where adminUser='$email'";
        $adminResult=mysqli_query($con,$adminCheck) or die(mysqli_error($con));
        $aminfetch=mysqli_num_rows($adminResult);
        
        if($aminfetch !=0){
   
           
            
    $row=mysqli_fetch_array($adminResult);
   $_SESSION['adminUser']=$email;
     $_SESSION['id']=$row['admin_id'];
   header('location: adminmanagement.php');
           ?>

          
            
            <?php  
        } else {
       
            ?>
                <meta http-equiv="refresh" content="1;url=login.php" />
                <script>
                window.alert("User name or password is wrong");
            </script>
            
            <?php  
        }
        
        //no user
        //redirecting to same login page
       
        //header('location: login');
        //echo "Wrong email or password.";
    }else{
        $row=mysqli_fetch_array($LoginResult);
        $_SESSION['email']=$email;
        $_SESSION['id']=$row['id'];
     //user id
        header('location: pndex.php');
    }
    
 ?>