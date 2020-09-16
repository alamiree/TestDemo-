<?php
$server = "localhost";
$user = "root";
$password = "";
$dbname = "crud";

$name = "";
$location = "";
$id = 0;
$edit_state = false;
$conn = new mysqli($server, $user, $password, $dbname);

if(isset($_POST['save'])){
	$name = $_POST['name'];
	$location = $_POST['location'];
	$sql = "INSERT INTO `data`(name, location) VALUES ('$name', '$location')";
	$conn->query($sql);
	header('location: index.php');
}
if(isset($_POST['update'])){
	$name = $_POST['name'];
	$location = $_POST['location'];
	$id = $_POST['id'];
	$conn->query("UPDATE data SET name = '$name', location = '$location' WHERE id = $id");
	header('location: index.php');
}

	$mysql = "SELECT * FROM data";
	$result = $conn->query($mysql);
?>