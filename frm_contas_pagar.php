<?php
 date_default_timezone_set('America/Sao_Paulo');
 
error_reporting(E_ERROR | E_PARSE);
 $con = $_GET['con'];
 if ($con == null) {
 }else {
	 $sql = "SELECT * FROM TB_CONTA WHERE ID_CONTA= '$con'";
	 $resultado = mysqli_query($db, $sql);
	 $total = mysqli_num_rows($resultado);
	 $linha = mysqli_fetch_assoc($resultado); 
	 if ($total){
		 do{
			 $motivo = $linha["MOTIVO"];
			 $descricao = $linha["DESCRICAO"];
			 $valor = $linha["VALOR"];
			 $data_vencimento = $linha["DATA_VENCIMENTO"];
			 $pago = $linha["PAGO"];
			 $data_pago = $linha["DATA_PAGO"];
		 }
		 while ($linha = mysqli_fetch_assoc($resultado)); #indo para a próxima linha, verifica a quantidade de linhas para verificar se tem mais valor.
			 mysqli_free_result($resultado); #ele pula para a proxima
	 }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>	
	<script>
						$("#text").css("display","none");
		function verificacampo(){
			if($('#pago').is(":checked")){
				$("#ff").css("display","block");
			}else{
				$("#ff").css("display","none");
			}
		}
	</script>
	<script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
}
</script>
</head>
<body>
<center>
    <form action="conta.php" method="post">
	<fieldset>
	<legend>Contas</legend>
	<?php
	if ($con == null){

	}else { ?>
	<p>
<label>
	<span>Codigo Conta:</span>
	<input size="50" type="text" name="id" value="<?php echo $con;?>">
</label>
</p>
<?php
    }
	?>
<p>
<label>
	<span>Motivo:</span>
	<input size="50" type="text" name="motivo_conta" value="<?php if($con == null){}else{
        echo $motivo;
    }?>">
</label>
</p>
<p>
<label>
	<span>Descrição:</span>
	<br>
<input size="10" type="text" name="descricao_contas" id="" value="<?php if($con == null){}else{
        echo $descricao;
    }?>">
</label>
</p>
<p>
<label>
	<span>Valor:</span>
	<input size="15" type="text" name="valor_contas" maxlength="15"  value="<?php if($con == null){}else{
        echo $valor;
    }?>">
</label>
</p>
<p>
<label>
	<span>Data Vencimento:</span>
	<input size="15" type="date" name="data_contas" maxlength="15"  value="<?php if($con == null){}else{
        echo $data_vencimento;
    }?>"> 
</label>
</p>
<p>
<label>
	<span>Pago: </span>
	<input type="checkbox" name="pago_contas" id="pago" value="" onchange="verificacampo()" <?php if($con == null){}else{
        if ($pago == "0"){}else{ echo 'checked';}
    }?>/>
	<input size="15" type="date" name="data" maxlength="15"  id="ff" value="<?php if($con == null){}else{
        echo $data_pago;
    }?>"> 
</label>
</p>
<?php 
if ($con == null) {
    ?>
<input type="submit" value="Cadastrar" class="botao" name="btn_cadastro">
<?php
}else {
    ?>
<input type="submit" value="Alterar" class="botao" name="btn_alterar">
<?php
}
?>
</fieldset>
    </form>
	</center>
</body>
</html>


















