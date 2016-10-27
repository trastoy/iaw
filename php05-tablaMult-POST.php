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
function xerarTaboa($numero) {
	echo "<h3>Táboa do $numero</h3>";
	echo "<table class='table table-condensed table-striped'>";
	for ($i=0; $i <=9 ; $i++) { 
		echo "<tr>\n"; // comeza fila
		echo "\t<td>$numero</td>\n"; //columna operando1
		echo "\t<td>x</td>\n";// símbolo multiplicar
		echo "\t<td>$i</td>\n";//columna operando 2
		echo "\t<td>=</td>\n";//símbolo igual
		echo "\t<td class='text-right'>".$numero*$i."</td>\n";//resultado
		echo "</tr>\n"; //fin fila
	}
	echo "</table>";
}	
	/**** Control de erros *****/
	//usamos a variable $erro para controlar os erros, 
	$erro="";//supoñemos que non hai erro en principio
	//A función isset(var) permite comprobar si existe unha variable ou se nos pasaron un parámetro.
	if (isset($_POST["numero"])) 
	{
		$numero=$_POST["numero"];//non da erro porque existe o parámetro 'numero'.
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
			<div class="col-xs-4 col-sm-2  col-xs-offset-4 text-center">
<?php 
if ($erro=="")  //if de comprobación de erro, xeramos a táboa só se non hai erro	
	xerarTaboa($numero);
else //se $erro non é igual a "", significa que hai erro
	echo $erro; //mostramos o html do erro
?>
				<a href="php04-tablaMult-POST.php" class="btn btn-primary">Volver</a>
			</div>
		</div>
	</div>
</body>
</html>