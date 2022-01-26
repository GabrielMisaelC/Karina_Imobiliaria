<?php 
class Imovel
{
	private $id;
    private $idpro;
	private $cep;
    private $logradouro;
	private $bairro;
	private $numero;
    private $locacao;
    private $venda;
    private $valorvenda;
    private $valorlocacao;
    private $status;

	public function getId()
	{
		return $this->id;
	} 

	public function setId($value)
	{
		$this->id = $value;
	}
    
	public function getIdpro()
    {
        return $this->idpro;
    }
    
	public function setIdpro($value)
    {
        $this->idpro = $value;
    }
	
	public function getCep()
	{
		return $this->cep;
	} 
	
	public function setCep($value)
	{
		$this->cep = $value;
	}
    
	public function getLogradouro()
    {
        return $this->logradouro;
    }
    
	public function setLogradouro($value)
    {
    	$this->logradouro = $value;
    }
	
	public function getBairro()
	{
		return $this->bairro;
	} 
	
	public function setBairro($value)
	{
		$this->bairro = $value;
	} 
	
	public function getNumero()
	{
		return $this->numero;
	} 
	
	public function setNumero($value)
	{
		$this->numero = $value;
	} 
    
	public function getLocacao()
	{
		return $this->locacao;
	} 
	
	public function setLocacao($value)
	{
		$this->locacao = $value;
	} 
    
	public function getVenda()
	{
		return $this->venda;
	} 
	
	public function setVenda($value)
	{
		$this->venda = $value;
	} 
    
	public function getValorvenda()
	{
		return $this->valorvenda;
	} 
	
	public function setValorvenda($value)
	{
		$this->valorvenda = $value;
	} 
    
	public function getValorlocacao()
	{
		return $this->valorlocacao;
	} 
	
	public function setValorlocacao($value)
	{
		$this->valorlocacao = $value;
	} 
    
	public function getStatus()
	{
		return $this->status;
	} 
	
	public function setStatus($value)
	{
		$this->status = $value;
	} 

	
	public function loadById($id)
	{//carrega por ID
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM imovel WHERE id_imv = :id", array(":id"=>$id));
		if (count($results)>0){
			$this->setData($results[0]);
		}
	}
	public static function id($id){
		$sql = new Sql();
		return $sql->select("SELECT * FROM imovel WHERE id_imv = :id", array(":id"=>$id)); 
	}
	
	public static function getList()
	{
		$sql = new Sql();
		return $sql->select("SELECT * FROM imovel ORDER BY bairro");
	} 
	
	public static function search($imv){
		$sql = new Sql();
		return $sql->select("SELECT * FROM imovel WHERE bairro LIKE :bairro",array(":bairro"=>"%".$imv."%")); 
	}


	public function setData($data)
	{
		$this->setId($data['id']);
        $this->setIdpro($data['idpro']);
        $this->setCep($data['cep']);
        $this->setLogradouro($data['logradouro']);
        $this->setBairro($data['bairro']);
        $this->setNumero($data['numero']);
        $this->setLocacao($data['locacao']);
        $this->setVenda($data['venda']);
        $this->setValorvenda($data['valorvenda']);
        $this->setValorlocacao($data['valorlocacao']);
        $this->setStatus($data['status']);
	}
	
	public function insert()
	{
		$sql = new Sql();
		$results = $sql->select("CALL sp_imv_insert(:SP_ID_PRO_IMV ,  :SP_CEP_IMV ,  :SP_LOGRADOURO_IMV ,  :SP_BAIRRO_IMV ,  :NUMERO ,  :SP_LOCACAO_IMV ,  :SP_VENDA_IMV ,  :SP_VENDA_VALOR_IMV ,  :SP_LOCACAO_VALOR_IMV ,  :SP_STATUS_IMV)", array(
			":SP_ID_PRO_IMV"=>$this->getIdpro(),
            ":SP_CEP_IMV"=>$this->getCep(),
            ":SP_LOGRADOURO_IMV"=>$this->getLogradouro(),
            ":SP_BAIRRO_IMV"=>$this->getBairro(),
            ":NUMERO"=>$this->getNumero(),
            ":SP_LOCACAO_IMV"=>$this->getLocacao(),
            ":SP_VENDA_IMV"=>$this->getVenda(),
            ":SP_VENDA_VALOR_IMV"=>$this->getValorvenda(),
            ":SP_LOCACAO_VALOR_IMV"=>$this->getValorlocacao(),
            ":SP_STATUS_IMV"=>$this->getStatus()
		));
		if (count($results)>0){
			$this->setData($results[0]); 
		}
	}
	
	public function update($id,$cep,$logradouro,$bairro,$numero,$locacao,$venda,$valorvenda,$valorlocacao)
	{
		$this->setId($id);
		$this->setCep($cep);
		$this->setLogradouro($logradouro);
		$this->setBairro($bairro);
		$this->setNumero($numero);
		$this->setLocacao($locacao);
		$this->setVenda($venda);
		$this->setValorvenda($valorvenda);
		$this->setValorlocacao($valorlocacao);
		$sql = new Sql();
		$sql->query("UPDATE imovel SET cep = :cep, logradouro = :logradouro, bairro = :bairro, numero = :numero, locacao = :locacao, venda = :venda, valor_venda = :valorvenda, valor_locacao = :valorlocacao WHERE id_imv = :id",array(
			":id"=>$id,
            ":cep"=>$cep,
            ":logradouro"=>$logradouro,
            ":bairro"=>$bairro,
            ":numero"=>$numero,
            ":locacao"=>$locacao,
            ":venda"=>$venda,
            ":valorvenda"=>$valorvenda,
            ":valorlocacao"=>$valorlocacao
		));
	}
	
	public function delete()
	{
		$sql = new Sql();
		$sql->query("DELETE FROM imovel WHERE id_imv = :id",array(":id"=>$this->getId()));
	}  
	
	public function __construct($idpro="", $cep="", $logradouro="", $bairro="", $numero="", $locacao="", $venda="", $valor_venda="", $valor_locacao="", $status="")
	{
		$this->idpro = $idpro;
		$this->cep = $cep;
		$this->logradouro = $logradouro;
		$this->bairro = $bairro;
		$this->numero = $numero;
		$this->locacao = $locacao;
		$this->venda = $venda;
		$this->valorvenda = $valor_venda;
		$this->valorlocacao = $valor_locacao;
        $this->status = $status;
	}
		
	public function __toString()
	{
		return json_encode(array(
			"id"=>$this->getId(),
            "idpro"=>$this->getIdpro(),
            "cep"=>$this->getCep(),
            "logradouro"=>$this->getLogradouro(),
            "bairro"=>$this->getBairro(),
            "numero"=>$this->getNumero(),
            "locacao"=>$this->getLocacao(),
            "venda"=>$this->getVenda(),
            "valorvenda"=>$this->getValorvenda(),
            "valorlocacao"=>$this->getValorlocacao(),
            "status"=>$this->getStatus()
		));
	}

}
?>