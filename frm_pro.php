<?php
 date_default_timezone_set('America/Sao_Paulo');
 error_reporting(E_ERROR | E_PARSE);

// require_once('config.php');
$pro = $_GET['pro'];
if ($pro == null) {
	
}else {
	$sql = "SELECT * FROM TB_PRO WHERE ID_PRO= '$pro'";
	$resultado = mysqli_query($db, $sql);
	$total = mysqli_num_rows($resultado);
	$linha = mysqli_fetch_assoc($resultado); 

	
	if ($total){
		do{
			$nome = $linha["NOME_PRO"];
			$celular = $linha["CELULAR_PRO"];
			$cpf = $linha["CPF_PRO"];
			$data_nascimento = $linha["DATA_NASCIMENTO_PRO"];
			$rg = $linha["RG_PRO"];
			$endereco_atual = $linha["ENDERECO_ATUAL_PRO"];
			$status_civil = $linha["ESTADO_CIVIL_PRO"];
			$rne = $linha["RNE_PRO"];
			$profissao = $linha["PROFISSAO_PRO"];
			$banco = $linha["BANCO_PRO"];
			$agencia = $linha["AGENCIA_PRO"];
			$conta = $linha["CONTA_PRO"];
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
</head>
<body>
	<center>
    <form action="proprietario.php" method="post">
	<fieldset>
	<legend>Ficha De Proprietario</legend>
	<p>
<label>
	<span>Nome:</span>
	<br>
<input size="50" type="text" name="nome_pro" id="" value="<?php if($pro == null){}else{ echo $nome; }?>">
</label>
</p>
<p>
<label>
	<span>Celular:</span>
	<br>
	<input size="15" type="text" name="celular_pro"value="<?php if($pro == null){}else{ echo $celular; }?>" OnKeyPress="formatar('##-#####-####', this)">
</label>
</p>
<p>
<label>
	<span>CPF:</span>
	<br>
<input size="25" type="text"  maxlength="14" name="cpf_pro" id="" value="<?php if($pro == null){}else{ echo $cpf; }?>" OnKeyPress="formatar('###-###-###-##', this)">
</label>
</p>
<p>
<label>
	<span>Data de Nacimento:</span>
	<br>
<input  type="date" name="data_nascimento_pro" id="" value="<?php if($pro == null){}else{ echo $data_nascimento; }?>">
</label>
</p>
<p>
<label >
	<span>Rg:</span>
	<br>
	<input size="50" type="text" name="rg_pro" id="" value="<?php if($pro == null){}else{ echo $rg; } ?>" OnKeyPress="formatar('##-###-###-#', this)">
</label>
</p>
<p>
<label>
	<span>Endereço Atual:</span>
	<br>
	<input size="90" type="text" name="endereco_atual_pro" maxlength="90" value="<?php if($pro == null){}else{ echo $endereco_atual; }?>">
</label>
</p>
<p>
<fieldset>
	<legend>Estado Civil:</legend>
	<label>
	<span>Casado:</span>
	<input type="checkbox" name="casado" <?php if($pro == null){}else{ if($status_civil == "Casado"){ echo 'checked';} }?>/>
	</label>
	<br>
	<p></p>
	<label>
	<span>Solteiro:</span>
	<input type="checkbox" name="solteiro"  <?php if($pro == null){}else{ if($status_civil == "Solteiro"){ echo 'checked';} }?>/>
	</label>
	<br>
	<p></p>
	<label>
	<span>Divorciado:</span>
	<input type="checkbox" name="Divorciado"  <?php if($pro == null){}else{ if($status_civil == "Divorciado"){ echo 'checked';} }?>/>
	</label>
	<br>
	<p></p>
	<label>
	<span>Viuvo:</span>
	<input type="checkbox" name="viuvo"  <?php if($pro == null){}else{ if($status_civil == "Viuvo"){ echo 'checked';} }?>/>
	<br>
	</label>
	<br>
</fieldset>
</p>
<p>
<label>
	<span>Nacionalidade:</span>
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
	<span>RNE:</span>
	<input type="checkbox" name="estrangeiro" id="estrangeiro" value="" onchange="verificacampo()"   <?php if($pro == null){ echo 'checked';}else{ if($rne == null){}else{ echo 'checked';} }?>/>
	<input size="15" type="text" name="rne_pro" id="rne_pro" value="<?php if($pro == null){}else{ echo $rne; }?>" >
</label>
</p>
<p>
<label>
	<span>Profisão:</span>
	<br>
	<input size="15" type="text" name="profissao_pro" value="<?php if($pro == null){}else{ echo $profissao; }?>">
</label>
</p>
<fieldset>
	<legend>Dados Bancarios:</legend>
<p>
<label>
	<span>Banco:</span>
	<br>
	<input size="15" type="text" name="banco_pro" value="<?php if($pro == null){}else{ echo $banco; }?>" >
</label>
</p>
<p>
<label>
	<span>Agencia:</span>
	<br>
	<input size="15" type="text" name="agencia_pro" value="<?php if($pro == null){}else{ echo $agencia; }?>" >
</label>
</p>
<p>
<label>
	<span>Conta:</span>
	<br>
	<input size="15" type="text" name="conta_pro" value="<?php if($pro == null){}else{ echo $conta; }?>" >
</label>
</p>
</fieldset>
<?php
if($pro == null){
	?>
	<input type="submit" value="Cadastrar" class="botao" name="btn_cadastro">
	<?php
}else{ 
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