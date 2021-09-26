<?php

namespace core\classes;

use Exception;

class Functions{

    public function teste(){
        echo "OLA";
    }

//===============================================================================
    public static function Layout($estruturas, $dados= null)
    {
        //verifica se estruturas é um array
        if (!is_array($estruturas))
        {
            throw new Exception( "Coleção de estruturas inválida!");
        }
        
        //variáveis
        if (!empty($dados) && is_array($dados))
        {
            extract($dados);
            //['titulo'=>'asafasasdasdad']
            //$titulo
        }
        
        //apresentar as views da aplicação
        foreach ($estruturas as $estrutura)
        {
            include("../core/views/$estrutura.php");
        }
    }

}

/*
html_header  função layout para verificar se a ordem dos ficheiro php está correcta
nav_bar         .php incluido no include("../core/views/$estrutura.php")
inicio  
html_footer

*/