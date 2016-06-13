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
	$nameoffile = $_FILES["photo"]["name"];
	$tmp_name = $_FILES["photo"]["tmp_name"];
	$error = $_FILES["photo"]["error"];

if (isset ($nameoffile)) {
    if (!empty($nameoffile)) {

    $location = 'uploads/';

    if  (move_uploaded_file($tmp_name, $location.$nameoffile)){
        echo 'Uploaded';    
        }

        } else {
          echo 'file not uploaded';
          }
    }
	
	$filePath = realpath($_FILES["photo"]["nameoffile"]);
	echo $filepath;
	$role = false;
	
	
	$sql3 = "INSERT INTO personal_data (firstname, midname, lastname, password, phone, email, address, countryID, cityID, postcode, birthday, gender, photo, qualification, areas, role) VALUES ('$first_name', '$middle_name', '$last_name', '$password', '$phone', '$email_address', '$address', '$country_ID', '$city_ID', '$postcode', '$date_of_birth', '$gender', '$filePath', '$qualification', '$area', '$role')";
	
	$retval = mysqli_query($conn, $sql3);
	if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            }
}
?>