<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="WUTF-8">
	<title>Fechas</title>
</head>
<body>
<?php 
// echo time(); da momento unix actual, segundos desde 1/1/1970
setlocale(LC_ALL, "spanish"); //galician para galicia e galego

$hor=0;
$min=0;
$seg=0;
$dia=9;
$mes=10;
$ano=2016;

echo "<h3>Momento unix de una fecha determinada</h3>";

$munix=mktime($hor,$min,$seg,$mes,$dia,$ano);
echo "<p>Momento Unix para $dia-$mes-$ano $hor:$min:$seg -> $munix</p>";

$info=strftime("$dia/$mes/$ano fue %A, %d de %B de %Y",$munix);
echo "$info";

echo "<h3>Momento unix del momento actual</h3>";
$info=strftime("Hoy es %A, %d de %B de %Y<br>Son las %H:%M:%S",time());
echo "$info";





 ?>	
</body>
</html>