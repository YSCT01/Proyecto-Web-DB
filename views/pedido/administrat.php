<section id="allped">
    <h1>Mis pedidos</h1>
    <?php if($list != false):?>
        <div id="tabped">
            <div id="tabdhead">
                <h2>Pedido ID</h2>
                <h2>Fecha</h2>
                <h2>Precio</h2>
                <h2>Acción</h2>
            </div>
            <?php while($product = $list->fetch_object()):?>
                <div id="tabdetail">
                    <h2>Pedido <?=$product->id?></h2>
                    <h2><?=$product->fecha?></h2>
                    <h2>$<?=$product->total?></h2>
                    <a href="<?=base_url?>pedido/edit&id=<?=$product->id?>" class="button">Ver detalles</a>
                </div>
            <?php endwhile;?>
        </div>
    <?php else: ?>
        <h2>No hay pedidos</h2>
    <?php endif; ?>
</section>