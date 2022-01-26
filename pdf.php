<?php
   //Inclui a classe 'class.ezpdf.php'
   include("pdf-php-master/src/Cezpdf.php");
   include("banco.php");
   date_default_timezone_set('America/Sao_Paulo');
 
   require_once('config.php');
   $pro = $_GET['pro'];
   $imv = $_GET['imv'];
   $inq = $_GET['inq'];

   // Traz Dados IMOVEL
   $sql = "SELECT * FROM TB_IMV WHERE ID_IMV = $imv";
   $resultado = mysqli_query($db, $sql);
   $total = mysqli_num_rows($resultado);
   $linha = mysqli_fetch_assoc($resultado); 

   if ($total){
      do{
         $cep = $linha["CEP"];
         $logradouro = $linha["LOGRADOURO"];
         $bairro = $linha["BAIRRO_PRO"];
         $numero = $linha["NUMERO"];
         $valor = $linha["VALOR_LOCACAO"];
   }
       while ($linha = mysqli_fetch_assoc($resultado)); #indo para a próxima linha, verifica a quantidade de linhas para verificar se tem mais valor.
          mysqli_free_result($resultado); #ele pula para a proxima
   }

   // Traz Dados inquilino
   $sql = "SELECT * FROM TB_INQ WHERE ID_INQ = $inq";
   $resultado = mysqli_query($db, $sql);
   $total = mysqli_num_rows($resultado);
   $linha = mysqli_fetch_assoc($resultado); 

   if ($total){
      do{
         $nome_inq = $linha["NOME_INQ"];
         $cpf_inq = $linha["CPF_INQ"];
         $rg_inq = $linha["RG_INQ"];
         $rne_inq = $linha["RNE_INQ"];
         $data_nasc_inq = $linha["DATA_NASCIMENTO_INQ"];
         $profissao_inq = $linha["PROFISSAO_INQ"];
         $estado_civil_inq = $linha["ESTADO_CIVIL_INQ"];
         $nacionalidade_inq = $linha["NACIONALIDADE_INQ"];
         
   }
       while ($linha = mysqli_fetch_assoc($resultado)); #indo para a próxima linha, verifica a quantidade de linhas para verificar se tem mais valor.
          mysqli_free_result($resultado); #ele pula para a proxima
   }

   // Traz Dados Proprietario 
   $sql = "SELECT * FROM TB_PRO WHERE ID_PRO = $pro";
   $resultado = mysqli_query($db, $sql);
   $total = mysqli_num_rows($resultado);
   $linha = mysqli_fetch_assoc($resultado); 

   if ($total){
      do{
         $nome_pro = $linha["NOME_PRO"];
         $cpf_pro = $linha["CPF_PRO"];
         $rg_pro = $linha["RG_PRO"];
         $data_nasc_pro = $linha["DATA_NASCIMENTO_PRO"];
         $endereco_pro = $linha["ENDERECO_ATUAL_PRO"];
         $nacionalidade = $linha["NACIONALIDADE_PRO"];
         $profissao = $linha["PROFISSAO_PRO"];
         $status_ = $linha["ESTADO_CIVIL_PRO"];
   }
       while ($linha = mysqli_fetch_assoc($resultado)); #indo para a próxima linha, verifica a quantidade de linhas para verificar se tem mais valor.
          mysqli_free_result($resultado); #ele pula para a proxima
   }


   //Instancia um novo documento com o nome de pdf
   $pdf = new Cezpdf();

   //Seleciona a fonte que será usada. As fontes estão localizadas na pasta "pdf-php/fonts".
  // Use a de sua preferencia.
   $pdf -> selectFont('pdf-php/fonts/Helvetica.afm');

   //Chama o método "ezText".
   //No 1° parametro passa o texto do documento
   //No 2° parametro define o tamanho da fonte.
   //No 3° parametro é do tipo array. A seguir uma explicação desse 3° parametro:

   // justification => seta a posição de um label, pode ser center, right, left, aright, ou aleft
   // leading = > define o tamanho que cada linha usará para se mostrada, deverá  ser um int
   // spacing => define o espaçamento entrelinhas, deverá ser um float
   // você pode usar apenas leading ou apenas spacing, nunca os dois



   $pdf -> ezText('Pelo presente Contrato de Locação, como LOCADOR o Sr(a). '.$nome_pro.', '.$nacionalidade.', '.$status_.', '.$profissao.', portador da cédula de identidade com RG nº '.$rg_pro.', e devidamente inscrito no CPF/MF sob nº '.$cpf_pro.', residente e domiciliado nesta capital São Paulo.', 8, array(justification => 'center', spacing => 1.0));

   $pdf -> ezText('Como LOCATÁRIA: a Sr(a). '.$nome_inq.', '.$nacionalidade_inq.', '.$estado_civil_inq.', portadora da cédula de identidade RG sob n° '.$rg_inq.', e devidamente inscrita no CPF/MF sob n. '.$cpf_inq.', residente e domiciliada Nesta Capital São Paulo', 8,
   array(justification => 'center', spacing => 1.0));

   $pdf -> ezText('Contrata e outorga, o que segue:  ', 12,
   array(justification => 'center', spacing => 3.0));

   $pdf -> ezText('O primeiro contratante, denominado simplesmente LOCADOR, sendo proprietário do imóvel situado na '.$logradouro.' n. '.$numero.' – '.$bairro.' - NO CEP '.$cep.', loca-o a segunda contratantes aqui denominada simplesmente LOCATÁRIA. ', 8,
   array(justification => 'center', spacing => 1.0));
   
   //Gera o PDF
   $pdf -> ezStream();
?>