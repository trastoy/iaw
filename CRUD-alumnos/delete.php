<?php 
	require "../misfunciones.php";
	$registro=isset($_GET['id'])?$_GET['id']:false;
	//si se ejecuta la url: delete.php?id=9 or 1 se borrarían todos los registros. Esto es inyección SQL

	//if ($registro) { //solo si me mandan un id. No controlada inyección SQL
	//Para más control debemos asegurarnos que nos pasan un número solo.
	if (is_numeric($registro)) { //con esto controlo inyección SQL
		$sql="DELETE from alumnos WHERE registro=$registro";
		$c=conectarBaseDatos();
		$result=enviarConsulta($c,$sql);
	}

	header('Location:index.php'); //esto redirecciona a la página indicada

 ?>