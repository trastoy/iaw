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
<table id='tabla' class='table table-striped'>
<tr>
	<th>Nombre</th>
	<th>Apellidos</th>
	<th>Sexo</th>
	<th>NIF</th>
	<th>Deportes</th>
	<th>Provincia</th>
</tr>

<?php 

$decProv=array //Decodificador de código de Provincia
	(
		'CO' =>"A Coruña",
		'LU' =>"Lugo",
		'OU' =>"Ourense",
		'PO' =>"Pontevedra" 
	);
$decDep=array
	(
		'F' =>"Fútbol",
		'T' =>"Tennis",
		'N' =>"Natación",
		''  =>""
	 );

$fichero="datos/altaalumnos.csv";
$cursor=@fopen($fichero, "r") 
	or die("<p>Error, no se puede abrir el fichero $fichero</p>");


$registro=fgets($cursor);
while ( !feof($cursor)) {
	echo "\n\t<tr>";
	$campos=explode(";", $registro); // obtengo los campos por separado en array $campos
	//echo "<hr>".var_dump($campos)."<hr>"; volcar un dato en pantalla
	echo "\n\t\t<td>$campos[0]</td>";
	echo "\n\t\t<td>$campos[1]</td>";
	echo "\n\t\t<td>$campos[2]</td>";
	echo "\n\t\t<td>$campos[3]</td>";

	$arrayDeportes=explode("-",$campos[4]); //obtengo los códigos de deporte por separado en el arrayDeportes
	$deportes="";
	foreach ($arrayDeportes as $codDeporte) {
		//comprobamos si el código de deporte es conocido
		if (isset($decDep[$codDeporte]))
		//si es conocido, enviamos su decodificación(su nombre)
			$deportes.=$decDep[$codDeporte]."<br>";
		else
		//si no es conocido, enviamos el código entre signos.
			$deportes.="¿".$codDeporte."?<br>";
	}
	//estos controles isset no son necesarios si tenemos controlada la entrada de datos.

	echo "\n\t\t<td>$deportes</td>";
	$codProv=$campos[5];//tomamos el código de provincia, que lleva el retorno de carro al final.
	$codProv=trim($codProv);//elimino carácteres especiales, que es el retorno del carro.
	$nomProv=isset($decProv[$codProv])?$decProv[$codProv]:"¿".$codProv."?";
	//comprobamos si es conocido el código de provincia, en caso contrario devolvemos el código entre signos de interrogación.
	//no es necesaria la comprobación si tenemos controlada la entrada de datos.
			
	echo "\n\t\t<td>$decProv[$codProv]</td>";
	

	echo "\n\t</tr>";

	$registro=fgets($cursor); // leemos este registro
}



fclose($cursor); // cerramos comunicación con el fichero
 ?>	

</table>;
</body>
</html>