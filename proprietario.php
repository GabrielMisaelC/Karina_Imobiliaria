<?php 
//require_once('config.php');

include 'banco.php';

if (isset($_POST["btn_cadastro"])) {
    $nome = $_POST["nome_pro"];
    $cpf = $_POST["cpf_pro"];
    $data_nascimento = $_POST["data_nascimento_pro"];
    $rg = $_POST["rg_pro"];
    $endereco_atual = $_POST["endereco_atual_pro"];
    $nacionalidade = $_POST["paises"];
    $rne = $_POST["rne_pro"];
    $profissao = $_POST["profissao_pro"];
    $agencia = $_POST["agencia_pro"];
    $conta = $_POST["conta_pro"];
    $banco = $_POST["banco_pro"];
    $celular = $_POST["celular_pro"];
    if (isset($_POST["casado"])){
        $casado = 1;
    }else {
        $casado = 0;
    }
    if (isset($_POST["solteiro"])){
        $solteiro = 1;
    }else {
        $solteiro = 0;
    }
    if (isset($_POST["Divorciado"])){
        $Divorciado = 1;
    }else {
        $Divorciado = 0;
    }
    if (isset($_POST["viuvo"])){
        $viuvo = 1;
    }else {
        $viuvo = 0;
    }
    if ($casado == 1 && $solteiro == 0 && $Divorciado == 0 && $viuvo == 0){
        $estado_civil = "Casado";
    }elseif ($casado == 0 && $solteiro == 1 && $Divorciado == 0 && $viuvo == 0){
        $estado_civil = "Solteiro";
    }elseif ($casado == 0 && $solteiro == 0 && $Divorciado == 1 && $viuvo == 0) {
        $estado_civil = "Divorciado";
    }elseif ($casado == 0 && $solteiro == 0 && $Divorciado == 0 && $viuvo == 1) {
        $estado_civil = "Viuvo";
    }
   
    $sql = "INSERT INTO `TB_PRO`(`NOME_PRO`, `CPF_PRO`, `DATA_NASCIMENTO_PRO`, `RG_PRO`, `ENDERECO_ATUAL_PRO`, `ESTADO_CIVIL_PRO`, `NACIONALIDADE_PRO`, `PROFISSAO_PRO`, `RNE_PRO`, `AGENCIA_PRO`, `CONTA_PRO`, `BANCO_PRO`, `CELULAR_PRO`) VALUES ('$nome','$cpf','$data_nascimento','$rg','$endereco_atual','$estado_civil','$nacionalidade','$profissao','$rne','$agencia','$conta','$banco','$celular')";

	$r = mysqli_query($db, $sql) or die("Não foi possivel inserir dados");
			
			if($r){
			  echo"<script language='javascript' type='text/javascript'>alert('Proprietario cadastrado com sucesso!');window.location.href='inicio.php?link=2'</script>";
			}else{
			  echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse Proprietario');window.location.href='inicio.php?link=2'</script>";
			}
		
}else if (isset($_POST["btn_alterar"])) {
   // $id = $_POST["id_pro"];
    $cpf = $_POST["cpf_pro"];
    $endereco_atual = $_POST["endereco_atual_pro"];
    $profissao = $_POST["profissao_pro"];
    $agencia = $_POST["agencia_pro"];
    $conta = $_POST["conta_pro"];
    $banco = $_POST["banco_pro"];
    $celular = $_POST["celular_pro"];
    if (isset($_POST["casado"])){
        $casado = 1;
    }else {
        $casado = 0;
    }
    if (isset($_POST["solteiro"])){
        $solteiro = 1;
    }else {
        $solteiro = 0;
    }
    if (isset($_POST["Divorciado"])){
        $Divorciado = 1;
    }else {
        $Divorciado = 0;
    }
    if (isset($_POST["viuvo"])){
        $viuvo = 1;
    }else {
        $viuvo = 0;
    }
    if ($casado == 1 && $solteiro == 0 && $Divorciado == 0 && $viuvo == 0){
        $estado_civil = "Casado";
    }elseif ($casado == 0 && $solteiro == 1 && $Divorciado == 0 && $viuvo == 0){
        $estado_civil = "Solteiro";
    }elseif ($casado == 0 && $solteiro == 0 && $Divorciado == 1 && $viuvo == 0) {
        $estado_civil = "Divorciado";
    }elseif ($casado == 0 && $solteiro == 0 && $Divorciado == 0 && $viuvo == 1) {
        $estado_civil = "Viuvo";
    }

    $sql = "UPDATE TB_PRO SET ENDERECO_ATUAL_PRO= '$endereco_atual', ESTADO_CIVIL_PRO= '$estado_civil', PROFISSAO_PRO= '$profissao', AGENCIA_PRO= '$agencia', CONTA_PRO= '$conta', BANCO_PRO= '$banco', CELULAR_PRO= '$celular' WHERE CPF_PRO = '$cpf'";

	mysqli_query($db, $sql) or die ("Não foi possivel inserir dados");
	header('location:inicio.php?link=2');


}
?>