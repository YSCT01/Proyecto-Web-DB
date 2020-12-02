<section id="proddata">
<?php if(is_object($data)):?>
<h1><?=$data->titulo?></h1>
<div id="tobuy">
    <div id="imgbig">
        <img src="<?=base_url?>uploads/<?=$data->imagen?>">
    </div>
   <div id="settings">
       <h2>$<?=$data->precio?></h2>
        <div id="descrip">
            <h2>Descripción</h2>
            <div>
                <h3><?=$data->descripcion?></h3>
            </div>
        </div>
       <form id="qty" method="POST" action="<?=base_url?>pedido/addCart&id=<?=$data->id?>">
           <label>Cantidad</label>
           <input type="number" value="1" name="qty" min="1" max="<?=$data->stock?>" pattern="^[0-9]+">
           <?php if($data->stock >= 1): ?>
               <button type="submit" class="button"><i class="fas fa-cart-plus"></i>  Comprar</button>
           <?php else: ?>
           <button type="submit" class="button error" style="cursor: not-allowed"> Agotado</button>
           <?php endif; ?>
       </form>
   </div>
</div>
<?php else:?>
<h2>El producto no existe</h2>
<?php endif;?>
</section>

