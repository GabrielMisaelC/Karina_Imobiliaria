<?php
session_start();
include 'banco.php';

if (isset($_POST["login"])) {
	$usuario = $_POST['email_login'];
	$senha = $_POST['senha_login'];
	
	$sql = "SELECT * FROM `TB_ADM` 
	WHERE `EMAIL_ADM` = '$usuario' AND `SENHA_ADM`= '$senha'";
	
	$result = mysqli_query($db, $sql);
	
	if(mysqli_num_rows ($result) > 0 )
	{
	$_SESSION['login'] = $login;
	$_SESSION['senha_login'] = $senha;
	
	  
	header('location:inicio.php?link=1'); exit;
	}
	else{
	  unset ($_SESSION['login']);
	  unset ($_SESSION['senha_login']);
	  echo"<script language='javascript' type='text/javascript'>alert('CPF ou Senha incorretos');window.location.href='index.php'</script>";
	
	  }
	 }
	
	?>
?>
 
