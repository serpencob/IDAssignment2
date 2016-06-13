<?php
include('config.php');


if(($_GET['action'] == 'delete') && isset($_GET['id'])) { // if delete was requested AND an id is present...

$sql = "DELETE FROM personal_data WHERE id = '".$_GET['id']."'";
$result = mysqli_query($conn, $sql);

if($result) {

echo 'Record deleted!';
header("location:tables.php");

}

}
?>