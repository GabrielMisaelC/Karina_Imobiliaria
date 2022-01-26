<?php 
include 'banco.php';


if (isset($_POST["btn_cadastro"])) {
    $cpf = $_POST["cpf"];
    $cep = $_POST["cep"];
    $logradouro = $_POST["rua"];
    $bairro = $_POST["bairro"];
    $numero = $_POST["numero_imv"];
    if (isset($_POST["locacao"])){
        $locacao = 1;
    }else {
        $locacao = 0;
    }
    if (isset($_POST["venda"])){
        $venda = 1;
    }else {
        $venda = 0;
    }
    $valor_venda = $_POST["valor_venda_imv"];
    $valor_locacao = $_POST["valor_locacao_imv"];
    $status = $_POST["status_imv"];

    $sql = "SELECT * FROM TB_PRO WHERE CPF_PRO= '$cpf'";
    $resultado = mysqli_query($db, $sql);
    $total = mysqli_num_rows($resultado);
    $linha = mysqli_fetch_assoc($resultado); 

    if ($total){
        do{
            $id_pro = $linha["ID_PRO"];
    }
    while ($linha = mysqli_fetch_assoc($resultado)); #indo para a próxima linha, verifica a quantidade de linhas para verificar se tem mais valor.
        mysqli_free_result($resultado); #ele pula para a proxima
    }

    $sql = "INSERT INTO `TB_IMV`(`ID_PRO`, `CEP`, `LOGRADOURO`, `BAIRRO_PRO`, `NUMERO`, `LOCACAO`, `VENDA`, `VALOR_VENDA`, `VALOR_LOCACAO`, `STATUS`) 
    VALUES ('$id_pro','$cep','$logradouro','$bairro','$numero','$locacao','$venda','$valor_venda','$valor_locacao','$status')";

	$r = mysqli_query($db, $sql) or die("Não foi possivel inserir dados");
			
			if($r){
			  echo"<script language='javascript' type='text/javascript'>alert('Imovel cadastrado com sucesso!');window.location.href='inicio.php?link=1'</script>";
			}else{
			  echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse Imovel');window.location.href='inicio.php?link=1'</script>";
			}
		
}else if (isset($_POST["btn_alterar"])) {
   // $id_pro = $_POST["id_pro"];
    $id = $_POST["id_imv"];
    $cep = $_POST["cep_imv"];
    $logradouro = $_POST["logradouro_imv"];
    $bairro = $_POST["bairro_imv"];
    $numero = $_POST["numero_imv"];
    if (isset($_POST["locacao"])){
        $locacao = 1;
    }else {
        $locacao = 0;
    }
    if (isset($_POST["venda"])){
        $venda = 1;
    }else {
        $venda = 0;
    }
    $valor_venda = $_POST["valor_venda_imv"];
    $valor_locacao = $_POST["valor_locacao_imv"];
    $status = $_POST["status_imv"];

    $sql = "UPDATE TB_IMV SET LOCACAO= '$locacao', VENDA= '$venda', VALOR_VENDA= '$valor_venda', VALOR_LOCACAO= '$valor_locacao', STATUS= '$status' WHERE ID_IMV = '$id'";

	mysqli_query($db, $sql) or die ("Não foi possivel inserir dados");
	header('location:inicio.php?link=1');

}
?>