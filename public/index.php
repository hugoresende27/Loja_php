<?php

// abrir a sessão 

use core\classes\Database;
use core\classes\Functions;

session_start();

// carregar o config
require_once('../config.php');

// carrega todas as classes do projeto
require_once('../vendor/autoload.php');

$a=new Database();
$b=new Functions();
$b->teste();


echo "OK";

/*
carregar o config
carregar classes
carregar sistema de rotas:
    -mostrar loja
    -mostrar carrinho
    -mostrar backoffice
*/