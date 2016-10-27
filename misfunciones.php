<?php 
/* Funciones definidas por el usuario (programador) */
function sumar($op1=0,$op2=0) { // 0 valor por defecto si no me pasan parámetro
	$resultado=$op1+$op2;
	return $resultado;
	// return $op1+$op2;
}

function sumamultiple()
{
	echo "<p>Me han pasado ".func_num_args()." parámetros</p>";
	$suma=0; // acumulador para suma de todos los parámetros
	$parametros=func_get_args();
	foreach ($parametros as $i => $valor) {
		echo "<br>Parámetro número ".($i+1)." = $valor";
		$suma+=$valor;
	}
	return $suma;

}
function letranif($dni){ //calcula la letra que corresponde a un dni
	$letras="TRWAGMYFPDXBNJZSQVHLCKE";
	       //01234567890123456789012
		   //0         1         2 
	$resto=$dni % 23; // devuelve el resto de la división entera por 23
	return $letras[$resto];
}

function conectarBaseDatos($fichero="datos-conexion") {
	$fichero.=".php";
	require "$fichero";
	/* Establecemos conexión con la base de datos */
	$c=@mysqli_connect($servidor,$usuario,$clave,$baseDatos)
		or die ("<p>Error al conectar con el servidor de base de datos $servidor</p>");

	/*  Indicamos que la comunicación con la base de datos será con codificación UTF8   */
	$sql="SET NAMES 'utf8'";
	$result=@mysqli_query($c, $sql)
			or die ("<p>Error al ejecutar la sentencia SQL; $sql</p>
					<p>Error número:".mysqli_errno($c)."</p>
					<p>".mysqli_error($c)."</p>");
	return $c;		
}	

function enviarConsulta($c,$sql) {
	$result=@mysqli_query($c, $sql)
			or die ("<p>Error al ejecutar la sentencia SQL; $sql</p>
					<p>Error número:".mysqli_errno($c)."</p>
					<p>".mysqli_error($c)."</p>");
	return $result;
}
?>