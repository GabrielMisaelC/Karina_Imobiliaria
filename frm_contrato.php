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
	<span>Endereço Atual:</span>
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
	<option value="Afeganistão">Afeganistão</option>
	<option value="África do Sul">África do Sul</option>
	<option value="Albânia">Albânia</option>
	<option value="Alemanha">Alemanha</option>
	<option value="Andorra">Andorra</option>
	<option value="Angola">Angola</option>
	<option value="Anguilla">Anguilla</option>
	<option value="Antilhas Holandesas">Antilhas Holandesas</option>
	<option value="Antárctida">Antárctida</option>
	<option value="Antígua e Barbuda">Antígua e Barbuda</option>
	<option value="Argentina">Argentina</option>
	<option value="Argélia">Argélia</option>
	<option value="Armênia">Armênia</option>
	<option value="Aruba">Aruba</option>
	<option value="Arábia Saudita">Arábia Saudita</option>
	<option value="Austrália">Austrália</option>
	<option value="Áustria">Áustria</option>
	<option value="Azerbaijão">Azerbaijão</option>
	<option value="Bahamas">Bahamas</option>
	<option value="Bahrein">Bahrein</option>
	<option value="Bangladesh">Bangladesh</option>
	<option value="Barbados">Barbados</option>
	<option value="Belize">Belize</option>
	<option value="Benim">Benim</option>
	<option value="Bermudas">Bermudas</option>
	<option value="Bielorrússia">Bielorrússia</option>
	<option value="Bolívia">Bolívia</option>
	<option value="Botswana">Botswana</option>
	<option value="Brunei">Brunei</option>
	<option value="Bulgária">Bulgária</option>
	<option value="Burkina Faso">Burkina Faso</option>
	<option value="Burundi">Burundi</option>
	<option value="Butão">Butão</option>
	<option value="Bélgica">Bélgica</option>
	<option value="Bósnia e Herzegovina">Bósnia e Herzegovina</option>
	<option value="Cabo Verde">Cabo Verde</option>
	<option value="Camarões">Camarões</option>
	<option value="Camboja">Camboja</option>
	<option value="Canadá">Canadá</option>
	<option value="Catar">Catar</option>
	<option value="Cazaquistão">Cazaquistão</option>
	<option value="Chade">Chade</option>
	<option value="Chile">Chile</option>
	<option value="China">China</option>
	<option value="Chipre">Chipre</option>
	<option value="Colômbia">Colômbia</option>
	<option value="Comores">Comores</option>
	<option value="Coreia do Norte">Coreia do Norte</option>
	<option value="Coreia do Sul">Coreia do Sul</option>
	<option value="Costa do Marfim">Costa do Marfim</option>
	<option value="Costa Rica">Costa Rica</option>
	<option value="Croácia">Croácia</option>
	<option value="Cuba">Cuba</option>
	<option value="Dinamarca">Dinamarca</option>
	<option value="Djibouti">Djibouti</option>
	<option value="Dominica">Dominica</option>
	<option value="Egito">Egito</option>
	<option value="El Salvador">El Salvador</option>
	<option value="Emirados Árabes Unidos">Emirados Árabes Unidos</option>
	<option value="Equador">Equador</option>
	<option value="Eritreia">Eritreia</option>
	<option value="Escócia">Escócia</option>
	<option value="Eslováquia">Eslováquia</option>
	<option value="Eslovênia">Eslovênia</option>
	<option value="Espanha">Espanha</option>
	<option value="Estados Federados da Micronésia">Estados Federados da Micronésia</option>
	<option value="Estados Unidos">Estados Unidos</option>
	<option value="Estônia">Estônia</option>
	<option value="Etiópia">Etiópia</option>
	<option value="Fiji">Fiji</option>
	<option value="Filipinas">Filipinas</option>
	<option value="Finlândia">Finlândia</option>
	<option value="França">França</option>
	<option value="Gabão">Gabão</option>
	<option value="Gana">Gana</option>
	<option value="Geórgia">Geórgia</option>
	<option value="Gibraltar">Gibraltar</option>
	<option value="Granada">Granada</option>
	<option value="Gronelândia">Gronelândia</option>
	<option value="Grécia">Grécia</option>
	<option value="Guadalupe">Guadalupe</option>
	<option value="Guam">Guam</option>
	<option value="Guatemala">Guatemala</option>
	<option value="Guernesei">Guernesei</option>
	<option value="Guiana">Guiana</option>
	<option value="Guiana Francesa">Guiana Francesa</option>
	<option value="Guiné">Guiné</option>
	<option value="Guiné Equatorial">Guiné Equatorial</option>
	<option value="Guiné-Bissau">Guiné-Bissau</option>
	<option value="Gâmbia">Gâmbia</option>
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
	<option value="Ilhas Feroé">Ilhas Feroé</option>
	<option value="Ilhas Geórgia do Sul e Sandwich do Sul">Ilhas Geórgia do Sul e Sandwich do Sul</option>
	<option value="Ilhas Malvinas">Ilhas Malvinas</option>
	<option value="Ilhas Marshall">Ilhas Marshall</option>
	<option value="Ilhas Menores Distantes dos Estados Unidos">Ilhas Menores Distantes dos Estados Unidos</option>
	<option value="Ilhas Salomão">Ilhas Salomão</option>
	<option value="Ilhas Virgens Americanas">Ilhas Virgens Americanas</option>
	<option value="Ilhas Virgens Britânicas">Ilhas Virgens Britânicas</option>
	<option value="Ilhas Åland">Ilhas Åland</option>
	<option value="Indonésia">Indonésia</option>
	<option value="Inglaterra">Inglaterra</option>
	<option value="Índia">Índia</option>
	<option value="Iraque">Iraque</option>
	<option value="Irlanda do Norte">Irlanda do Norte</option>
	<option value="Irlanda">Irlanda</option>
	<option value="Irã">Irã</option>
	<option value="Islândia">Islândia</option>
	<option value="Israel">Israel</option>
	<option value="Itália">Itália</option>
	<option value="Iêmen">Iêmen</option>
	<option value="Jamaica">Jamaica</option>
	<option value="Japão">Japão</option>
	<option value="Jersey">Jersey</option>
	<option value="Jordânia">Jordânia</option>
	<option value="Kiribati">Kiribati</option>
	<option value="Kuwait">Kuwait</option>
	<option value="Laos">Laos</option>
	<option value="Lesoto">Lesoto</option>
	<option value="Letônia">Letônia</option>
	<option value="Libéria">Libéria</option>
	<option value="Liechtenstein">Liechtenstein</option>
	<option value="Lituânia">Lituânia</option>
	<option value="Luxemburgo">Luxemburgo</option>
	<option value="Líbano">Líbano</option>
	<option value="Líbia">Líbia</option>
	<option value="Macau">Macau</option>
	<option value="Macedônia">Macedônia</option>
	<option value="Madagáscar">Madagáscar</option>
	<option value="Malawi">Malawi</option>
	<option value="Maldivas">Maldivas</option>
	<option value="Mali">Mali</option>
	<option value="Malta">Malta</option>
	<option value="Malásia">Malásia</option>
	<option value="Marianas Setentrionais">Marianas Setentrionais</option>
	<option value="Marrocos">Marrocos</option>
	<option value="Martinica">Martinica</option>
	<option value="Mauritânia">Mauritânia</option>
	<option value="Maurícia">Maurícia</option>
	<option value="Mayotte">Mayotte</option>
	<option value="Moldávia">Moldávia</option>
	<option value="Mongólia">Mongólia</option>
	<option value="Montenegro">Montenegro</option>
	<option value="Montserrat">Montserrat</option>
	<option value="Moçambique">Moçambique</option>
	<option value="Myanmar">Myanmar</option>
	<option value="México">México</option>
	<option value="Mônaco">Mônaco</option>
	<option value="Namíbia">Namíbia</option>
	<option value="Nauru">Nauru</option>
	<option value="Nepal">Nepal</option>
	<option value="Nicarágua">Nicarágua</option>
	<option value="Nigéria">Nigéria</option>
	<option value="Niue">Niue</option>
	<option value="Noruega">Noruega</option>
	<option value="Nova Caledônia">Nova Caledônia</option>
	<option value="Nova Zelândia">Nova Zelândia</option>
	<option value="Níger">Níger</option>
	<option value="Omã">Omã</option>
	<option value="Palau">Palau</option>
	<option value="Palestina">Palestina</option>
	<option value="Panamá">Panamá</option>
	<option value="Papua-Nova Guiné">Papua-Nova Guiné</option>
	<option value="Paquistão">Paquistão</option>
	<option value="Paraguai">Paraguai</option>
	<option value="País de Gales">País de Gales</option>
	<option value="Países Baixos">Países Baixos</option>
	<option value="Peru">Peru</option>
	<option value="Pitcairn">Pitcairn</option>
	<option value="Polinésia Francesa">Polinésia Francesa</option>
	<option value="Polônia">Polônia</option>
	<option value="Porto Rico">Porto Rico</option>
	<option value="Portugal">Portugal</option>
	<option value="Quirguistão">Quirguistão</option>
	<option value="Quênia">Quênia</option>
	<option value="Reino Unido">Reino Unido</option>
	<option value="República Centro-Africana">República Centro-Africana</option>
	<option value="República Checa">República Checa</option>
	<option value="República Democrática do Congo">República Democrática do Congo</option>
	<option value="República do Congo">República do Congo</option>
	<option value="República Dominicana">República Dominicana</option>
	<option value="Reunião">Reunião</option>
	<option value="Romênia">Romênia</option>
	<option value="Ruanda">Ruanda</option>
	<option value="Rússia">Rússia</option>
	<option value="Saara Ocidental">Saara Ocidental</option>
	<option value="Saint Martin">Saint Martin</option>
	<option value="Saint-Barthélemy">Saint-Barthélemy</option>
	<option value="Saint-Pierre e Miquelon">Saint-Pierre e Miquelon</option>
	<option value="Samoa Americana">Samoa Americana</option>
	<option value="Samoa">Samoa</option>
	<option value="Santa Helena, Ascensão e Tristão da Cunha">Santa Helena, Ascensão e Tristão da Cunha</option>
	<option value="Santa Lúcia">Santa Lúcia</option>
	<option value="Senegal">Senegal</option>
	<option value="Serra Leoa">Serra Leoa</option>
	<option value="Seychelles">Seychelles</option>
	<option value="Singapura">Singapura</option>
	<option value="Somália">Somália</option>
	<option value="Sri Lanka">Sri Lanka</option>
	<option value="Suazilândia">Suazilândia</option>
	<option value="Sudão">Sudão</option>
	<option value="Suriname">Suriname</option>
	<option value="Suécia">Suécia</option>
	<option value="Suíça">Suíça</option>
	<option value="Svalbard e Jan Mayen">Svalbard e Jan Mayen</option>
	<option value="São Cristóvão e Nevis">São Cristóvão e Nevis</option>
	<option value="São Marino">São Marino</option>
	<option value="São Tomé e Príncipe">São Tomé e Príncipe</option>
	<option value="São Vicente e Granadinas">São Vicente e Granadinas</option>
	<option value="Sérvia">Sérvia</option>
	<option value="Síria">Síria</option>
	<option value="Tadjiquistão">Tadjiquistão</option>
	<option value="Tailândia">Tailândia</option>
	<option value="Taiwan">Taiwan</option>
	<option value="Tanzânia">Tanzânia</option>
	<option value="Terras Austrais e Antárticas Francesas">Terras Austrais e Antárticas Francesas</option>
	<option value="Território Britânico do Oceano Índico">Território Britânico do Oceano Índico</option>
	<option value="Timor-Leste">Timor-Leste</option>
	<option value="Togo">Togo</option>
	<option value="Tonga">Tonga</option>
	<option value="Toquelau">Toquelau</option>
	<option value="Trinidad e Tobago">Trinidad e Tobago</option>
	<option value="Tunísia">Tunísia</option>
	<option value="Turcas e Caicos">Turcas e Caicos</option>
	<option value="Turquemenistão">Turquemenistão</option>
	<option value="Turquia">Turquia</option>
	<option value="Tuvalu">Tuvalu</option>
	<option value="Ucrânia">Ucrânia</option>
	<option value="Uganda">Uganda</option>
	<option value="Uruguai">Uruguai</option>
	<option value="Uzbequistão">Uzbequistão</option>
	<option value="Vanuatu">Vanuatu</option>
	<option value="Vaticano">Vaticano</option>
	<option value="Venezuela">Venezuela</option>
	<option value="Vietname">Vietname</option>
	<option value="Wallis e Futuna">Wallis e Futuna</option>
	<option value="Zimbabwe">Zimbabwe</option>
	<option value="Zâmbia">Zâmbia</option>
</select>
</label>
</p>
<p>
<label>
	<span>Profisão:</span>
	<br>
	<input size="15" type="text" name="profissao_pro" value="<?php if($inq == null){}else{ echo $profissao; }?>">
</label>
</p>
<p>
<label>
	<span>Condição de Pagamento:</span>
	<br>
  <select name="condicao_pag_inq" type=˜text˜>
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
		<span> Valor Locação Mensal: </span>
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
  			<select name="prazo" type=˜text˜>
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
 while ($linha = mysqli_fetch_assoc($resultado)); #indo para a próxima linha, verifica a quantidade de linhas para verificar se tem mais valor.
 	mysqli_free_result($resultado); #ele pula para a proxima
}
?>
</fieldset>
    </form>
	</center>
</body>
</html>