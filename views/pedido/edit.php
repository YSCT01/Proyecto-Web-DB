<?php require_once 'models/productoModel.php'?>
<section id="allped" >
    <h1>Detalles de pedido <?=$_GET['id']?></h1>
    <?php if(isset($_SESSION['status'])){
        echo $_SESSION['status'];
        Utils::deleteSession('status');
    }
    ?>
    <div id="tabped">
        <div id="tabdhead" style="grid-template-columns: 20% 20% 20% 20% 20%">
            <h2>ID</h2>
            <h2>Producto</h2>
            <h2>Precio</h2>
            <h2>Cantidad</h2>
            <h2>Estado</h2>
        </div>
        <?php while($prod = $list->fetch_object()): ?>
            <form method="POST"  action="<?=base_url?>pedido/update" id="tabdetail" style="grid-template-columns: 20% 20% 20% 20% 20%">
                <?php $product = new Producto();
                $product->setId($prod->producto_id);
                $data = $product->getOne()->fetch_object();
                ?>
                <h2><?=$prod->id?></h2>
                <h2><?=$data->titulo?></h2>
                <h2>$<?=$data->precio?></h2>
                <h2><?=$prod->cantidad?></h2>
                <h2>
                        <select name="status">
                            <option value="Confirmado"  <?php if($prod->estado == 'Confirmado'){echo 'selected';} ?>>Confirmado</option>
                            <option value="Preparando"  <?php if($prod->estado == 'Preparando'){echo 'selected';} ?>>Preparando</option>
                            <option value="Enviado"  <?php if($prod->estado == 'Enviado'){echo 'selected';} ?>>Enviado</option>
                            <option value="Recibido"  <?php if($prod->estado == 'Recibido'){echo 'selected';} ?>>Recibido</option>
                        </select>
                        <input name="id" value="<?=$prod->id?>" hidden>
                    <input name="total" value="<?=$_GET['id']?>" hidden>
                    <button type="submit"  class="button"><i class="fas fa-check-square"></i></button>
                </h2>
            </form>
        <?php endwhile; ?>
    </div>
</section>