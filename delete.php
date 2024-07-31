<?php

	$connect = mysqli_connect("127.0.0.1", "root", "", "todo");

	$id = $_GET['id'];

	$delete = "DELETE FROM tasks WHERE id = $id";
	$result = mysqli_query($connect, $delete);	

	header('Location:index.php')
?>