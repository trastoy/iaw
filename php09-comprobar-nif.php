<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Comprobar NIF</title>
	<style>
		.ok {color:green;}
		.incorrecto {color:red;}
		.ok,.incorrecto {font-size: 1.5em}
	</style>
</head>
<body>
	<h1>Comprobación NIF</h1>
<?php 
require "misfunciones.php";
$dni=isset($_POST["dni"])?$_POST["dni"]:"";

$letra=isset($_POST["letra"])?strtoupper($_POST["letra"]):"";//strtoupper pasa a mayúsculas la letra

if ($_POST) { //si se cumple, significa que me enviaron el formulario
	echo "<p>formulario enviado</p>";

	$esnumdni=is_numeric($dni)?"es numérico":"no es numérico";
	echo "<p>Dni: $dni - longitud: ".strlen($dni).", $esnumdni</p>";

	$esnumletra=is_numeric($letra)?"es numérica":"no es numérica";
	echo "<p>Letra: $letra - longitud: ".strlen($letra).", $esnumletra</p>";
	
	$correcto=true; // supongo que me pasan dni y letra correctas
	if(strlen($dni)!=8){
		echo "<p class='incorrecto'>El dni debe ser de 8 dígitos</p>";
		$correcto=false;
	}
	if(!is_numeric($dni)){
		echo "<p class='incorrecto'>El dni debe ser numérico, con 8 dígitos</p>";
		$correcto=false;
	}
	if(strlen($letra)!=1){
		echo "<p class='incorrecto'>La letra debe tener un solo caracter</p>";
		$correcto=false;
	}
	if(is_numeric($letra)){
		echo "<p class='incorrecto'>La letra debe ser un caracter alfabético</p>";
		$correcto=false;
	}

	if($correcto) {
		//si llegamos aquí es porque el dni es numérico y de 8 dígitos, y además la letra es alfabética y de un solo carácter
		    $letracalculada=letranif($dni);
			if ($letracalculada==$letra)
				echo "<p class='ok'>El NIF $dni-$letra es CORRECTO</p>";
			else 
				echo "<p class='incorrecto'>El NIF $dni-$letra es INCORRECTO</p>";
	}	

	echo "<hr>";
}

?>
<!-- $_SERVER['PHP_SELF'] devolve enlace a scrip actual -->
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"> 
	<p>
	<label for="dni">Dni:</label>
	<input type="text" id="dni" name="dni" value="<?php echo $dni ?>">
	</p>
	<p>
	<label for="letra">Letra:</label>
	<input type="text" id="letra" name="letra" size="1" value="<?php echo $letra ?>">
	</p>
	<p>
	<input type="submit" value="Comprobar NIF" name="enviar">
	</p>
</form>

</body>
</html>