<?php 
	include('config/db_connect.php');
	// write query for all tacos
	$sql = 'SELECT title, ingredients, id FROM tacos ORDER BY created_at';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$tacos = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);
	// close connection
	mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<h4 class="center grey-text">Tacos!</h4>

	<div class="container">
		<div class="row">

			<?php foreach($tacos as $taco): ?>

				<div class="col s6 m4">
					<div class="card z-depth-0">
						<img src="img/taco.svg"class="taco">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($taco['title']); ?></h6>
							<ul class="grey-text">
								<?php foreach(explode(',', $taco['ingredients']) as $ing): ?>
									<li><?php echo htmlspecialchars($ing); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href="details.php?id=<?php echo $taco['id'] ?>">more info</a>
						</div>
					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>
