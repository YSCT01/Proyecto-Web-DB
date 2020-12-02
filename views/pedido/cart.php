<section id="cart">
<h1>Carrito de compra</h1>
<?php if(isset($_SESSION['inises'])){
    echo $_SESSION['inises'];
    if(!isset($_SESSION['log'])) {
        echo "<a href='" . base_url . "main/login' class='button'>Inicia sesión aquí</a>";
    }
    Utils::deleteSession('inises');
}?>
<?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])):?>
<table id="carrito">
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
    </tr>
        <?php foreach($_SESSION['cart'] as $index=>$elem):
            $prod = $elem['producto'];
            ?>
        <tr>
            <td><div id="imgtable"><img src="<?=base_url?>/uploads/<?=$prod->imagen?>"></div></td>
            <td><a href="<?=base_url?>/producto/details&id=<?=$prod->id?>"><?=$prod->titulo?></a></td>
            <td>$<?=$prod->precio?></td>
            <td> <a href="<?=base_url?>pedido/addItem&id=<?=$prod->id?>" class="logro" style="border: 1px solid white; padding: 5px;"><i class="fas fa-cart-plus"></i> Añadir</a> <?=$elem['qty']?> <a href="<?=base_url?>pedido/deleteItem&id=<?=$prod->id?>" class="error" style="border: 1px solid white; padding: 5px;"><i class="fas fa-cart-arrow-down"></i> Quitar</a></td>
        </tr>
        <?php endforeach; ?>
</table>
<h2 style="margin: 30px 10px 0 0    ; text-align: right">Total: $<?=Utils::getCarrito()['total']?></h2>
<a href="<?=base_url?>pedido/comprar" style="font-size: 30px; float: right; padding: 8px; border: 1px solid #01B1EA" class="button"><i class="fas fa-money-check"></i> Comprar</a>
<?php else:?>
<h1>El carrito está vacío</h1>
<?php endif;?>
</section>