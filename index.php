<?php

require_once("config.php");

$usuario = new Usuario();

$usuario->loadById(39);

echo $usuario;

?>