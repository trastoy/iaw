<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD Alumnos</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" href="css/estilos.css">

</head>
<body>
    <?php require "../misfunciones.php" ?>
	<?php require "menu.php" ?>

	<div class="container">
		<div class="row">
			<div class="col-xs-12 table-responsive">
			
				<?php require "control-crud.php" ?>

			</div>
		</div>
	</div>

	<script src="js/funciones.js"></script>
</body>
</html>
