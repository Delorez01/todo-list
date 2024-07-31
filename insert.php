<?php 

	$connect = mysqli_connect("127.0.0.1", "root", "", "todo");

	$text = $_GET['text'];
	$status = $_GET['status'];

	$insert = "INSERT INTO `tasks` (`id`, `text`, `status`) VALUES (NULL, '$text', '$status');";
	$result = mysqli_query($connect,$insert);

	header("Location: index.php")
?>