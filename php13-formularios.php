<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Toma datos formulario</title>
</head>
<body>
	<h1>Tratamiento de datos de formulario</h1>
	<form  method="get"> <!-- también post -->
		<p>
			<label for="idtexto">Tipo texto</label>
			<input type="text" id="idtexto" name="texto">
		</p>
		<p>
			<label for="idclave">Tipo password</label>
			<input type="password" id="idclave" name="clave">
		</p>
		<input type="hidden" name="oculto" value="Valor Oculto">		

		<p>
			<label for="idchek">Checkbox idependiente:</label>
			<input type="checkbox" id="idchek" name="cbindependiente" value="marcado">
		</p>
		<p>
			<label for="idchekmult1">Checkbox multiple 1:</label>
			<input type="checkbox" id="idchekmult1" name="cbmult[]" value="v1">
			<label for="idchekmult2">Checkbox multiple 2:</label>
			<input type="checkbox" id="idchekmult2" name="cbmult[]" value="v2">
			<label for="idchekmult3">Checkbox multiple 3:</label>
			<input type="checkbox" id="idchekmult3" name="cbmult[]" value="v3">
			<label for="idchekmult4">Checkbox multiple 4:</label>
			<input type="checkbox" id="idchekmult4" name="cbmult[]" value="v4">
		</p>		

		<p>
			<label for="r1">Radio 1:</label>
			<input type="radio" id="r1" name="radio" value="radio 1">
			<label for="r2">Radio 2:</label>
			<input type="radio" id="r2" name="radio" value="radio 2">
			<label for="r3">Radio 3:</label>
			<input type="radio" id="r3" name="radio" value="radio 3">
		</p>
		<p>
			<label for="selSimple">Select simple:</label>
			<select name="select" id="selSimple">
				<option value="0"></option>
				<option value="1">Elemento nº 1</option>
				<option value="2">Elemento nº 2</option>
				<option value="3">Elemento nº 3</option>
				<option value="4">Elemento nº 4</option>
				<option value="5">Elemento nº 5</option>	
			</select>
		</p>

		<p>
			<label for="selMult">Select múltiple:</label>
			<select name="selectmult[]" id="selMult" multiple>
				<option value="1">Elemento nº 1</option>
				<option value="2">Elemento nº 2</option>
				<option value="3">Elemento nº 3</option>
				<option value="4">Elemento nº 4</option>
				<option value="5">Elemento nº 5</option>	
			</select>
		</p>

		<p>
			<label for="texta"></label>
			<textarea name="textarea" id="texta" cols="30" rows="3"></textarea>
		</p>

		<p>
			<input type="submit" value="Enviar datos" name="enviar">
		</p>
	</form>

<?php 
	// tomamos los datos del formulario:
	if (!$_GET)  //me aseguro que enviaron el formulario
		exit(); // si no envian formulario, cierro la ejecución

	echo "<h2>Datos enviados:</h2>";
	//cómo índice de $_GET o $_POST	debemos poner el valor del parámetro name
	$varTexto=isset($_GET["texto"])?$_GET["texto"]:"";
	$varClave=isset($_GET["clave"])?$_GET["clave"]:"";
	$varOculto=isset($_GET["oculto"])?$_GET["oculto"]:"";
	$varCbIndependiente=isset($_GET["cbindependiente"])?$_GET["cbindependiente"]:"No marcado";
	$varCbMult=isset($_GET["cbmult"])?$_GET["cbmult"]:array();
	$varRadio=isset($_GET["radio"])?$_GET["radio"]:"";
	$varSelect=isset($_GET["select"])?$_GET["select"]:"";
	$varSelectMult=isset($_GET["selectmult"])?$_GET["selectmult"]:array();
	$varTextArea=isset($_GET["textarea"])?$_GET["textarea"]:"";


    //$varClave=md5($varClave); 
	echo "<br>Texto: $varTexto";
	echo "<br>clave: $varClave";
	echo "<br>Oculto: $varOculto";
	echo "<br>Checkbox independiente: $varCbIndependiente";
	echo "<br>Checkbox Múltiple: ";
	foreach ($varCbMult as $valor) {
		echo "$valor ";
	}
	echo "<br>Radio: $varRadio";
	echo "<br>Select simple: $varSelect";
	echo "<br>Select Múltiple: ";
	foreach ($varSelectMult as $valor) {
		echo "$valor ";
	}
	echo "<br>Text Area: $varTextArea";


 ?>	

</body>
</html>


