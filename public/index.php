<?php



use core\classes\Database;

// abrir a sessão 
session_start();

// carregar o config
require_once('../config.php');

// carrega todas as classes do projeto
require_once('../vendor/autoload.php');

//$bd= new Database();        //criar objeto bd

//$clientes = $bd->select("SELECT * FROM clientes"); //var clientes passa a ter o resultado desta execução do select
//echo "<pre>";
//print_r($clientes);
//echo $clientes[0]->nome;
//echo $clientes[2]->nome;
//echo $clientes[0]['nome'];        //seria usado se na function select estivesse FETCH_ASSOC em vez de FETCH_CLASS

//$bd->select("SELECT TESTE");
//$bd->statement("TRUNCATE clientes");
//$clientes=$bd->select("SELECT * FROM clientes");
//echo "<pre>";
//print_r($clientes);


/*
carregar o config
carregar classes
carregar sistema de rotas:
    -mostrar loja
    -mostrar carrinho
    -mostrar backoffice
*/

//carregar o sistema de rotas
require_once('../core/rotas.php');