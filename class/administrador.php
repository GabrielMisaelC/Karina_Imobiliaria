<?php 
class Administrador
{
	private $id;
	private $nome;
    private $cpf;
	private $email;
	private $senha;
	private $count;

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
	public function getEmail()
	{
		return $this->email;
	} 
	public function setEmail($value)
	{
		$this->email = $value;
	} 
	public function getSenha()
	{
		return $this->senha;
	} 
	public function setSenha($value)
	{
		$this->senha = $value;
	} 
	public function getCount()
	{
		return $this->count;
	} 
	public function setCount($value)
	{
		$this->count = $value;
	} 
	public function loadById($id)
	{//carrega por ID
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_adm WHERE id_adm = :id", array(":id"=>$id));
		if (count($results)>0){
			$this->setData($results[0]);
		}
	}
	public function count()
	{
		$sql = new Sql();
		$results = $sql->select("SELECT count(NOME_ADM) from TB_ADM");
		if (count($results)>0){
			$this->setData($results[0]);
		}
	}
	public static function getList()
	{
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_adm ORDER BY nome_adm");
	} 

	public static function search($adm){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_adm WHERE nome_adm LIKE :nome",array(":nome"=>"%".$adm."%")); 
	}


	public  function login($email, $senha)
	{
		//$senhaCrip = md5($senha);
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM TB_ADM WHERE EMAIL_ADM = '$email' AND senha_adm = '$senha'"
	);
		if (count($results)>0){
			$this->setData($results[0]); 
		}
	}

	public function setData($data)
	{
		$this->setId($data['id_adm']);
		$this->setNome($data['nome_adm']);
        $this->setCpf($data['cpf_adm']);
		$this->setEmail($data['email_adm']);
		$this->setSenha($data['senha_adm']);
		$this->setCount($data[`count_adm`]);
	}

	public function insert()
	{
		$sql = new Sql();
		$results = $sql->select("CALL sp_adm_insert(:nome, :cpf, :email, :senha)", array(
			":nome"=>$this->getNome(),
            ":cpf"=>$this->getCpf(),
			":email"=>$this->getEmail(),
			":senha"=>md5($this->getSenha())
		));
		if (count($results)>0){
			$this->setData($results[0]); 
		}
	}

	public function update($id, $nome,$senha)
	{
		$this->setNome($nome);
		$this->setSenha($senha);
		$sql = new Sql();
		$sql->query("UPDATE tb_adm SET nome_adm = :nome, senha_adm = :senha WHERE id_adm = :id",array(
			":id"=>$id,
			":nome"=>$nome,
			":senha"=>md5($senha)
		));
	}

	public function delete()
	{
		$sql = new Sql();
		$sql->query("DELETE FROM TB_ADM WHERE ID_ADM = :id",array(":id"=>$this->getId()));
	}  

	public function __construct($nome="", $cpf="", $email="", $senha="")
	{
		$this->nome = $nome;
        $this->cpf = $cpf;
		$this->email = $email;
		$this->senha = $senha; 
	}
	
	public function __toString()
	{
		return json_encode(array(
			"ID_ADM"=>$this->getId(),
			"NOME_ADM"=>$this->getNome(),
            "CPF_ADM"=>$this->getCpf(),
			"EMAIL_ADM"=>$this->getEmail(),
			"SENHA_ADM"=>$this->getSenha()
		));
	}

}

?>