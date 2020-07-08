<?php

class Pessoa{

	public $nome;//Atributo

	public function falar(){//Método
		return "O meu nome é: ".$this->nome;
	}

}

$addler = new Pessoa();
$addler->nome = "Addler Kyldson";
echo $addler->falar();

?>