<?php
 date_default_timezone_set('America/Sao_Paulo');
 error_reporting(E_ERROR | E_PARSE);
 include 'banco.php';
 $imv = $_GET['imv'];
 $pro = $_GET['pro'];
 $p = $_GET['p'];

 if ($imv == null){
	$sql = "SELECT * FROM TB_PRO WHERE ID_PRO= '$pro'";
	$resultado = mysqli_query($db, $sql);
	$total = mysqli_num_rows($resultado);
	$linha = mysqli_fetch_assoc($resultado); 
 }else if($pro == null){
	$sql = "SELECT * FROM TB_IMV WHERE ID_IMV= '$imv'";
	$resultado = mysqli_query($db, $sql);
	$total = mysqli_num_rows($resultado);
	$linha = mysqli_fetch_assoc($resultado);
	
	$sqll = "SELECT * FROM TB_PRO WHERE ID_PRO= '$p'";
	$resultadoo = mysqli_query($db, $sqll);
	$totall = mysqli_num_rows($resultadoo);
	$linhaa = mysqli_fetch_assoc($resultadoo); 

	
 }
 
 

 function mask($val, $mask)
{
 $maskared = '';
 $k = 0;
 for($i = 0; $i<=strlen($mask)-1; $i++)
 {
 if($mask[$i] == '#')
 {
 if(isset($val[$k]))
 $maskared .= $val[$k++];
 }
 else
 {
 if(isset($mask[$i]))
 $maskared .= $mask[$i];
 }
 }
 return $maskared;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
	<script type='text/javascript' src='http://files.rafaelwendel.com/jquery.js'></script>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="view-source:https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
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
		<script>
						$("#text").css("display","none");
		function verificacampo_ven(){
			if($('#venda_che').is(":checked")){
				$("#venda_in").css("display","block");
			}else{
				$("#venda_in").css("display","none");
			}
		}
		function verificacampo_loc(){
			if($('#loca_che').is(":checked")){
				$("#loca_in").css("display","block");
			}else{
				$("#loca_in").css("display","none");
			}
		}
	</script>
		<script type="text/javascript" >
    		function limpa_formulário_cep() {
            	//Limpa valores do formulário de cep.
            	document.getElementById('rua').value=("");
            	document.getElementById('bairro').value=("");
    		}
    		function meu_callback(conteudo) {
        		if (!("erro" in conteudo)) {
            		//Atualiza os campos com os valores.
            		document.getElementById('rua').value=(conteudo.logradouro);
            		document.getElementById('bairro').value=(conteudo.bairro);
        		} //end if.
        		else {
            		//CEP não Encontrado.
            		limpa_formulário_cep();
            		alert("CEP não encontrado.");
        		}
    		}   
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;
            //Valida o formato do CEP.
            if(validacep.test(cep)) {
                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                //Cria um elemento javascript.
                var script = document.createElement('script');
                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
    </script>
</head>
<body>
	<center>
    <form action="imovel.php" method="post">
	<fieldset>
	<legend>Imovel</legend>
	<?php 
if ($total){
	do{
		$locacao =  $linha["LOCACAO"];
		$venda = $linha["VENDA"];
		$ocupado = $linha["STATUS"];
        if ($pro == null) {
            ?>
	 	<p>
<label>
	<span>Codigo Do Imovel:</span>
	<br>
	<input type="text" id="id_imv" name="id_imv"  value="<?php echo $imv;?>" >
</label>
</p>
<?php
        }
?>
	<p>
<label>
	<span>Proprietario:</span>
	<br>
	<input type="text" id="proprietario" name="proprietario"  value="<?php if($imv == null){ echo $linha["NOME_PRO"];}else if($pro == null){echo $linhaa["NOME_PRO"];} ?>" >
</label>
</p>
<p>
<label>
	<span>CPF:</span>
	<br>
	<input type="text" id="cpf" name="cpf"  value="<?php if($imv == null){ echo $linha["CPF_PRO"];}else if($pro == null){echo $linhaa["CPF_PRO"];} ?>" >
</label>
</p>
	<p>
<label>
	<span>Cep:</span>
	<br>
	<input type="text" id="cep" name="cep"  value="<?php if($imv == null){}else if($pro == null){echo $linha["CEP"];}  ?>" data-inputmask="'mask': '99999-999'" onblur="pesquisacep(this.value);">
</label>
</p>
<p>
<label>
	<span>Logradouro:</span>
	<input type="text"  name="rua" id="rua" value="<?php if($imv == null){}else if($pro == null){echo $linha["LOGRADOURO"];} ?>"  >
</label>
</p>
<p>
<label>
	<span>Bairro:</span>
	<input type="text"  name="bairro" id="bairro" value="<?php if($imv == null){}else if($pro == null){echo $linha["BAIRRO_PRO"];} ?>" >
</label>
</p>
<p>
<label>
	<span>Numero:</span>
	<br>
	<input size="25" type="text" name="numero_imv" id="" value="<?php if($imv == null){}else if($pro == null){echo $linha["NUMERO"];}?>">
</label>
</p>
<p>
	<label>
	<span>Locação:</span>
	<input type="checkbox" name="locacao" id="loca_che" onchange="verificacampo_loc()" <?php if($imv == null){ echo 'checked';}else{ if($pro == null){ if($locacao == "0"){}else{echo 'checked';}} }?>/>
	<input size="15" type="text" name="valor_locacao_imv" id="loca_in" maxlength="15"  value="<?php if($imv == null){}else if($pro == null){echo $linha["VALOR_LOCACAO"];} ?>">
	</label>
	<br>
	<p></p>
	<label>
	<span>Venda:</span>
	<input type="checkbox" name="venda" id="venda_che" onchange="verificacampo_ven()"  <?php if($imv == null){ echo 'checked';}else{ if($pro == null){ if($venda == "0"){}else{echo 'checked';}} }?>/>
	<input size="15" type="text" name="valor_venda_imv" id="venda_in" maxlength="15" value="<?php if($imv == null){}else if($pro == null){echo $linha["VALOR_VENDA"];} ?>">
	<br>
	</label>
	<br>
</p>
<p>
<label>
	<span>Imovel Ocupado:</span>
	<input type="checkbox" name="status_imv"   <?php if($imv == null){ echo 'checked';}else{ if($pro == null){ if($ocupado == "on"){echo 'checked';}else{}} }?>/>
	</label>
</p>
<?php
if ($imv == null){
?>
<input type="submit" value="Cadastrar" class="botao" name="btn_cadastro">
<?php
}
else{
?>
<input type="submit" value="Alterar" class="botao" name="btn_alterar">
<?php
}
?>
	<?php
}
 while ($linha = mysqli_fetch_assoc($resultado)); #indo para a próxima linha, verifica a quantidade de linhas para verificar se tem mais valor.
 	mysqli_free_result($resultado); #ele pula para a proxima
 }
 ?>
</fieldset>
    </form>
	</center>
</body>
</html>