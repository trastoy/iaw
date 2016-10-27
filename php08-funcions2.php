<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Funciones definidas por el usuario</title>
</head>
<body>
<?php 
require "misfunciones.php";

$a=4;
$b=5;

$suma=sumar($a,$b);
echo "<p>";
echo "$a + $b = $suma"; // echo "$a + $b = ".sumar($a,$b); 
echo "</p>";

echo "<hr>suma 1 2 3 4 5 6 : ";
echo "<br>Total: ".sumamultiple(1,2,3,4,5,6);

echo "<hr>suma 1 2 : ";
echo "<br>Total: ".sumamultiple(1,2);

echo "<hr>suma sin parámetros : ";
echo "<br>Total: ".sumamultiple();

echo "<hr>";
echo "<h3>uso de la función letranif</h3>";
$midni="33346725";
echo "Nif de $midni: <strong>$midni-".letranif($midni)."</strong>";


 ?>	


</body>
</html>