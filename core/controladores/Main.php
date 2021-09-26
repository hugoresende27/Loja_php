<?php

namespace core\controladores;

use core\classes\Functions;

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
            'titulo' => 'Este é o título',
            'clientes'=>['hugo','rita','lola','pepe','fred']
        ];

        Functions::Layout([
            'layouts/html_header',
            'pagina_inicial',
            'layouts/html_footer',

        ], $dados);
    }


//===============================================================================
    public function loja()
    {
        echo "LOJA!!!";
    }
}