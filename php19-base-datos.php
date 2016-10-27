<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Bases de datos desde PHP</title>
</head>
<body>
	
<?php 

require("datos-conexion.php");
$baseDatos="iaw2016";
/* Establecemos conexión con el servidor de base de datos: */
$c=@mysqli_connect($servidor,$usuario,$clave)
	or die ("<p>Error al conectar con el servidor de base de datos $servidor</p>");

echo "<p>Se ha establecido conexión con servidor de base de datos $servidor</p>";

/* Creamos la base de datos $baseDatos en caso de no existir  */
$sql="CREATE DATABASE IF NOT EXISTS $baseDatos DEFAULT CHARSET=utf8;";
echo "<hr>$sql";
$result=@mysqli_query($c, $sql)
		or die ("<p>Error al crear la base de datos $baseDatos</p>
				<p>Error número:".mysqli_errno($c)."</p>
				<p>".mysqli_error($c)."</p>");

echo "<p>Se ha creado la base de datos $baseDatos (si no existía)<p>";

/* Seleccionamos la base de datos con la que queremos trabajar */
@mysqli_select_db($c,"$baseDatos")
		or die ("<p>Error al seleccionar la base de datos $baseDatos</p>
				<p>Error número:".mysqli_errno($c)."</p>
				<p>".mysqli_error($c)."</p>");

echo "<p>Se ha seleccionado la base de datos $baseDatos en el servidor $servidor</p>";

$sql="CREATE TABLE IF NOT EXISTS alumnos (
			registro 	INT NOT NULL AUTO_INCREMENT,
			nombre 		CHAR(25),
			apellidos 	CHAR(50),	
			sexo		CHAR(1),
			nif			CHAR(9),
			deportes	CHAR(10),
			provincia	CHAR(2),
			PRIMARY KEY (registro),
			UNIQUE KEY nif (nif)
		);
";
echo "<hr>$sql";

/*
 	PRIMARY KEY (registro),
  	UNIQUE KEY nif (nif) // si queremos nif único
*/

$result=@mysqli_query($c, $sql)
		or die ("<p>Error al ejecutar la sentencia SQL; $sql</p>
				<p>Error número:".mysqli_errno($c)."</p>
				<p>".mysqli_error($c)."</p>");

echo "<p>Se ha creado la tabla alumnos (si no existía)<p>";

/*  Indicamos que la comunicación con la base de datos será con codificación UTF8   */
$sql="SET NAMES 'utf8'";
echo "<hr>$sql";
$result=@mysqli_query($c, $sql)
		or die ("<p>Error al ejecutar la sentencia SQL; $sql</p>
				<p>Error número:".mysqli_errno($c)."</p>
				<p>".mysqli_error($c)."</p>");

echo "<p>Se ha establecido comunicación en codificación UTF8<p>";



$sql="TRUNCATE TABLE alumnos;";
echo "<hr>$sql";
$result=@mysqli_query($c, $sql)
		or die ("<p>Error al ejecutar la sentencia SQL; $sql</p>
				<p>Error número:".mysqli_errno($c)."</p>
				<p>".mysqli_error($c)."</p>");

echo "<p>Se vació la tabla alumnos</p>";

/* Insertamos registros en la tabla alumnos */

$sql="INSERT INTO alumnos VALUES 
		(NULL,'Ana','Fernández Díaz','M','00000000T','T-N','PO'),
		(NULL,'Pedro','Abuín Díaz','H','12345678R','F-T','LU'),
		(NULL,'Gonzalo','López Roca','H','33445567T','F-T-N','CO'),
		(NULL,'Elena','Nito del Bosque','M','33445566F','F-N','OU'),
		(NULL,'Paco','Merlo Todo','H','23232323T','T-N','LU'),
		(NULL,'María','Pérez Roca','H','23456388Q','F-T','PO'),
		(NULL,'Gonzalo','López Roca','H','33445566T','F-T-N','CO'),
		(NULL,'María','Abuín Roca','H','23456788Q','F-T','PO'),
		(NULL,'Juan','Pérez Roca','H','23456988Q','F-T','PO'),
		(NULL,'Ana','Fernández Díaz','M','00006000T','T-N','PO'),
		(NULL,'Pedro','Abuín Díaz','H','12345608R','F-T','LU'),
		(NULL,'Gonzalo','López Roca','H','33445966T','F-T-N','CO'),
		(NULL,'Estefania','Meca chis','M','33465566F','F-N','OU'),
		(NULL,'Paco','Merlo Todo','H','23232823T','T-N','LU')
	;
";
echo "<hr>$sql";
$result=@mysqli_query($c, $sql)
		or die ("<p>Error al ejecutar la sentencia SQL; $sql</p>
				<p>Error número:".mysqli_errno($c)."</p>
				<p>".mysqli_error($c)."</p>");
/* calculamos el número de registros afectados por última sentencia sql */
$numeroRegistros=mysqli_affected_rows($c);		

echo "<p>Se han añadido $numeroRegistros registros a la tabla alumnos<p>";

/* consultas SELECT */

$sql="SELECT * FROM alumnos ORDER BY apellidos, nombre;";
echo "<hr>$sql";
$result=@mysqli_query($c, $sql)
		or die ("<p>Error al ejecutar la sentencia SQL; $sql</p>
				<p>Error número:".mysqli_errno($c)."</p>
				<p>".mysqli_error($c)."</p>");

$numeroRegistros=mysqli_num_rows($result); //Número de registros que devuelve la sentencia SELECT
echo "<p>La sentencia <b>$sql</b> devuelve <b>$numeroRegistros</b> registros:</p>";
echo "<p>Lectura del resultado empleando función mysqli_fetch_row()</p>";
while($fila=mysqli_fetch_row($result)) {
	echo "<br>$fila[0] - $fila[1] - $fila[2] - $fila[3] - $fila[4] - $fila[5] - $fila[6]";
}

// Colocamos puntero del resultado en el registro 0
mysqli_data_seek($result,0);

echo "<p>Lectura del resultado empleando función mysqli_fetch_array()</p>";
while($fila=mysqli_fetch_array($result)) {
	echo "<br>".$fila["registro"]
	." - ".$fila["nombre"]
	." - ".$fila["apellidos"]
	." - ".$fila["sexo"]
	." - ".$fila["nif"]
	." - ".$fila["deportes"]
	." - ".$fila["provincia"];
}




/* Cerramos la conexión con el servidor de base de datos $servidor */
mysqli_close($c);
echo "<p>Se ha cerrado la conexión con el servidor de base de datos $servidor</p>";
 ?>	
</body>
</html>