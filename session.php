<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select firstname from personal_data where email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['firstname'];
   
   if(!isset($_SESSION['login_user'])){
	   echo "wrong!";
      //header("location:login.php");
   }
   
?>