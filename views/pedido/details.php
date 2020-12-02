<?php require_once 'models/productoModel.php'?>
<section id="allped" >
    <h1>Detalles de pedido <?=$_GET['id']?></h1>
    <div id="tabped">
    <div id="tabdhead" style="grid-template-columns: 20% 20% 20% 20% 20%">
        <h2>ID</h2>
        <h2>Producto</h2>
        <h2>Precio</h2>
        <h2>Cantidad</h2>
        <h2>Estado</h2>
    </div>
    <?php while($prod = $list->fetch_object()): ?>
    <div id="tabdetail" style="grid-template-columns: 20% 20% 20% 20% 20%">
        <?php $product = new Producto();
          $product->setId($prod->producto_id);
          $data = $product->getOne()->fetch_object();
        ?>
        <h2><?=$prod->id?></h2>
        <h2><?=$data->titulo?></h2>
        <h2>$<?=$data->precio?></h2>
        <h2><?=$prod->cantidad?></h2>
        <h2><?=$prod->estado?></h2>
    </div>
    <?php endwhile; ?>
    </div>
</section>