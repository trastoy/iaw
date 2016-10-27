<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Toma datos formulario</title>
</head>
<?php 
	//cómo índice de $_GET o $_POST	debemos poner el valor del parámtro name
	$varTexto=isset($_POST["texto"])?$_POST["texto"]:"";
	$varClave=isset($_POST["clave"])?$_POST["clave"]:"";
	$varOculto=isset($_POST["oculto"])?$_POST["oculto"]:"";
	$varCbIndependiente=isset($_POST["cbindependiente"])?$_POST["cbindependiente"]:"No marcado";
	$varCbMult=isset($_POST["cbmult"])?$_POST["cbmult"]:array();
	$varRadio=isset($_POST["radio"])?$_POST["radio"]:"";
	$varSelect=isset($_POST["select"])?$_POST["select"]:"";
	$varSelectMult=isset($_POST["selectmult"])?$_POST["selectmult"]:array();
	$varTextArea=isset($_POST["textarea"])?$_POST["textarea"]:"";


 ?>
<body>
	<h1>Tratamiento de datos de formulario</h1>
	<form method="post"> <!-- también get -->
		<p>
			<label for="idtexto">Tipo texto</label>
			<input type="text" id="idtexto" name="texto" value="<?php echo $varTexto ?>">
		</p>
		<p>
			<label for="idclave">Tipo password</label>
			<input type="password" id="idclave" name="clave">
		</p>
		<input type="hidden" name="oculto" value="Valor Oculto">		
		<p>
			<label for="idchek">Checkbox idependiente:</label>
			<input type="checkbox" id="idchek" name="cbindependiente" value="marcado" <?php echo $varCbIndependiente=="marcado"?"checked":"" ?> >
		</p>

		<p>
			<label for="idchekmult1">Checkbox multiple 1:</label>
			<input type="checkbox" id="idchekmult1" name="cbmult[]" value="v1" <?php echo in_array("v1", $varCbMult)?"checked":"" ?> >
			<label for="idchekmult2">Checkbox multiple 2:</label>
			<input type="checkbox" id="idchekmult2" name="cbmult[]" value="v2" <?php echo in_array("v2", $varCbMult)?"checked":"" ?> >
			<label for="idchekmult3">Checkbox multiple 3:</label>
			<input type="checkbox" id="idchekmult3" name="cbmult[]" value="v3" <?php echo in_array("v3", $varCbMult)?"checked":"" ?> >
			<label for="idchekmult4">Checkbox multiple 4:</label>
			<input type="checkbox" id="idchekmult4" name="cbmult[]" value="v4" <?php echo in_array("v4", $varCbMult)?"checked":"" ?> >
		</p>		

		<p>
			<label for="r1">Radio 1:</label>
			<input type="radio" id="r1" name="radio" value="radio 1" <?php echo $varRadio=="radio 1"?"checked":"" ?> >
			<label for="r2">Radio 2:</label>
			<input type="radio" id="r2" name="radio" value="radio 2" <?php echo $varRadio=="radio 2"?"checked":"" ?> >
			<label for="r3">Radio 3:</label>
			<input type="radio" id="r3" name="radio" value="radio 3" <?php echo $varRadio=="radio 3"?"checked":"" ?> >
		</p>
		<p>
			<label for="selSimple">Select simple:</label>
			<select name="select" id="selSimple">
				<option value="0"></option>
				<option value="1" <?php echo $varSelect=="1"?"selected":"" ?> >Elemento nº 1</option>
				<option value="2" <?php echo $varSelect=="2"?"selected":"" ?> >Elemento nº 2</option>
				<option value="3" <?php echo $varSelect=="3"?"selected":"" ?> >Elemento nº 3</option>
				<option value="4" <?php echo $varSelect=="4"?"selected":"" ?> >Elemento nº 4</option>
				<option value="5" <?php echo $varSelect=="5"?"selected":"" ?> >Elemento nº 5</option>	
			</select>
		</p>

		<p>
			<label for="selMult">Select múltimple:</label>
			<select name="selectmult[]" id="selMult" multiple>
				<option value="1" <?php echo in_array("1", $varSelectMult)?"selected":"" ?> >Elemento nº 1</option>
				<option value="2" <?php echo in_array("2", $varSelectMult)?"selected":"" ?> >Elemento nº 2</option>
				<option value="3" <?php echo in_array("3", $varSelectMult)?"selected":"" ?> >Elemento nº 3</option>
				<option value="4" <?php echo in_array("4", $varSelectMult)?"selected":"" ?> >Elemento nº 4</option>
				<option value="5" <?php echo in_array("5", $varSelectMult)?"selected":"" ?> >Elemento nº 5</option>	
			</select>
		</p>

		<p>
			<label for="texta"></label>
			<textarea name="textarea" id="texta" cols="30" rows="3"><?php echo $varTextArea ?></textarea>
		</p>

		<p>
			<input type="submit" value="Enviar datos" name="enviar">
		</p>
	</form>

<?php 
	// tomamos los datos del formulario:
	if (!$_POST)  //me aseguro que enviaron el formulario
		exit(); // si no envian formulario, cierro la ejecución

	echo "<h2>Datos enviados:</h2>";

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


