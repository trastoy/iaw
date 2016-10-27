<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Táboa de multiplicar</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style>
		#formulario {margin-top: 25px;}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1 class="text-center">Táboa de multiplicar</h1>		
			</div>
		</div>	
		<div class="row" id="formulario">
			<div class="col-xs-4 col-sm-2 col-sm-offset-5 col-xs-offset-4 text-center">
				<form action="php05-tablaMult-POST.php" method="post">
					<div class="form-group">
						<label for="numero">Táboa do nº: </label>
						<input class="form-control" type="text" id="numero" name="numero">
					</div>

					<button type="submit" class="btn btn-primary">Xerar</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>