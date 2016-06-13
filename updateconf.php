<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "assignment2";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_POST){
	$first_name = $_POST['firstname'];
	$middle_name = $_POST['mname'];
	$last_name = $_POST['lastname'];
	$gender = $_POST['gender'];
	$date_of_birth = $_POST['birthdate'];
	$phone = $_POST['phone'];
	$email_address = $_POST['email'];	
	$password = md5($_POST['password']);
	$address = $_POST['address'];
	$country_ID = intval($_POST['country_id']);
	$city_ID = intval($_POST['city_id']);	
	$postcode = $_POST['postcode'];
	$qualification = $_POST['qualification'];
	$area = implode(", ",$_POST['area']);
	//$filePath = realpath($_FILES["photo"]["tmp_name"]);
	$id = $_GET['id'];

	
	$sql3 = "UPDATE personal_data SET firstname='$first_name', midname='$middle_name', lastname='$last_name', password='$password', phone='$phone', email='$email_address', address='$address', countryID='$country_ID', cityID='$city_ID', postcode='$postcode', birthday='$date_of_birth', gender='$gender', qualification='$qualification', areas='$area') WHERE id=$id";
	
	$retval = mysqli_query($conn, $sql3);
	if(! $retval ) {
			print_r($retval);
		echo "Sorry, you fucked up $id";
               //die('Could not enter data: ' . mysql_error());
            }
}
?>