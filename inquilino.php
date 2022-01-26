<?php 
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
    $celular = $_POST["celular_pro"];
    $condicao_pag = $_POST["condicao_pag_inq"];
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
    $sql = "INSERT INTO `TB_INQ`(`NOME_INQ`, `CPF_INQ`, `CELULAR`, `CONDICAO_PAGAMANTO_INQ`, `REN_INQ`, `PROFISSAO_INQ`, `NACIONALIDADE_INQ`, `ENDERECO_ATUAL_INQ`, `ESTADO_CIVIL_INQ`, `RG_INQ`, `DATA_NASCIMENTO_INQ`) VALUES ('$nome','$cpf','$celular','$condicao_pag','$rne','$profissao','$nacionalidade','$endereco_atual','$estado_civil','$rg','$data_nascimento')";
    $r = mysqli_query($db, $sql) or die("Não foi possivel inserir dados");

   
			if($r){
			  echo"<script language='javascript' type='text/javascript'>alert('Inquilino cadastrado com sucesso!);window.location.href='inicio.php?link=1'</script>";
			}else{
			  echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse Inquilino');window.location.href='inicio.php?link=1'</script>";
			}
		
}if (isset($_POST["btn_alterar"])) {

    $nome = $_POST["nome_pro"];
    $cpf = $_POST["cpf_pro"];
    $data_nascimento = $_POST["data_nascimento_pro"];
    $rg = $_POST["rg_pro"];
    $endereco_atual = $_POST["endereco_atual_pro"];
    $nacionalidade = $_POST["paises"];
    $rne = $_POST["rne_pro"];
    $profissao = $_POST["profissao_pro"];
    $celular = $_POST["celular_pro"];
    $condicao_pag = $_POST["condicao_pag_inq"];
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
    $sql = "UPDATE TB_INQ SET CELULAR= '$celular', ENDERECO_ATUAL_INQ= '$endereco_atual', PROFISSAO_INQ= '$profissao', CONDICAO_PAGAMANTO_INQ= '$condicao_pag', ESTADO_CIVIL_INQ= '$estado_civil' WHERE CPF_INQ = '$cpf'";

	mysqli_query($db, $sql) or die ("Não foi possivel inserir dados");
	header('location:inicio.php?link=1');
}
?>