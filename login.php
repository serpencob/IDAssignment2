<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['email']);
      $mypassword = md5(mysqli_real_escape_string($conn,$_POST['password'])); 
      $sql = "SELECT id FROM personal_data WHERE email = '$myusername' and password = '$mypassword'";
	  $sql1 = "SELECT role FROM personal_data WHERE email = '$myusername' and password = '$mypassword'";
	  
      $result = mysqli_query($conn,$sql);
	  $result1 = mysqli_query($conn,$sql1);
	  
	  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  $row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
	  
      $count = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
		print_r($row1);
      if($count == 1 && $row1['role'] == 1) {
         $_SESSION['myusername'] = $myusername;
         $_SESSION['login_user'] = $myusername;
         echo "success";
         header("location: index.php");
      }else if($count == 1 && $row1['role'] == 0){
          $_SESSION['myusername'] = $myusername;
          $_SESSION['login_user'] = $myusername;
		  echo "user";
		  header("location: assignment1.php");
	  }
		  else {
         $error = "Your Login Name or Password is invalid";
		 if($count==1){
		 //header("location: assignment1.php");
		 }
      }
   }
?>
<html lang="en">

<head>


    <title>Login page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
	<style>
	body {
    background-color: black;
    background: url(background.jpg) no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
	}
	</style>
</head>

<body>
	
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In or Register</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method = "post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" type="text" name="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
                                <a href="register.php" class="btn btn-lg btn-default btn-block">Register</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
