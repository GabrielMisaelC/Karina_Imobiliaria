<?php 
require_once('config.php');



$pro = new Proprietario();
$pro->id(3);
$result = Proprietario::id(3);
foreach ($result as $adm ) {
	foreach ($adm as $key => $value) {
		echo $key.": ".$value."<br>";
	}
}

//var_dump($result); 
/*
$mat1 = $result[0];
echo $mat1['id'];
echo $mat1['nome'];
echo $mat1['email'];
echo $mat1['senha'];

$mat2 = $result[1];

*/


/*
$result = Administrador::search('r');
foreach ($result as $adm ) {
	foreach ($adm as $key => $value) {
		echo $key.": ".$value."<br>";
	}
} */

//$adm = new Administrador();
//$validado = $adm->login('email', 'sad');
//echo $validado;
/*
$inq = new Inquilino('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11');
$inq->insert();
echo $inq->getId();

//$adm = new Administrador('Segur Anssa', 'se523g@2342.com', 'seg@bb', 'ddqewd');
//$adm->insert();
//echo $adm->getId();

$adm = new Administrador();
//$adm->update(4,'Tauane Greg Duck', 'tgd@');

//$adm->setId(3);
//$adm->delete();

$adm->login('email', 'sad');
if ($adm->getId()!=null){
	echo "Bem vindo(a) ".$adm->getNome().". <br> Login efetuado com sucesso.";
}else{
	echo "Falha no login.";
}
*/
?>