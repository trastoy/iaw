<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Leer fichero de texto con formato csv</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<style>
		#tabla {
			width: 50%;
			margin: 0 auto;
		}
	</style>

</head>
<body>
	<h1 class="text-center">Lectura de fichero txt/csv</h1>

<?php 
$fichero="datos/altaalumnos.csv";
$cursor=@fopen($fichero, "r") 
	or die("<p>Error, no se puede abrir el fichero $fichero</p>");

echo "\n<table id='tabla' class='table table-striped'>";

$registro=fgets($cursor);
while ( !feof($cursor)) {
	echo "\n\t<tr>";
	$campos=explode(";", $registro); // obtengo los campos por separado en array $campos
	echo "\n\t\t<td>$campos[0]</td>";
	echo "\n\t\t<td>$campos[1]</td>";
	echo "\n\t\t<td>$campos[2]</td>";
	echo "\n\t\t<td>$campos[3]</td>";
	echo "\n\t\t<td>$campos[4]</td>";
	echo "\n\t\t<td class='text-right'>$campos[5]</td>";

	echo "\n\t</tr>";

	$registro=fgets($cursor); // leemos este registro
}

echo "\n</table>";

fclose($cursor); // cerramos comunicación con el fichero
 ?>	


</body>
</html>