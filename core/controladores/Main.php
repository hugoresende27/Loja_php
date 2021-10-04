<?php

namespace core\controladores;

use core\classes\Store;

class Main{

//===============================================================================
    public function index()
    {
        /*
            1. carregar e tratar dados (cálculos, base dados, listas de clientes, etc)
            2. apresentar layout (views)

        */
        //$clientes=['hugo','rita','lola','pepe','fred'];

   

        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'inicio',
            'layouts/footer',
            'layouts/html_footer',

        ], );
    }


//===============================================================================
    public function loja()
    {
        //apresenta a página da loja
      

        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'loja',
            'layouts/footer',
            'layouts/html_footer',

        ],);
    }

//===============================================================================
public function carrinho()     
{
    //apresenta a página da loja
    

    Store::Layout([
        'layouts/html_header',
        'layouts/header',
        'carrinho',              //'carrinho'=> 'main@carrinho'
        'layouts/footer',
        'layouts/html_footer',

    ],);
}
}