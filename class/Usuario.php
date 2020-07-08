<?php 

/**
 * 
 */
class Usuario
{
	
	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario()
	{
	    return $this->idusuario;
	}
	
	public function setIdusuario($idusuario)
	{
	     $this->idusuario = $idusuario;
	}

	public function getDeslogin()
	{
	    return $this->deslogin;
	}
	
	public function setDeslogin($deslogin)
	{
	     $this->deslogin = $deslogin;
	}

	public function getDessenha()
	{
	    return $this->dessenha;
	}
	
	public function setDessenha($dessenha)
	{
	     $this->dessenha = $dessenha;
	}

	public function getDtcadastro()
	{
	    return $this->dtcadastro;
	}
	
	public function setDtcadastro($dtcadastro)
	{
	     $this->dtcadastro = $dtcadastro;
	}


	public function loadById($id){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM usuario WHERE id = :ID", array( ":ID"=>$id));

		if (count($results) > 0) {
		 	
		 	$row = $results[0];

		 	$this->setIdusuario($row['id']);
		 	$this->setDeslogin($row['login']);
		 	$this->setDessenha($row['senha']);
		 	$this->setDtcadastro(new dateTime($row['data_cadastro']));

		 } 
	}

	public function __toString(){

		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()
		));
	}
	
}

?>