<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Táboa de multiplicar</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style>
		#resultado {margin-top: 25px;}
	</style>
</head>
<?php 
	//$numero=$_GET["numero"];// recolle o parámetro número pasado por método GET, pero non fai comprobación. Non recomendable.

	//se o formulario se envía por POST cambiamos o array $_GET por $_POST

	/**** Control de erros *****/
	//usamos a variable $erro para controlar os erros, 
	$erro="";//supoñemos que non hai erro en principio

	//A función isset(var) permite comprobar si existe unha variable ou se nos pasaron un parámetro.
	if (isset($_GET["numero"])) 
	{
		$numero=$_GET["numero"];//non da erro porque existe o parámetro 'numero'.
		if ($numero=="") {
			$erro="<p class='bg-danger text-danger'>Debes poñer un número</p>";
		} 
		elseif (!is_numeric($numero)) { //se non é numérico
			$erro="<p class='bg-danger text-danger'>Número incorrecto. Debe ser numérico</p>";
		}
	}	
	else {
		$erro="<p class='bg-danger text-danger'>Non se pasou ningún número</p>";
	}
 ?>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1 class="text-center">Táboa de multiplicar</h1>		
			</div>
		</div>	
		<div class="row" id="resultado">
			<div class="col-xs-4 col-sm-2 col-sm-offset-5 col-xs-offset-4 text-center">
<?php 
if ($erro=="") { //if de comprobación de erro
				// xeramos a táboa só se non hai erro	
?>
				<h3>Táboa do <?php echo $numero; ?></h3>
				<table class="table table-condensed table-striped">
<?php 
					for ($i=0; $i <=9 ; $i++) { 
						echo "<tr>\n"; // comeza fila
						echo "\t<td>$numero</td>\n"; //columna operando1
						echo "\t<td>x</td>\n";// símbolo multiplicar
						echo "\t<td>$i</td>\n";//columna operando 2
						echo "\t<td>=</td>\n";//símbolo igual
						echo "\t<td class='text-right'>".$numero*$i."</td>\n";//resultado
						echo "</tr>\n"; //fin fila
					}
 ?>				
				</table>
<?php  
} //fin do if de comprobación de erro
else //se $erro non é igual a "", significa que hai erro
	echo $erro; //mostramos o html do erro
?>
				<a href="php02-tablaMult-GET.php" class="btn btn-primary">Volver</a>
			</div>
		</div>
	</div>
</body>
</html>