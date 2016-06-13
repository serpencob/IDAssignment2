<?php
define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'assignment2');
   $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// Create connection
//$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['get_option']))
   {
	   
	   $id = $_POST['get_option'];
	   $sql="SELECT * FROM cities WHERE countryID = '$id'";
	   $result = mysqli_query($conn,$sql);
	   while($row = mysqli_fetch_array($result)){
		   echo "<option value=".$row["id"].">" . $row["city_name"]. "</option>";
	   }
	exit;
   }

?>