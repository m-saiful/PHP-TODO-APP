<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">Todo App</a>
				<div>
					<span class="navbar-text">
						Muhammad Saifullah
					</span>
				</div>
			</div>
		</nav>

		<!-- Content -->
		<section class="container card mt-5 bg-light">
			<div class="container mt-3 mb-3">
				<h3 class="text-center text-primary">Todo List </h3>
					<form method="POST" class="row g-3 mt-3" action="add_query.php">
						<div class="col-auto">
							<label for="inputPassword2" class="visually-hidden">Input text</label>
							<input type="text" class="form-control" name="task" required placeholder="Input text">
						</div>
						<div class="col-auto">
							<button type="submit" class="btn btn-primary mb-3" name="add">Add Task</button>
						</div>
					</form>
				<table class="table">
					<thead>
						<tr>
							<th>No.</th>
							<th>Task</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						require 'conn.php';
						$query = $conn->query("SELECT * FROM `task` ORDER BY `task_id` ASC");
						$count = 1;
						while ($fetch = $query->fetch_array()) {
						?>
							<tr>
								<td><?php echo $count++ ?></td>
								<td><?php echo $fetch['task'] ?></td>
								<td><?php echo $fetch['status'] ?></td>
								<td colspan="2">
									<center>
										<?php
										if ($fetch['status'] != "Done") {
											echo
											'<a href="update_task.php?task_id=' . $fetch['task_id'] . '" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
								<path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
							  </svg></a> |';
										}
										?>
										<a href="delete_query.php?task_id=<?php echo $fetch['task_id'] ?>" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
												<path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
											</svg></a>
									</center>
								</td>
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
	</section>
</body>

</html>