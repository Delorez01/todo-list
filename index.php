<?php

	$connect = mysqli_connect("127.0.0.1", "root", "", "todo");

	$select = "SELECT * FROM tasks";
	$result = mysqli_query($connect, $select);




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TODO LIST</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<style type="text/css">
		.main {
			background: white;
			height: 900px;
			width: 475px;
		}
		.up {
			background: whitesmoke;
			height: 75px;
			border: 1px solid black;
		}
		.redak { 
			display: none;
		}
	</style>
</head>
<body style="background: #ebeded;">
	
	<div class="col-12 bg-white " style="height: 75px; border: 1px solid black;">
		<h1 style="text-align: center; font-weight: bolder;">TO DO LIST</h1>
	</div>

	<div class="main mx-auto">
		<div class="up">
			<form action="insert.php" method="GET">
				<input type="text" name="text" style="height: 30px; width: 400px; margin-top: 20px; margin-left: 20px;">
				<input type="hidden" name="status" value="0">
				<button type="submit">+</button>
			</form>
			
		</div>
		<?php 

			if ($result) {
				foreach ($result as $task) {
					

		?>
		<div class="zamet">
			<div style="display: flex;">
				<div style="display: none;">
					<?php echo $task['id']; ?>
				</div>



				<?php

					if($task['status'] == 1){

					
				?>
				<div style="width:50px; background-image: url('check.png'); background-size: 100% 100%;">
					
				</div>
 
				<?php
					}else{ 
				?>

				<div style="width:50px; background-image: url('cross.png'); background-size: 100% 100%;">			
						
				</div>
 
				<?php

					}
				?>



				 
				<div style="width: 400px; border: 1px solid black;">
					<?php echo $task['text']; ?>
				</div>



				

				<button type="button" class="btn btn-primary btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="<?php echo "#".$task['id'] ?>">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
					  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
					  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
					</svg>
				</button>


				<div style="width: 75px">
					<form action="delete.php" method="GET">
						<input type="hidden" name="id" value="<?php echo $task['id'] ?>">
						<button class="delete btn-danger btn btn-outline-dark">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
							  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
							  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
							</svg>
						</button>
					</form>
					
				</div>

				<hr>
			</div>

			

				<!-- Button trigger modal -->
			

				<!-- Modal -->
				<div class="modal fade" id="<?php echo $task['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h1 class="modal-title fs-5" id="exampleModalLabel">Редактирование</h1>
				        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      </div>
				      <div class="modal-body">  
						<form action="update.php" method="GET">
							<div style="height: 300px; width: 450px; ">
								<input type="hidden" name="id" value="<?php echo $task['id']; ?>">
								<h3>Введите текст</h3>
								<input type="text" name="text" value="<?php echo $task['text']; ?>">
								<hr>
								<h3>Поставьте статус</h3>
								<input type="checkbox" name="stats" value="<?php echo $task['status']; ?>">	
							</div>
							<div class="modal-footer">
				        		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
				        		<button type="submit" class="btn btn-primary">Редактировать</button>
				      		</div>
						</form> 
				      </div>
				      
				    </div>
				  </div>
				</div>

			
			<?php 
					}
				}

			?>
			
		</div>
	</div>




<script type="text/javascript">
	
	 


</script>
	
</body>
</html>