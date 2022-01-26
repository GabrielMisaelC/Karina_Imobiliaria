<?php 
include 'banco.php';

if (isset($_POST["btn_cadastro"])) {
    $motivo = $_POST["motivo_conta"];
    $descricao = $_POST["descricao_contas"];
    $valor = $_POST["valor_contas"];
    $dat_vencimento = $_POST["data_contas"];
    if (isset($_POST["pago_contas"])){
        $pago = 1;
    }else {
        $pago = 0;
    }
    $data_pago = $_POST["data"];

   
    $sql = "INSERT INTO `TB_CONTA`(`MOTIVO`, `DESCRICAO`, `VALOR`, `DATA_VENCIMENTO`, `PAGO`, `DATA_PAGO`) VALUES ('$motivo','$descricao','$valor','$dat_vencimento','$pago','$data_pago')";

	$r = mysqli_query($db, $sql) or die("Não foi possivel inserir dados");
			
			if($r){
			  echo"<script language='javascript' type='text/javascript'>alert('CONTA cadastrado com sucesso!');window.location.href='inicio.php?link=1'</script>";
			}else{
			  echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse CONTA');window.location.href='inicio.php?link=1'</script>";
			}
		
}if (isset($_POST["btn_alterar"])) {
    $id = $_POST["id"];
    $motivo = $_POST["motivo_conta"];
    $descricao = $_POST["descricao_contas"];
    $valor = $_POST["valor_contas"];
    $dat_vencimento = $_POST["data_contas"];
    $pago = $_POST["pago_contas"];
    $data_pago = $_POST["data"];



    $sql = "UPDATE TB_CONTA SET DESCRICAO= '$descricao', VALOR= '$valor', DATA_VENCIMENTO= '$dat_vencimento', PAGO= '$pago', DATA_PAGO= '$data_pago' WHERE ID_CONTA = '$id'";

	mysqli_query($db, $sql) or die ("Não foi possivel inserir dados");
	header('location:inicio.php?link=1');
}
?>