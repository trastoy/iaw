<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Alta de registros en fichero de texto</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<link rel="stylesheet" href="css/estilo16.css">
</head>
<body>
<?php 

require "misfunciones.php"; // para control nif

$nombre=isset($_POST["nombre"])?$_POST["nombre"]:"";
$apellidos=isset($_POST["apellidos"])?$_POST["apellidos"]:"";
$sexo=isset($_POST["sexo"])?$_POST["sexo"]:"";
$nif=isset($_POST["nif"])?strtoupper($_POST["nif"]):"";
$deportes=isset($_POST["deportes"])?$_POST["deportes"]:array();
$provincia=isset($_POST["provincia"])?$_POST["provincia"]:"";


$errores=false; //suponemos no hay errores

// Control del campo nombre
//$control="has-success has-feedback";
//$icon="glyphicon-ok";
$control="";$icon="glyphicon-ok";$men="";
if ($nombre=="" && $_POST) {
	$control="has-error has-feedback";
	$icon="glyphicon-remove";
	$men="Este campo es obligatorio";
	$errores=true;
}
?>	

<div id="contenedor">
	<h1 class="text-center">Alta Alumnos</h1>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<div class="form-group <?php echo $control ?>">
		  <label class="control-label" for="c1">Nombre:</label>
		  <input  type="text" class="form-control" id="c1" aria-describedby="texto1" name="nombre"  value="<?php echo $nombre ?>">
		  <span class="glyphicon <?php echo $icon ?> form-control-feedback" aria-hidden="true"></span>
		  <span id="texto1" class="help-block"><?php echo $men ?></span>
		</div>
<?php 
// Control del campo apellidos
$control="";$icon="";$men="";
if ($apellidos=="" && $_POST) {
	$control="has-error has-feedback";
	$icon="glyphicon-remove";
	$men="Este campo es obligatorio";
	$errores=true;
}
 ?>
		<div class="form-group <?php echo $control ?>">
		  <label class="control-label" for="c2">Apellidos:</label>
		  <input  type="text" class="form-control" id="c2" aria-describedby="texto2" name="apellidos"  value="<?php echo $apellidos ?>">
		  <span class="glyphicon <?php echo $icon ?> form-control-feedback" aria-hidden="true"></span>
		  <span id="texto2" class="help-block"><?php echo $men ?></span>
		</div>
<?php 
// Control del campo sexo
$control="";$icon="";$men="";
if ($sexo=="" && $_POST) {
	$control="has-error has-feedback";
	$icon="glyphicon-remove";
	$men="Este campo es obligatorio";
	$errores=true;
}
?>
		<div  class="form-group <?php echo $control ?>">
		  	<label class="control-label">Sexo:</label>
		  	<span class="glyphicon <?php echo $icon ?> form-control-feedback" aria-hidden="true"></span>
		  	<span id="texto3" class="help-block"><?php echo $men ?></span>
			<div class="radio">
			  <label>
			  	<input  type="radio" name="sexo" value="H" <?php echo $sexo=="H"?"checked":"" ?>>
			  	Hombre&nbsp;&nbsp;
			  </label>
			  <label>
			  	<input  type="radio" name="sexo" value="M" <?php echo $sexo=="M"?"checked":"" ?>> 
			  	Mujer 
			  </label>
			</div>
		</div>
