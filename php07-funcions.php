<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Funcións</title>
</head>
<body>
<?php 
function sumar(&$a,$b=0)
//$a argumento por referencia, $b por valor
//$b ten un valor por defecto 0, se non pasa valor para $b
{
	$suma=$a+$b;
	$a=0; $b=0;
	return $suma;
}


function pVariable() //número de parámetros variable
{
	$parametros=func_get_args();

	$resposta= "<br>Nº de parámetros:".count($parametros);
	//count: conta os elementos dun array
	foreach ($parametros as $key => $value) {
		$resposta.="<br>Par. nº ".++$key."=$value";
	}

	return $resposta;
}

function capicua($cadea)
{
	//devolve true se a cadea é capicúa, e false en caso contrario
	//strlen(string) devolve o número de carácteres dunha cadea

	$ncar=strlen($cadea);
	$cadeaInversa="";
	for ($i=$ncar-1; $i >=0 ; $i--) { 
		$cadeaInversa.=$cadea[$i];
	}
	if ($cadea==$cadeaInversa) {
		return "<p>A cadea <b>$cadea</b> é capicua</p>";

	}
	else 
		return "<p>A cadea <b>$cadea</b> NON é capicua</p>";
	
	// echo "<br>$cadea<br>$cadeaInversa";
}

function capicua2($cadea) //aproveitando funcións específicas de PHP
{
	//strrev devolve a cadea inversa dunha cadea
	if ($cadea==strrev($cadea)) {
		return "<p>A cadea <b>$cadea</b> é capicua</p>";

	}
	else 
		return "<p>A cadea <b>$cadea</b> NON é capicua</p>";
	
}

$a=6;
$b=5;
echo "<p>Valores antes de chamar á función: \$a=$a \$b=$b</p>";
echo "<p>$a + $b= ".sumar($a,$b)."</p>";
echo "<p>Valores despois de chamar á función: \$a=$a \$b=$b</p>";

$a=50;$b=1;
echo "<p>Valores antes de chamar á función: \$a=$a \$b=$b</p>";
echo "<p>Chamando á función con un só argumento sumar($a): ".sumar($a,$b)."</p>";
echo "<p>Valores despois de chamar á función: \$a=$a \$b=$b</p>";

echo "<hr>";
echo "<p>Chamamos á función pVariable con 2 parámetros:".pVariable(1,2)."</p>";
echo "<p>Chamamos á función pVariable con 0 parámetros:".pVariable()."</p>";
echo "<p>Chamamos á función pVariable con 5 parámetros:".pVariable("a","b","30","d","z")."</p>";

echo "<hr>";
echo "<p>Probando función capicúa</p>";
echo capicua("ABC");
echo capicua("ABCDCBA");
echo capicua("123454321");
echo capicua("ABCDEFGHIJK");

echo "<hr>";
echo "<p>Probando función capicúa2</p>";
echo capicua2("ABC");
echo capicua2("ABCDCBA");
echo capicua2("123454321");
echo capicua2("ABCDEFGHIJK");
?>

</body>
</html>