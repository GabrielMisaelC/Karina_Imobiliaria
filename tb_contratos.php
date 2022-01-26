<?php 
include 'banco.php';
$sql = "SELECT *
FROM TB_CONTRATO
INNER JOIN TB_PRO
ON TB_CONTRATO.ID_PRO=TB_PRO.ID_PRO
INNER JOIN TB_IMV
ON TB_CONTRATO.ID_IMV = TB_IMV.ID_IMV
INNER JOIN TB_INQ
ON TB_CONTRATO.ID_INQ = TB_INQ.ID_INQ";

$resultado = mysqli_query($db, $sql);
$total = mysqli_num_rows($resultado);
$linha = mysqli_fetch_assoc($resultado); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link rel="stylesheet" type="text/css" href="../css/normalize.css">
	<meta charset="UTF-8">
	<title>Documente</title>
</head>
<body>
	<div id="tabela_h1">
	<center><b><h1>Lista De Contratos</h1></b></center>
	</div>
	<p></p>
	<div>
	<table id="tb_cliente" width="810px" border="0" cellpadding="0" cellspacing="1" bgcolor="#ff0000"> 
	<tr bgcolor="#ff0000" align="center">
		<th width="200px" height="20" ><font size="2" color="#fff"> Proprietario </font></th>
		<th width="180px" height="20" ><font size="2" color="#fff"> Inquilino </font></th>
		<th width="200px" height="20" ><font size="2" color="#fff"> Imovel </font>
        <th width="200px" height="20" ><font size="2" color="#fff"> Data inicio </font>
		<th widhth="260px"colspan="3"><font size="1" color="#fff"> Opção </font> </th>
	</tr>
	<?php 
if ($total){
	do{
	 ?>
	 <tr bgcolor="#fff">
	 	<td><font size="2" face="verdana, arial"> <b><?php echo $linha["NOME_PRO"];?></b></font></td>
	 	<td><font size="2" face="verdana, arial"> <b><?php echo $linha["NOME_INQ"];?></b> </font></td>
	    <td><font size="2" face="verdana, arial"> <b><?php echo $linha["LOGRADOURO"];?>  N.   <?php echo $linha["NUMERO"]; ?></b> </font></td>
        <td><font size="2" face="verdana, arial"> <b><?php echo $linha["DATA_INICIO_CONT"];?></b>  </font></td>
	 	<td align="center"> <font size="1" face="verdana, arial"> <a href="inicio.php?link=17&imv=<?php echo $linha["ID_IMV"];?>&pro=<?php echo $linha["ID_PRO"];?>&inq=<?php echo $linha["ID_INQ"];?>"><img src="img/contrato.png" alt=""></a></font> </td>
    </tr>
	<?php
}
 while ($linha = mysqli_fetch_assoc($resultado)); #indo para a próxima linha, verifica a quantidade de linhas para verificar se tem mais valor.
 	mysqli_free_result($resultado); #ele pula para a proxima
 }
 ?>
	</table>
	</div>
</body>
</html>
 