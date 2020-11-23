<section id="catTemplate">
    <h1>Productos</h1>
    <?php if($list->num_rows == 0):?>
        <h2>No hay productos para mostrar</h2>
    <?php else:?>
        <div id="prodRow">
            <?php while($product = $list->fetch_object()): ?>
                <div id="listProd">
                    <a href="#">
                        <div>
                            <img src="<?=base_url?>uploads/<?=$product->imagen?>">
                        </div>
                        <h2><?=$product->titulo?></h2>
                        <h3>$<?=$product->precio?></h3>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</section>