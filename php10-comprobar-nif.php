<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Comprobar NIF</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<style>
		#contenedor{
			width: 300px;
			margin: 80px auto;
		}
		#contenedor h1 {
			font-size: 30px;
			text-align: center;
			margin: 20px 0;
			padding-bottom: 10px;
			border-bottom: 1px solid grey;
		}
	</style>

</head>
<body>
	
<?php 
require "misfunciones.php";
$nif=isset($_POST["nif"])?strtoupper($_POST["nif"]):"";
//strtoupper() -> pasa a mayúsculas la cadena indicada
$control=""; $icon="";
$men="Introduce el NIF a verificar";

if ($_POST) { //si se cumple, significa que me enviaron el formulario

	$dni=substr($nif,0,-1);//subcadena de todos los caracteres del nif menos el último
	$letra=substr($nif,-1);//subcadena con el último caracter del nif

	$control="has-success has-feedback"; // supongo que me pasan dni y letra correctas
	$icon="glyphicon-ok";	
	
	if(strlen($dni)!=8 or !is_numeric($dni)){
		$men.="<br>El dni debe ser numérico de 8 dígitos.";
		$control="has-error has-feedback";
		$icon="glyphicon-remove";
	}
	if(strlen($letra)!=1 or is_numeric($letra)){
		$men.="<br>La letra debe tener un solo caracter alfabético";
		$control="has-error has-feedback";
		$icon="glyphicon-remove";
	}

	if($control=="has-success has-feedback") {
		    $letracalculada=letranif($dni);
			if ($letracalculada==$letra) {
				$men.="<br>NIF correcto.";
			}
			else {	
				$control="has-warning has-feedback";
				$icon="glyphicon-warning-sign";
				$men.="<br>NIF incorrecto, no se corresponde dni con letra";
			}	
	}
}
?>
<div id="contenedor">
	<h1>Comprobación NIF</h1>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<div class="form-group <?php echo $control ?>">
		  <label class="control-label" for="nif">NIF:</label>
		  <input type="text" class="form-control" id="nif" aria-describedby="texto" name="nif" value="<?php echo $nif ?>">
		  <span class="glyphicon <?php echo $icon ?> form-control-feedback" aria-hidden="true"></span>
		  <span id="texto" class="help-block"><?php echo $men ?></span>
		</div>
	 	<div class="form-group ">
		  <input class="btn btn-default" type="submit" value="Comprobar NIF">
		</div>
	</form>
</div> 

</body>
</html>