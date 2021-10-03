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

        $dados=[
            'titulo' => APP_NAME.' '.APP_VERSION,
            
        ];

        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'inicio',
            'layouts/footer',
            'layouts/html_footer',

        ], $dados);
    }


//===============================================================================
    public function loja()
    {
        echo "LOJA!!!";
    }
}