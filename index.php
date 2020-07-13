<?php

require_once("config.php");

//carrega um usuário
//$usuario = new Usuario();
//$usuario->loadById(39);
//echo $usuario;

//Carrega uma lista de Usuários
//$lista = Usuario::getList();
//echo json_encode($lista);

//Carrega uma lista de Usuários buscando pelo login
//$search = Usuario::search("addler");
//echo json_encode($search);

//Carrega uma lista de Usuários buscando pelo login e senha

$usuario = new Usuario();
$usuario->login("addler", "1910525");

echo $usuario;
?>