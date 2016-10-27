<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Xerar Táboa de Multiplicar</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<?php 
function xerarTaboa($numero)
		{
			echo"<h5 class='text-center'>Táboa do $numero</h5>";	
			echo"<table class='table table-condensed table-striped'>";
			 for ($i=0; $i <=9 ; $i++) { 
				echo "<tr>\n"; //comeza fila
				echo "<td>$numero</td>\n"; //columna operando1
				echo "<td>x</td>\n"; //símbolo multiplicar
				echo "<td>$i</td>"; //columna operando 2
				echo "<td>=</td>"; //símbolo igual
				echo "<td class='text-right'>".$numero*$i."</td>\n"; //resultado
				echo "</tr>\n"; //fin de fila
			} 
			echo"</table>";
		}
	 ?>
</head>
<body>
<div class="container">

	
	
<?php 
	for ($i=1; $i<=10 ; $i++) {
		if ($i==1 or $i==6) {
		 	echo "<div class='row'>\n";
		 	echo "\t<div class='col-sm-1'><!--col espacio 1 para centrar táboas--></div>\n";
		 	
		 } 
			echo "\t<div class='col-sm-2'>\n";
				xerarTaboa($i);
			echo "\t</div>\n";
		
			if ($i==5 or $i==10) {
		 	//echo "<div class='col-sm-1'></div>";
		 	echo "</div>\n";//pecha o div row
		 } 
	 }
?>
	 
</div>
</body>
</html>