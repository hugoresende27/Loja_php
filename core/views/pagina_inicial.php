<h1> <?=$titulo ?> </h1>        <!-- < ?php echo ($titulo) ?> -->

<ul>
<?php foreach ($clientes as $cliente):?>
    <li><?=$cliente ?></li>
<?php endforeach;?>
</ul>