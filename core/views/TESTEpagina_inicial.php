<?php 
use core\classes\Store;
//$_SESSION['cliente']= 'Hugo';   //simulação de cliente 'Hugo' logado

?>


<div>

    <?php if(Store::clienteLogado()): ?>
        <p>SIM</p>
    <?php else: ?>
        <p>NAO</p>
    <?php endif; ?>
</div>

