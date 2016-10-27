<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Directorios</title>
</head>
<body>
<?php 


$dir=isset($_GET["dir"])?$_GET["dir"]:"d:";

@chdir($dir) or die("No fue posible ejecutar CHDIR $dir");

$cursor=@opendir($dir) or die("No fue posible abrir el directorio $dir");

echo "<h3>Contenido del directorio $dir<h3>";

echo "<ul>";
while ($elemento=readdir($cursor)) {
	if (is_dir($elemento)) {
		echo "<li><a href='php17-directorios.php?dir=$dir\\$elemento'>$elemento</a></li>";
	} else {
		echo "<li>$elemento</li>";
	}
}
echo "</ul>";

closedir($cursor);
?>	

</body>
</html>
