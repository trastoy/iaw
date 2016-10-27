<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Php01</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<style>
		#taboaDias{
			width: 150px;
			margin:0 auto;
		}
	</style>

</head>
<body>
	<h1>Probando PHP</h1>
<?php 
	// variables:
	$dia=0; //variable para xera-los índices dos días da semana no array
	$diaSemana=array("","luns","martes","mércores","xoves","venres","sábado","domingo");

	/*
	equivale a:
	$diaSemana[0]=""; deixamos a 0 sen usar para que o luns esté no índice 1 (día 1 da semana)
	$diaSemana[1]="luns";
	$diaSemana[2]="martes";
	*/

	?>

	<h3>Días da semana (formato lista):</h3>
	<ul>
<?php 
	for ($dia=1; $dia <=7 ; $dia++) { 
	echo "\t\t<li>$diaSemana[$dia]</li>\n";
	}

?>
	</ul>

	<h3 class="text-center">Días da semana (formato táboa):</h3>
<table id="taboaDias" class="table">	
	<tr>
		<th>día da semana</th>
	</tr>
<?php 
	for ($dia=1; $dia <=7 ; $dia++) { 
	echo "\t\t<tr>\n";
	echo "\t\t\t<td>$diaSemana[$dia]</td>\n";
	echo "\t\t</tr>\n";	
	}

?>

</table>	



</body>
</html>