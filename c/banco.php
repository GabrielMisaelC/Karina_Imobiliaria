<?php                       
$host = "localhost";
$usuario = "root";
$senha = "root";
$banco = "DB_KARINA_IMOBILIARIA";
$port = "8889";

$db = mysqli_connect($host,$usuario,$senha,$banco,$port) or die("Não foi possivel se conectar ao banco");
 ?>