<?php 
// Control del campo nif
$control="";$icon="";$men="";
if ($nif=="" && $_POST) {
	$control="has-error has-feedback";
	$icon="glyphicon-remove";
	$men="Este campo es obligatorio";
	$errores=true;
} elseif($_POST) {
	$dni=substr($nif,0,-1); //tomamos número dni
	$letra=substr($nif,-1); //tomamos letra nif
	if(strlen($dni)!=8 or !is_numeric($dni)){
		$control="has-error has-feedback";
		$icon="glyphicon-remove";
		$men.="El dni debe ser numérico de 8 dígitos. ";
		$errores=true;
	}
	if(strlen($letra)!=1 or is_numeric($letra)){
		$control="has-error has-feedback";
		$icon="glyphicon-remove";
		$men.="La letra debe tener un solo caracter alfabético";
		$errores=true;
	}
	if($control=="") {
		    $letracalculada=letranif($dni);
			if ($letracalculada!=$letra) {
				$control="has-warning has-feedback";
				$icon="glyphicon-warning-sign";
				$men.="NIF incorrecto, no se corresponde dni con letra";
				$errores=true;
			}	
	}


}
 ?>
		<div class="form-group <?php echo $control ?>">
		  <label class="control-label" for="c4">NIF:</label>
		  <input  type="text" class="form-control" id="c4" aria-describedby="texto4" name="nif"  value="<?php echo $nif ?>">
		  <span class="glyphicon <?php echo $icon ?> form-control-feedback" aria-hidden="true"></span>
		  <span id="texto4" class="help-block"><?php echo $men ?></span>
		</div>
<?php 
// Control del campo deportes con checkbox
// este campo es opcional, por lo que no hacemos control
$control="";$icon="";$men="";
?>
		<div class="form-group <?php echo $control ?>">
		  	<label class="control-label">Deportes que practicas:</label>
		  	<span class="glyphicon <?php echo $icon ?> form-control-feedback" aria-hidden="true"></span>
		  	<span id="texto5" class="help-block"><?php echo $men ?></span>
			<div class="checkbox">
			  <label>
			  	<input type="checkbox" value="F" name="deportes[]" <?php echo in_array("F", $deportes)?"checked":"" ?>>
			  	Fútbol&nbsp;&nbsp;
			  </label>
			  <label>
			  	<input type="checkbox" value="T" name="deportes[]" <?php echo in_array("T", $deportes)?"checked":"" ?>>
			  	Ténis&nbsp;&nbsp;
			  </label>
			  <label>
			  	<input type="checkbox" value="N" name="deportes[]" <?php echo in_array("N", $deportes)?"checked":"" ?>>
			  	Natación
			  </label>
			</div>	
		</div>

<?php 
// Control del campo provincia
$control="";$icon="";$men="";
if ($provincia=="0" && $_POST) {
	$control="has-error has-feedback";
	$icon="glyphicon-remove";
	$men="Este campo es obligatorio";
	$errores=true;
}
 ?>
		<div class="form-group <?php echo $control ?>">
		  <label class="control-label" for="c6">Provincia:</label>
		  <select  class="form-control" id="c6" name="provincia" aria-describedby="texto6">
			  <option value="0"></option>
			  <option value="CO" <?php echo $provincia=="CO"?"selected":"" ?>>A Coruña</option>
			  <option value="LU" <?php echo $provincia=="LU"?"selected":"" ?>>Lugo</option>
			  <option value="OU" <?php echo $provincia=="OU"?"selected":"" ?>>Ourense</option>
			  <option value="PO" <?php echo $provincia=="PO"?"selected":"" ?>>Pontevedra</option>
		  </select>		  
		  <span class="glyphicon <?php echo $icon ?> form-control-feedback" aria-hidden="true"></span>
		  <span id="texto6" class="help-block"><?php echo $men ?></span>
		</div>

	 	<div class="form-group ">
			<?php
			if (!$errores && $_POST) {
				$fichero="datos/altaalumnos.csv";
				$cursor=@fopen($fichero, "a") 
					or die("<p>Error, el fichero $fichero no se puede abrir</p>");
				$deportes=implode("-", $deportes);
				fputs($cursor,$nombre.";".$apellidos.";".$sexo.";".$nif.";".$deportes.";".$provincia."\n");
				fclose($cursor);
				echo "<p class='aceptado text-success bg-success'>Alumno Aceptado</p>";
			    echo "<a href='".$_SERVER['PHP_SELF']."' class='btn btn-default'>Nuevo registro</a>";	
			} else {
			    echo '<input class="btn btn-default" type="submit" value="ALTA Alumno/a" >';
			}
			?>
		</div>

		
	</form>
</div>	

</body>
</html>
