<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Leer tabla alumnos de base de datos</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
</head>
<style>
	#contenedor {
		width: 50%;
		margin: 50px auto;
	}
	caption {
		text-align: center;
		font-size: 2em;
	}
</style>
<body>
<?php 
$nomProv= array(
		'CO' => "A Coruña" ,
		'LU' => "Lugo" ,
		'OU' => "Ourense" ,
		'PO' => "Pontevedra");

$nomDep=array(	
		'F' => "Fútbol" , 
		'T' => "Ténis" , 
		'N' => "Natación");

require "misfunciones.php"; // para control nif y base de datos
$c=conectarBaseDatos();	
$sql="SELECT * FROM alumnos ORDER BY apellidos, nombre;";
$result=enviarConsulta($c,$sql);		
echo "\n<div id='contenedor'>";

echo "\n<table class='table table-striped table-bordered'>";
echo "<caption>Listado de la tabla Alumnos</caption>";
echo "\n<tr>";
echo "\n\t<th>Apellidos</th>";
echo "\n\t<th>Nombre</th>";
echo "\n\t<th>Sexo</th>";
echo "\n\t<th>NIF</th>";
echo "\n\t<th>Deportes</th>";
echo "\n\t<th>Provincia</th>";
echo "\n</tr>";
while($fila=mysqli_fetch_array($result)) {
	echo "\n<tr>";
	echo "\n\t<td>".$fila["apellidos"]."</td>";
	echo "\n\t<td>".$fila["nombre"]."</td>";
	echo "\n\t<td>".$fila["sexo"]."</td>";
	echo "\n\t<td>".$fila["nif"]."</td>";
	echo "\n\t<td>";

	$deportes=explode("-",$fila["deportes"]);
	foreach ($deportes as $codDeporte) {
		echo "<div>".$nomDep[$codDeporte]."</div>";
	}

	/* Esto en caso de que los códigos de deportes no llevaran separador
	$deportes=$fila["deportes"];//$deportes será una cadena con los códigos
	for($i=0; $i<strlen($deportes);$i++) {
		echo "<div>".$nomDep[$deportes[$i]]."</div>";
	}*/

	echo "</td>";
	echo "\n\t<td>".$nomProv[$fila["provincia"]]."</td>";
	echo "\n</tr>";
}
echo "\n</table>";
echo "\n</div>";
mysqli_close($c);

 ?>	
</body>
</html>
