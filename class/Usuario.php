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

		 	$this->setData($results[0]);

		 } 
	}

	public static function getList(){

		$sql = new Sql();

		return $sql->select("SELECT * FROM usuario ORDER BY id");
	}

	public static function search($login){

		$sql = new Sql();

		return $sql->select("SELECT * FROM usuario WHERE login LIKE :SEARCH", array(
			':SEARCH'=>"%".$login."%"
		));

	}

	public function login($login, $password){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM usuario WHERE login = :LOGIN AND senha = :SENHA", array( ":LOGIN"=>$login,
							":SENHA"=>$password));

		if (count($results) > 0) {
		 	
		 	$row = $results[0];

		 	$this->setData($results[0]);
		 	

		 } else{
		 	throw new Exception("login e/ou senha errados");
		 	
		 }		 
	}

	public function setData($data){

	 	$this->setIdusuario($data['id']);
	 	$this->setDeslogin($data['login']);
	 	$this->setDessenha($data['senha']);
	 	$this->setDtcadastro(new dateTime($data['data_cadastro']));

	 }

	 public function insert(){
	 	$sql = new Sql();

	 	$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
	 			':LOGIN'=>$this->getDeslogin(),
	 			':PASSWORD'=>$this->getDessenha()
	 	));

	 	if (count($results) > 0) {
	 		$this->setData($results[0]);
	 	}
	 }

	 public function update($login, $password){

	 	$this->setDeslogin($login);
	 	$this->setDessenha($password);
	 	$sql = new Sql();

	 	$sql->query("UPDATE usuario SET login = :LOGIN, senha = :PASSWORD WHERE id = :ID", array(
	 		':LOGIN'=>$this->getDeslogin(),
	 		':PASSWORD'=>$this->getDessenha(),
	 		':ID'=>$this->getIdusuario()

	 	));

	 }

	public function __construct($login = "", $password = ""){
		$this->setDeslogin($login);
		$this->setDessenha($password);
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