<?php 
class Proprietario
{
	private $id;
	private $nome;
    private $cpf;
    private $data_nascimento;
    private $rg;
    private $endereco_atual;
    private $estado_civil;
    private $nacionalidade;
    private $profissao;
    private $rne;
    private $agencia;
    private $conta;
    private $banco;
    private $celular;
    

	public function getId()
	{
		return $this->id;
	} 
	public function setId($value)
	{
		$this->id = $value;
	}
	public function getNome()
	{
		return $this->nome;
	} 
	public function setNome($value)
	{
		$this->nome = $value;
	}
    public function getCpf()
    {
        return $this->cpf;
    }
    public function setCpf($value)
    {
    $this->cpf = $value;
    }
    public function getData_nascimento()
    {
        return $this->data_nascimento;
    }
    public function setData_nascimento($value)
    {
        $this->data_nascimento = $value;
    }
    public function getRg()
    {
        return $this->rg;
    }
    public function setRg($value)
    {
        $this->rg = $value;
    }
    public function getEndereco_atual()
    {
        return $this->endereco_atual;
    }
    public function setEndereco_atual($value)
    {
        $this->endereco_atual = $value;
    }
    public function getEstado_civil()
    {
        return $this->estado_civil;
    }
    public function setEstado_civil($value)
    {
        $this->estado_civil = $value;
    }
    public function getNacionalidade()
    {
        return $this->nacionalidade;
    }
    public function setNacionalidade($value)
    {
        $this->nacionalidade = $value;
    }
    public function getProfissao()
    {
        return $this->profissao;
    }
    public function setProfissao($value)
    {
        $this->profissao =$value;
    }
    public function getRne()
    {
        return $this->rne;
    }
    public function setRne($value)
    {
        $this->rne =$value;
    }
    public function getAgencia()
    {
        return $this->agencia;
    }
    public function setAgencia($value)
    {
        $this->agencia = $value;
    }
    public function getConta()
    {
        return $this->conta;
    }
    public function setConta($value)
    {
        $this->conta = $value;
    }
    public function getBanco()
    {
        return $this->banco;
    }
    public function setBanco($value)
    {
        $this->banco = $value;
    }
	public function getCelular()
	{
		return $this->celular;
	} 
	public function setCelular($value)
	{
		$this->celular = $value;
	} 


	public function loadById($id)
	{
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM TB_PRO WHERE ID_PRO = :id", array(":id"=>$id));
		if (count($results)>0){
			$this->setData($results[0]);
		}
	}
	public static function getList()
	{
		$sql = new Sql();
		return $sql->select("SELECT * FROM TB_PRO ORDER BY NOME_PRO");
	} 

	public static function search($pro){
		$sql = new Sql();
		return $sql->select("SELECT * FROM TB_PRO WHERE NOME_PRO LIKE :nome",array(":nome"=>"%".$adm."%")); 
	}

    public static function id($id){
		$sql = new Sql();
		return $sql->select("SELECT * FROM TB_PRO WHERE ID_PRO = :id", array(":id"=>$id)); 
	}


	public function setData($data)
	{
		$this->setId($data['ID_PRO']);
		$this->setNome($data['NOME_PRO']);
        $this->setCpf($data['CPF_PRO']);
        $this->setConta($conta['CONTA_PRO']);
        $this->setCelular($celular['CELULAR_PRO']);
        $this->setAgencia($agencia['AGENCIA_PRO']);
        $this->setRne($rne['RNE_PRO']);
        $this->setProfissao($profissao['PROFISSAO_PRO']);
        $this->setNacionalidade($nacionalidade['NACIONALIDADE_PRO']);
        $this->setEndereco_atual($endereco_atual['ENDERECO_ATUAL_PRO']);
        $this->setEstado_civil($estado_civil['ESTADO_CIVIL_PRO']);
        $this->setRg($rg['RG_PRO']);
        $this->setData_nascimento($data_nascimento['DATA_NASCIMENTO_PRO']);
	}

	public function insert()
	{
		$sql = new Sql();
		$results = $sql->select("CALL sp_pro_insert(:nome, :cpf, :data_nascimento, :rg, :endereco_atual, :estado_civil, :nacionalidade, :profissao, :rne, :agencia, :conta, :banco, :celular)", array(
			":nome"=>$this->getNome(),
            ":cpf"=>$this->getCpf(),
			":data_nascimento"=>$this->getData_nascimento(),
            ":rg"=>$this->getRg(),
            ":endereco_atual"=>$this->getEndereco_atual(),
            ":estado_civil"=>$this->getEstado_civil(),
            ":nacionalidade"=>$this->getNacionalidade(),
            ":profissao"=>$this->getProfissao(),
            ":rne"=>$this->getRne(),
            ":agencia"=>$this->getAgencia(),
            ":conta"=>$this->getConta(),
            ":banco"=>$this->getBanco(),
            ":celular"=>$this->getCelular()
		));
		if (count($results)>0){
			$this->setData($results[0]); 
		}
	}

