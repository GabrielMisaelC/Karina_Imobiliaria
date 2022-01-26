<?php 
include 'banco.php';
$sql = "select * from TB_IMV";
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
	<center><b><h1>Lista De Imoveis</h1></b></center>
	</div>
	<p></p>
	<div>
	<table id="tb_cliente" width="810px" border="0" cellpadding="0" cellspacing="1" bgcolor="#ff0000"> 
	<tr bgcolor="#ff0000" align="center">
		<th width="120px" height="20" ><font size="2" color="#fff"> CEP </font></th>
		<th width="180px" height="20" ><font size="2" color="#fff"> Logradouro </font></th>
		<th width="120px" height="20" ><font size="2" color="#fff"> Numero </font>
        <th width="200px" height="20" ><font size="2" color="#fff"> Bairro </font>
		<th widhth="260px"colspan="3"><font size="3" color="#fff"> Opção </font> </th>
	</tr>
	<?php 
if ($total){
	do{
	 ?>
	 <tr bgcolor="#fff">
	 	<td><font size="2" face="verdana, arial"> <b><?php echo $linha["CEP"];?></b></font></td>
	 	<td><font size="2" face="verdana, arial"> <b><?php echo $linha["LOGRADOURO"];?></b> </font></td>
	    <td><font size="2" face="verdana, arial"> <b><?php echo $linha["NUMERO"];?></b> </font></td>
        <td><font size="2" face="verdana, arial"> <b><?php echo $linha["BAIRRO_PRO"];?></b>  </font></td>
	 	<td align="center"> <font size="1" face="verdana, arial"> <a href="inicio.php?link=4&imv=<?php echo $linha["ID_IMV"];?>&p=<?php echo $linha["ID_PRO"] ?>"><img src="img/perfil.png" alt=""></a></font> </td>
        <td align="center"> <font size="1" face="verdana, arial"> <a href="inicio.php?link=2&pro=<?php echo $linha["ID_IMV"];?>"><img src="img/pagamento.png" alt=""></a></font> </td>
	    <td align="center"> <font size="1" face="verdana, arial"> <a href="inicio.php?link=10&imv=<?php echo $linha["ID_IMV"];?>&p=<?php echo $linha["ID_PRO"] ?>"><img src="img/contrato.png" alt=""></a></font> </td>
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
 