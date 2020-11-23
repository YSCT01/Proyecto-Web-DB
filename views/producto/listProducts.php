<section id="tableProd" class="formsl">
    <h1>Editar productos</h1>
    <?php if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            Utils::deleteSession('delete');
    }
    ?>
    <?php if(isset($_SESSION['updated'])){
        echo $_SESSION['updated'];
        Utils::deleteSession('updated');
    }
    ?>
    <?php  while($product = $list->fetch_object()): ?>
    <div>
        <h2><?=$product->titulo?></h2>
        <h2><?php echo $cat->getByID($product->categoria_id)->fetch_object()->titulo;   ?></h2>
        <a href="<?=base_url?>producto/edit&id=<?=$product->id?>" class="button">Editar producto</a>
        <a href="<?=base_url?>producto/delete&id=<?=$product->id?>" class="button delete">Eliminar producto</a>
    </div>
    <?php endwhile; ?>
</section>