    public function teste($id, $endereco_atual, $estado_civil, $profissao, $agencia, $conta, $banco, $celular)
    {
        $this->setId($id);
        $this->setEndereco_atual($endereco_atual);
        $this->setEstado_civil($estado_civil);
        $this->setProfissao($profissao);
        $this->setAgencia($agencia);
        $this->setConta($conta);
        $this->setBanco($banco);
        $this->setCelular($celular);
        $sql = new Sql();
        $sql->query("UPDATE TB_PRO SET ENDERECO_ATUAL_PRO = :endereco_atual, ESTADO_CIVIL_PRO = :estado_civil,  PROFISSAO_PRO = :profissao, AGENCIA_PRO = :agencia, CONTA_PRO = :conta, BANCO_PRO = :banco, CELULAR_PRO = :celular  WHERE ID_PRO = :id",array(
			":id"=>$id,
            ":endereco_atual"=>$endereco_atual,
            ":estado_civil"=>$estado_civil,
            ":profissao"=>$profissao,
            ":agencia"=>$agencia,
            ":conta"=>$conta,
            ":banco"=>$banco,
            ":celular"=>$celular
		));
    }

	public function update($id, $nome, $cpf, $data_nascimento, $rg, $endereco_atual, $nacionalidade, $profissao, $rne, $agencia, $conta, $banco, $celular)
	{
        $this->setId($id);
		$this->setNome($nome);
        $this->setCpf($cpf);
        $this->setData_nascimento($data_nascimento);
        $this->setRg($rg);
        $this->setEndereco_atual($endereco_atual);
        $this->setNacionalidade($nacionalidade);
        $this->setProfissao($profissao);
        $this->setRne($rne);
        $this->setAgencia($agencia);
        $this->setConta($conta);
        $this->setBanco($banco);
        $this->setCelular($celular);
		$sql = new Sql();
		$sql->query("UPDATE TB_PRO SET NOME_PRO = :nome, CPF_PRO = :cpf, DATA_NASCIMENTO_PRO = :data_nascimento, RG_PRO = :rg, ENDERECO_ATUAL_PRO = :endereco_atual, ESTADO_CIVIL_PRO = :estado_civil, NACIONALIDADE_PRO = :nacionalidade, PROFISSAO_PRO = :profissao, RNE_PRO = :rne, AGENCIA_PRO = :agencia, CONTA_PRO = :conta, BANCO_PRO = :banco, CELULAR_PRO = :celular  WHERE ID_PRO = :id",array(
			":id"=>$id,
			":nome"=>$nome,
			":cpf"=>$cpf,
            ":data_nascimento"=>$data_nascimento,
            ":rg"=>$rg,
            ":endereco_atual"=>$endereco_atual,
            ":estado_civil"=>$estado_civil,
            ":nacionalidade"=>$nacionalidade,
            ":profissao"=>$profissao,
            ":rne"=>$rne,
            ":agencia"=>$agencia,
            ":conta"=>$conta,
            ":banco"=>$banco,
            ":celular"=>$celular
		));
	}

	public function delete()
	{
		$sql = new Sql();
		$sql->query("DELETE FROM TB_PRO WHERE ID_PRO = :id",array(":id"=>$this->getId()));
	}  

	public function __construct($nome="", $cpf="", $data_nascimento="", $rg="", $endereco_atual="", $estado_civil="", $nacionalidade="", $profissao="", $rne="", $agencia="", $conta="", $banco="", $celular="")
	{
		$this->nome = $nome;
        $this->cpf = $cpf;
        $this->data_nascimento = $data_nascimento;
        $this->rg = $rg;
        $this->endereco_atual = $endereco_atual;
        $this->estado_civil = $estado_civil;
        $this->nacionalidade = $nacionalidade;
        $this->profissao = $profissao;
        $this->rne = $rne;
        $this->agencia = $agencia;
        $this->conta = $conta;
        $this->banco = $banco;
        $this->celular = $celular;
	}
	
	public function __toString()
	{
		return json_encode(array(
			"ID_PRO"=>$this->getId(),
			"NOME_PRO"=>$this->getNome(),
            "CPF_PRO"=>$this->getCpf(),
            "DATA_NASCIMENTO_PRO"=>$this->getData_nascimento(),
            "RG_PRO"=>$this->getRg(),
            "ENDERECO_ATUAL_PRO"=>$this->getEndereco_atual(),
            "ESTADO_CIVIL_PRO"=>$this->getEstado_civil(),
            "NACIONALIDADE_PRO"=>$this->getNacionalidade(),
            "PROFISSAO_PRO"=>$this->getProfissao(),
            "RNE_PRO"=>$this->getRne(),
            "AGENCIA_PRO"=>$this->getAgencia(),
            "CONTA_PRO"=>$this->getConta(),
            "BANCO_PRO"=>$this->getBanco(),
            "CELULAR_PRO"=>$this->getCelular()
		));
	}

}

?>