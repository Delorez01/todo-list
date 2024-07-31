<?php 

	$connect = mysqli_connect("127.0.0.1", "root", "", "todo");

	$id = $_GET['id'];
	$text = $_GET['text'];
	$stats = $_GET['stats'];
	if($stats == null){
		$stats = 0;
		echo $stats;
	}else{
		$stats = 1;
		echo $stats;
	}

	$update = "UPDATE `tasks` SET `text` = '$text', `status` = '$stats' WHERE `id` = '$id';";
	$result = mysqli_query($connect, $update);

	header('Location: index.php')
?>