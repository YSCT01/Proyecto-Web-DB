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
    <div>
        <h2 style="color:#dcd6d6">Nombre</h2>
        <h2 style="color:#dcd6d6">Categoría</h2>
        <h2 style="border:none; color:#00ff00;">Editar</h2>
        <h2 style="border:none; color: red;">Borrar</h2>
    </div>
    <?php  while($product = $list->fetch_object()): ?>
    <div>
        <h2><?=$product->titulo?></h2>
        <h2><?php echo $cat->getByID($product->categoria_id)->fetch_object()->titulo;   ?></h2>
        <a href="<?=base_url?>producto/edit&id=<?=$product->id?>" class="button"><i class="far fa-edit"></i> Editar producto</a>
        <a href="<?=base_url?>producto/delete&id=<?=$product->id?>" class="button delete"><i class="far fa-trash-alt"></i> Eliminar producto</a>
    </div>
    <?php endwhile; ?>
</section>