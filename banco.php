<?php                       
$host = "localhost";
$usuario = "root";
$senha = "root";
$banco = "TESTE";
$port = "8889";

$db = mysqli_connect($host,$usuario,$senha,$banco,$port) or die("Não foi possivel se conectar ao banco");
 ?>