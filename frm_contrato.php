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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>	
		<script>
						$("#text").css("display","none");
			function verificacampo(){
				if($('#estrangeiro').is(":checked")){
					$("#rne_pro").css("display","block");
				}else{
				$("#rne_pro").css("display","none");
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
    		function limpa_formul??rio_cep() {
            	//Limpa valores do formul??rio de cep.
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
            		//CEP n??o Encontrado.
            		limpa_formul??rio_cep();
            		alert("CEP n??o encontrado.");
        		}
    		}   
    function pesquisacep(valor) {

        //Nova vari??vel "cep" somente com d??gitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Express??o regular para validar o CEP.
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
                //Insere script no documento e carrega o conte??do.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep ?? inv??lido.
                limpa_formul??rio_cep();
                alert("Formato de CEP inv??lido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formul??rio.
            limpa_formul??rio_cep();
        }
    };
    </script>
</head>
<body>
	<center>
    <form action="contrato.php" method="post">
	<fieldset>
	<legend>Contrato</legend>
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
	<span>Codigo Proprietario:</span>
	<br>
	<input type="text" id="cod_pro" name="cod_Pro"  value="<?php if($imv == null){ echo $linha["ID_PRO"];}else if($pro == null){echo $linhaa["ID_PRO"];} ?>" >
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

<fieldset>
	<legend>Inquilino</legend>
	<p>
<label>
	<span>Nome:</span>
	<br>
<input size="50" type="text" name="nome_pro" id="" value="<?php if($inq == null){}else{ echo $nome; }?>">
</label>
</p>
<p>
<label>
	<span>Celular:</span>
	<br>
	<input size="15" type="text" name="celular_pro"  OnKeyPress="formatar('##-#####-####', this)" value="<?php if($inq == null){}else{ echo $celular; } ?>">
</label>
</p>
<p>
<label>
	<span>CPF:</span>
	<br>
<input size="25" type="text"  maxlength="14" name="cpf_pro" id="" value="<?php if($inq == null){}else{ echo $cpf; } ?>" OnKeyPress="formatar('###-###-###-##', this)">
</label>
</p>
<p>
<label>
	<span>Data de Nacimento:</span>
	<br>
<input  type="date" name="data_nascimento_pro" id="" value="<?php if($inq == null){}else{ echo $data_nascimento; }?>">
</label>
</p>
<p>
<label>
	<span>Rg:</span>
	<br>
	<input size="25" type="text" name="rg_pro" id="" value="<?php if($inq == null){}else{ echo $rg; }?>" OnKeyPress="formatar('##-###-###-#', this)">
</label>
</p>
<p>
<label>
	<span>Endere??o Atual:</span>
	<br>
	<input size="55" type="text" name="endereco_atual_pro" maxlength="90"  value="<?php if($inq == null){}else{ echo $endereco_atual; }?>">
</label>
</p>
<p>
<fieldset>
	<legend>Estado Civil:</legend>
	<label>
	<span>Casado:</span>
	<input type="checkbox" name="casado"  <?php if($inq == null){}else{ if($status_civil == "Casado"){ echo 'checked';} }?>/>
	</label>
	<br>
	<p></p>
	<label>
	<span>Solteiro:</span>
	<input type="checkbox" name="solteiro"  <?php if($inq == null){}else{ if($status_civil == "Solteiro"){ echo 'checked';} }?>/>
	</label>
	<br>
	<p></p>
	<label>
	<span>Divorciado:</span>
	<input type="checkbox" name="Divorciado"  <?php if($inq == null){}else{ if($status_civil == "Divorciado"){ echo 'checked';} }?>/>
	</label>
	<br>
	<p></p>
	<label>
	<span>Viuvo:</span>
	<input type="checkbox" name="viuvo"  <?php if($inq == null){}else{ if($status_civil == "Viuvo"){ echo 'checked';} }?>/>
	</label>
</fieldset>
</p>
<p>
<label>
	<span>RNE:</span>
	<input type="checkbox" name="estrangeiro" id="estrangeiro" value="" onchange="verificacampo()"   <?php if($inq == null){echo 'checked';}else{ if($rne == null){}else{ echo 'checked';} }?>/>
	<input size="15" type="text" name="rne_pro" id="rne_pro" value="<?php if($inq == null){}else{ echo $rne; }?>" >
</label>
</p>
<p>
<label>
	<span>Nacionalidade:</span>
	<!-- <input size="15" type="text" name="nacionalidade_pro" value="<?php echo $mat1["NACIONALIDADE_INQ"];?>"> -->
	<br>
	<select name="paises" id="paises">
	<option value="Brasil" selected="selected">Brasil</option>
	<option value="Afeganist??o">Afeganist??o</option>
	<option value="??frica do Sul">??frica do Sul</option>
	<option value="Alb??nia">Alb??nia</option>
	<option value="Alemanha">Alemanha</option>
	<option value="Andorra">Andorra</option>
	<option value="Angola">Angola</option>
	<option value="Anguilla">Anguilla</option>
	<option value="Antilhas Holandesas">Antilhas Holandesas</option>
	<option value="Ant??rctida">Ant??rctida</option>
	<option value="Ant??gua e Barbuda">Ant??gua e Barbuda</option>
	<option value="Argentina">Argentina</option>
	<option value="Arg??lia">Arg??lia</option>
	<option value="Arm??nia">Arm??nia</option>
	<option value="Aruba">Aruba</option>
	<option value="Ar??bia Saudita">Ar??bia Saudita</option>
	<option value="Austr??lia">Austr??lia</option>
	<option value="??ustria">??ustria</option>
	<option value="Azerbaij??o">Azerbaij??o</option>
	<option value="Bahamas">Bahamas</option>
	<option value="Bahrein">Bahrein</option>
	<option value="Bangladesh">Bangladesh</option>
	<option value="Barbados">Barbados</option>
	<option value="Belize">Belize</option>
	<option value="Benim">Benim</option>
	<option value="Bermudas">Bermudas</option>
	<option value="Bielorr??ssia">Bielorr??ssia</option>
	<option value="Bol??via">Bol??via</option>
	<option value="Botswana">Botswana</option>
	<option value="Brunei">Brunei</option>
	<option value="Bulg??ria">Bulg??ria</option>
	<option value="Burkina Faso">Burkina Faso</option>
	<option value="Burundi">Burundi</option>
	<option value="But??o">But??o</option>
	<option value="B??lgica">B??lgica</option>
	<option value="B??snia e Herzegovina">B??snia e Herzegovina</option>
	<option value="Cabo Verde">Cabo Verde</option>
	<option value="Camar??es">Camar??es</option>
	<option value="Camboja">Camboja</option>
	<option value="Canad??">Canad??</option>
	<option value="Catar">Catar</option>
	<option value="Cazaquist??o">Cazaquist??o</option>
	<option value="Chade">Chade</option>
	<option value="Chile">Chile</option>
	<option value="China">China</option>
	<option value="Chipre">Chipre</option>
	<option value="Col??mbia">Col??mbia</option>
	<option value="Comores">Comores</option>
	<option value="Coreia do Norte">Coreia do Norte</option>
	<option value="Coreia do Sul">Coreia do Sul</option>
	<option value="Costa do Marfim">Costa do Marfim</option>
	<option value="Costa Rica">Costa Rica</option>
	<option value="Cro??cia">Cro??cia</option>
	<option value="Cuba">Cuba</option>
	<option value="Dinamarca">Dinamarca</option>
	<option value="Djibouti">Djibouti</option>
	<option value="Dominica">Dominica</option>
	<option value="Egito">Egito</option>
	<option value="El Salvador">El Salvador</option>
	<option value="Emirados ??rabes Unidos">Emirados ??rabes Unidos</option>
	<option value="Equador">Equador</option>
	<option value="Eritreia">Eritreia</option>
	<option value="Esc??cia">Esc??cia</option>
	<option value="Eslov??quia">Eslov??quia</option>
	<option value="Eslov??nia">Eslov??nia</option>
	<option value="Espanha">Espanha</option>
	<option value="Estados Federados da Micron??sia">Estados Federados da Micron??sia</option>
	<option value="Estados Unidos">Estados Unidos</option>
	<option value="Est??nia">Est??nia</option>
	<option value="Eti??pia">Eti??pia</option>
	<option value="Fiji">Fiji</option>
	<option value="Filipinas">Filipinas</option>
	<option value="Finl??ndia">Finl??ndia</option>
	<option value="Fran??a">Fran??a</option>
	<option value="Gab??o">Gab??o</option>
	<option value="Gana">Gana</option>
	<option value="Ge??rgia">Ge??rgia</option>
	<option value="Gibraltar">Gibraltar</option>
	<option value="Granada">Granada</option>
	<option value="Gronel??ndia">Gronel??ndia</option>
	<option value="Gr??cia">Gr??cia</option>
	<option value="Guadalupe">Guadalupe</option>
	<option value="Guam">Guam</option>
	<option value="Guatemala">Guatemala</option>
	<option value="Guernesei">Guernesei</option>
	<option value="Guiana">Guiana</option>
	<option value="Guiana Francesa">Guiana Francesa</option>
	<option value="Guin??">Guin??</option>
	<option value="Guin?? Equatorial">Guin?? Equatorial</option>
	<option value="Guin??-Bissau">Guin??-Bissau</option>
	<option value="G??mbia">G??mbia</option>
	<option value="Haiti">Haiti</option>
	<option value="Honduras">Honduras</option>
	<option value="Hong Kong">Hong Kong</option>
	<option value="Hungria">Hungria</option>
	<option value="Ilha Bouvet">Ilha Bouvet</option>
	<option value="Ilha de Man">Ilha de Man</option>
	<option value="Ilha do Natal">Ilha do Natal</option>
	<option value="Ilha Heard e Ilhas McDonald">Ilha Heard e Ilhas McDonald</option>
	<option value="Ilha Norfolk">Ilha Norfolk</option>
	<option value="Ilhas Cayman">Ilhas Cayman</option>
	<option value="Ilhas Cocos (Keeling)">Ilhas Cocos (Keeling)</option>
	<option value="Ilhas Cook">Ilhas Cook</option>
	<option value="Ilhas Fero??">Ilhas Fero??</option>
	<option value="Ilhas Ge??rgia do Sul e Sandwich do Sul">Ilhas Ge??rgia do Sul e Sandwich do Sul</option>
	<option value="Ilhas Malvinas">Ilhas Malvinas</option>
	<option value="Ilhas Marshall">Ilhas Marshall</option>
	<option value="Ilhas Menores Distantes dos Estados Unidos">Ilhas Menores Distantes dos Estados Unidos</option>
	<option value="Ilhas Salom??o">Ilhas Salom??o</option>
	<option value="Ilhas Virgens Americanas">Ilhas Virgens Americanas</option>
	<option value="Ilhas Virgens Brit??nicas">Ilhas Virgens Brit??nicas</option>
	<option value="Ilhas ??land">Ilhas ??land</option>
	<option value="Indon??sia">Indon??sia</option>
	<option value="Inglaterra">Inglaterra</option>
	<option value="??ndia">??ndia</option>
	<option value="Iraque">Iraque</option>
	<option value="Irlanda do Norte">Irlanda do Norte</option>
	<option value="Irlanda">Irlanda</option>
	<option value="Ir??">Ir??</option>
	<option value="Isl??ndia">Isl??ndia</option>
	<option value="Israel">Israel</option>
	<option value="It??lia">It??lia</option>
	<option value="I??men">I??men</option>
	<option value="Jamaica">Jamaica</option>
	<option value="Jap??o">Jap??o</option>
	<option value="Jersey">Jersey</option>
	<option value="Jord??nia">Jord??nia</option>
	<option value="Kiribati">Kiribati</option>
	<option value="Kuwait">Kuwait</option>
	<option value="Laos">Laos</option>
	<option value="Lesoto">Lesoto</option>
	<option value="Let??nia">Let??nia</option>
	<option value="Lib??ria">Lib??ria</option>
	<option value="Liechtenstein">Liechtenstein</option>
	<option value="Litu??nia">Litu??nia</option>
	<option value="Luxemburgo">Luxemburgo</option>
	<option value="L??bano">L??bano</option>
	<option value="L??bia">L??bia</option>
	<option value="Macau">Macau</option>
	<option value="Maced??nia">Maced??nia</option>
	<option value="Madag??scar">Madag??scar</option>
	<option value="Malawi">Malawi</option>
	<option value="Maldivas">Maldivas</option>
	<option value="Mali">Mali</option>
	<option value="Malta">Malta</option>
	<option value="Mal??sia">Mal??sia</option>
	<option value="Marianas Setentrionais">Marianas Setentrionais</option>
	<option value="Marrocos">Marrocos</option>
	<option value="Martinica">Martinica</option>
	<option value="Maurit??nia">Maurit??nia</option>
	<option value="Maur??cia">Maur??cia</option>
	<option value="Mayotte">Mayotte</option>
	<option value="Mold??via">Mold??via</option>
	<option value="Mong??lia">Mong??lia</option>
	<option value="Montenegro">Montenegro</option>
	<option value="Montserrat">Montserrat</option>
	<option value="Mo??ambique">Mo??ambique</option>
	<option value="Myanmar">Myanmar</option>
	<option value="M??xico">M??xico</option>
	<option value="M??naco">M??naco</option>
	<option value="Nam??bia">Nam??bia</option>
	<option value="Nauru">Nauru</option>
	<option value="Nepal">Nepal</option>
	<option value="Nicar??gua">Nicar??gua</option>
	<option value="Nig??ria">Nig??ria</option>
	<option value="Niue">Niue</option>
	<option value="Noruega">Noruega</option>
	<option value="Nova Caled??nia">Nova Caled??nia</option>
	<option value="Nova Zel??ndia">Nova Zel??ndia</option>
	<option value="N??ger">N??ger</option>
	<option value="Om??">Om??</option>
	<option value="Palau">Palau</option>
	<option value="Palestina">Palestina</option>
	<option value="Panam??">Panam??</option>
	<option value="Papua-Nova Guin??">Papua-Nova Guin??</option>
	<option value="Paquist??o">Paquist??o</option>
	<option value="Paraguai">Paraguai</option>
	<option value="Pa??s de Gales">Pa??s de Gales</option>
	<option value="Pa??ses Baixos">Pa??ses Baixos</option>
	<option value="Peru">Peru</option>
	<option value="Pitcairn">Pitcairn</option>
	<option value="Polin??sia Francesa">Polin??sia Francesa</option>
	<option value="Pol??nia">Pol??nia</option>
	<option value="Porto Rico">Porto Rico</option>
	<option value="Portugal">Portugal</option>
	<option value="Quirguist??o">Quirguist??o</option>
	<option value="Qu??nia">Qu??nia</option>
	<option value="Reino Unido">Reino Unido</option>
	<option value="Rep??blica Centro-Africana">Rep??blica Centro-Africana</option>
	<option value="Rep??blica Checa">Rep??blica Checa</option>
	<option value="Rep??blica Democr??tica do Congo">Rep??blica Democr??tica do Congo</option>
	<option value="Rep??blica do Congo">Rep??blica do Congo</option>
	<option value="Rep??blica Dominicana">Rep??blica Dominicana</option>
	<option value="Reuni??o">Reuni??o</option>
	<option value="Rom??nia">Rom??nia</option>
	<option value="Ruanda">Ruanda</option>
	<option value="R??ssia">R??ssia</option>
	<option value="Saara Ocidental">Saara Ocidental</option>
	<option value="Saint Martin">Saint Martin</option>
	<option value="Saint-Barth??lemy">Saint-Barth??lemy</option>
	<option value="Saint-Pierre e Miquelon">Saint-Pierre e Miquelon</option>
	<option value="Samoa Americana">Samoa Americana</option>
	<option value="Samoa">Samoa</option>
	<option value="Santa Helena, Ascens??o e Trist??o da Cunha">Santa Helena, Ascens??o e Trist??o da Cunha</option>
	<option value="Santa L??cia">Santa L??cia</option>
	<option value="Senegal">Senegal</option>
	<option value="Serra Leoa">Serra Leoa</option>
	<option value="Seychelles">Seychelles</option>
	<option value="Singapura">Singapura</option>
	<option value="Som??lia">Som??lia</option>
	<option value="Sri Lanka">Sri Lanka</option>
	<option value="Suazil??ndia">Suazil??ndia</option>
	<option value="Sud??o">Sud??o</option>
	<option value="Suriname">Suriname</option>
	<option value="Su??cia">Su??cia</option>
	<option value="Su????a">Su????a</option>
	<option value="Svalbard e Jan Mayen">Svalbard e Jan Mayen</option>
	<option value="S??o Crist??v??o e Nevis">S??o Crist??v??o e Nevis</option>
	<option value="S??o Marino">S??o Marino</option>
	<option value="S??o Tom?? e Pr??ncipe">S??o Tom?? e Pr??ncipe</option>
	<option value="S??o Vicente e Granadinas">S??o Vicente e Granadinas</option>
	<option value="S??rvia">S??rvia</option>
	<option value="S??ria">S??ria</option>
	<option value="Tadjiquist??o">Tadjiquist??o</option>
	<option value="Tail??ndia">Tail??ndia</option>
	<option value="Taiwan">Taiwan</option>
	<option value="Tanz??nia">Tanz??nia</option>
	<option value="Terras Austrais e Ant??rticas Francesas">Terras Austrais e Ant??rticas Francesas</option>
	<option value="Territ??rio Brit??nico do Oceano ??ndico">Territ??rio Brit??nico do Oceano ??ndico</option>
	<option value="Timor-Leste">Timor-Leste</option>
	<option value="Togo">Togo</option>
	<option value="Tonga">Tonga</option>
	<option value="Toquelau">Toquelau</option>
	<option value="Trinidad e Tobago">Trinidad e Tobago</option>
	<option value="Tun??sia">Tun??sia</option>
	<option value="Turcas e Caicos">Turcas e Caicos</option>
	<option value="Turquemenist??o">Turquemenist??o</option>
	<option value="Turquia">Turquia</option>
	<option value="Tuvalu">Tuvalu</option>
	<option value="Ucr??nia">Ucr??nia</option>
	<option value="Uganda">Uganda</option>
	<option value="Uruguai">Uruguai</option>
	<option value="Uzbequist??o">Uzbequist??o</option>
	<option value="Vanuatu">Vanuatu</option>
	<option value="Vaticano">Vaticano</option>
	<option value="Venezuela">Venezuela</option>
	<option value="Vietname">Vietname</option>
	<option value="Wallis e Futuna">Wallis e Futuna</option>
	<option value="Zimbabwe">Zimbabwe</option>
	<option value="Z??mbia">Z??mbia</option>
</select>
</label>
</p>
<p>
<label>
	<span>Profis??o:</span>
	<br>
	<input size="15" type="text" name="profissao_pro" value="<?php if($inq == null){}else{ echo $profissao; }?>">
</label>
</p>
<p>
<label>
	<span>Condi????o de Pagamento:</span>
	<br>
  <select name="condicao_pag_inq" type=??text??>
  <option value="Forma_de_pagamento">Forma de Pagamento</option>
  <option value="Pix">Pix</option>
  <option value="Ted_Doc" selected>Ted/Doc</option>
  <option value="Boleto">Boleto</option>
</select>
</label>
</p>
</fieldset>
<p>
	<Label>
		<span> Valor Loca????o Mensal: </span>
		<br>
		<span> R$ <?php echo $linha["VALOR_LOCACAO"];?></span>
	</Label>
</p>
<p>
	<Label>
		<span> Data Inicio: </span>
		<input type="date" name="data_inicio" >
	</Label>
</p>
<p>
	<label>
		<span> Prazo Contrato: </span>
		<br>
  			<select name="prazo" type=??text??>
  			<option value="1" selected>1 ano</option>
  			<option value="2">2 anos</option>
  			<option value="3">3 anos</option>
  			<option value="4">4 anos</option>
</select>
	</label>
</p>
<p>
<input type="submit" value="Cadastrar" class="botao" name="btn_cadastro">
<?php
}
 while ($linha = mysqli_fetch_assoc($resultado)); #indo para a pr??xima linha, verifica a quantidade de linhas para verificar se tem mais valor.
 	mysqli_free_result($resultado); #ele pula para a proxima
}
?>
</fieldset>
    </form>
	</center>
</body>
</html>