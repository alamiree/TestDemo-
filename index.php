<?php
include('process.php');

if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$edit_state = true;
	$rec = $conn->query("SELECT * FROM data WHERE id = $id");
	$record = $rec->fetch_array();
	$name = $record['name'];
	$location = $record['location'];
	$id = $record['id'];
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Curd system</title>
	<link rel = "stylesheet" href = "css/style.css">
</head>
<body>
<div class = "container">
<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Location</th>
			<th colspan = "2">Action</th>
		<tr>
	</thead>
	<tbody>
	<?php while($row = $result->fetch_assoc()) { ?>
	<tr>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['location']; ?></td>
		<td>
			<a href = "index.php?edit=<?php echo $row['id']; ?>">Edit</a>
		</td>
		<td>
			<a href = "index.php?delete=<?php echo $row['id']; ?>">Delete</a>
		</td>
	</tr>
	<?php } ?>
	
	</tbody>
</table>
<form action = "process.php" method = "POST" class = "myForm">
	<input type = "hidden" name = "id" value = "<?php echo $id ?>">
	<input type = "text" name = "name" value  = "<?php echo $name ?>"></br><br>
	<input type = "text" name = "location" value = "<?php echo $location ?>"></br><br>
	<?php if($edit_state == false){ ?>
	<button type = "submit" name = "save">Save</button>
	<?php } else{ ?>
	<button type = "submit" name = "update">Update</button>
	<?php } ?>
</form>
</div>
</body>
</html>