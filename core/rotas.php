<?php

//coleção de rotas      //sempre que adicionar páginas, sistemas de login, formulário
$rotas= [
    'inicio' => 'main@index',
    'loja' => 'main@loja',
    //'carrinho'=>'loja@carrinho'     //'o q aparece na query string @ assinatura do q é tratado
];

//define ação por defeito
$acao= 'inicio';

//verifica se existe ação na query string
if (isset($_GET['a']))
{
    //verifica se a ação existe nas rotas
    if (!key_exists($_GET['a'],$rotas))
    {
        $acao='inicio';
    }
    else
    {
        $acao =$_GET['a'];
    }
}

//trata a definição da rota
$partes=explode('@',$rotas[$acao]); //explode vai dividir main-@-index / main-@-loja etc
//var_dump($partes);

//$controlador=ucfirst($partes[0]);               //parte 0 vai ser antes de -@-  //ucfirst (primeira letra MAIUSC)
$controlador = 'core\\controladores\\'.ucfirst($partes[0]);
$metodo=$partes[1];
//echo "$controlador - $metodo";

$ctr = new $controlador();
$ctr->$metodo();