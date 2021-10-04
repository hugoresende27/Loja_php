<?php 
use core\classes\Store;
?>

<div class="container-fluid navegacao">
    <div class="row">

        <div class="col-6  p-3">
            <a href="?a=inicio">        <!-- vai usar a rota 'inicio' => 'main@index' definida em rotas.php -->
           <h3> <?= APP_NAME?> </h3>
            </a>
        </div>

        <div class="col-6 text-end p-3">

            <a href="?a=inicio">Inicio</a>
            <a href="?a=loja">Loja</a>      <!--rotas.php 'loja' => 'main@loja'-->

<!-- verifica se existe cliente na sessão -->
    <?php if (Store::clienteLogado()):?>
        <a href="">Logout</a>
        <a href="">A minha conta</a>
        
    <?php else: ?>
        <a href="">Login</a>
        <a href="">Criar conta</a>
        
    <?php endif;?>
    <?php ?>

         
            <a href="?a=carrinho">      <!-- rotas.php 'carrinho'=> 'main@carrinho' -->
                <i class="fas fa-shopping-cart"></i>
            </a>     <!-- icone do carrinho de compras-->
            <span class="badge bg-warning"></span>
        </div>

    </div>
</div>