<?php
include 'banco.php';
if (!isset($_SESSION)) session_start();
//$nome = $_SESSION['NOME_ADM'];
//$pieces = explode(" ", $nome);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/teste.css">
	<link rel="icon" href="img/logo.png">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<title>Karina Imobiliaria</title>
</head>
<body>
	<div id="principal">
			<div id="cabecalho">
				<div id="titulo_topo">
					<h1> Karina Imobiliaria </h1>
				</div>
			</div>	<!-- fim cabecalho -->
			<br>
	<div id="usuario"> <p><a href="index.php?"><i class="fas fa-times"></i> Encerrar sessão </a> </p>	</div>
	<br>
	<div id="usuario"> <p><a href="inicio.php?link=1"> <i class="fas fa-times"></i> Inicio </a> </p>	</div>
	
			<div id="corpo">	 
				<div id="esquerdo">	
				<p>
				<b>  Bem vindo(a)  </b>	
					</p>
						<div id="sessao"> <h4>Cadastros</h4>	
						<ul>	
							<li><a href="inicio.php?link=2">Proprietario</a>	</li>
							<!-- <li><a href="inicio.php?link=3">Inquilino</a>	</li> -->
							<li><a href="inicio.php?link=8">Contas a Pagar</a>	</li>
							<!-- <li><a href="inicio.php?link=4">Imoveis</a>	</li> -->
						</ul>
						</div>	
						<div id="sessao"> <h4>Consultas</h4>	
						<ul>	
							<li><a href="inicio.php?link=5">Proprietario</a>	</li>
							<li><a href="inicio.php?link=6">Inquilino</a>	</li>
							<li><a href="inicio.php?link=7">Imoveis</a>	</li>
							<li><a href="inicio.php?link=15">Contratos</a>	</li>
							<li><a href="inicio.php?link=14">Contas</a>	</li>
						</ul>
						</div>	
						<div id="sessao"> <h4>Prestação de Contas</h4>	
						<ul>	
							<li><a href="inicio.php?link=9">Receber</a>	</li>
						</ul>
						</div>	
						<div id="sessao"> <h4>Graficos</h4>	
						<ul>	
							<li><a href="inicio.php?link=11">Contratos Feitos</a>	</li>
							<li><a href="inicio.php?link=16">Faturamento</a>	</li>
						</ul>
						</div>	
						
				</div><!-- fim esquerdo-->
				<div id="direito">
					<?php 	
				if (isset($_GET['link'])) {
							$link = $_GET['link'];
							$pag[1]= "home.php";
							$pag[2]= "frm_pro.php";
							$pag[3]= "frm_inq.php";
							$pag[4]= "frm_imv.php";
							$pag[5]= "tab_pro.php";
							$pag[6]= "tab_inq.php";
							$pag[7]= "tab_imv.php";
							$pag[8]= "frm_contas_pagar.php";
							$pag[9]= "frm_pagamentos_receber.php";
							$pag[10]= "frm_contrato.php";
							$pag[11]= "grafico.php";
							$pag[14]= "tab_contas.php";
							$pag[15]= "tb_contratos.php";
							$pag[16]= "grafico_faturamento.php";
							$pag[17]= "pdf.php";
							if (!empty($link)) { 
								if (file_exists($pag[$link])) {
									include $pag[$link];
								}
							}
							}	
					 ?>
				</div><!-- fim direito-->
			</div><!-- fim corpo -->
			<div id="rodape">
			<a href=""><i class="fab fa-facebook"></i></a>
            <a href=""><i class="fab fa-twitter"></i></a>
            <a href=""><i class="fab fa-google"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
            <p class="direitos"> Copyright Misael ©
 <?php echo date("Y");?>. Todos os direitos reservados.</p>
			</div>
	</div> <!-- fim principal -->
</body>
</html>
<?php
?>

