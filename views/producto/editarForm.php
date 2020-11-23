<section id="addForm" class="formsl">
    <h1>Añadir producto</h1>
    <form method="POST" action="<?=base_url?>producto/editProd&id=<?=$data->id?>" enctype="multipart/form-data">
        <?php if (isset($_SESSION['edited'])){
            echo $_SESSION['edited'];
            Utils::deleteSession('edited');
        }
        ?>
        <label>Nombre</label>
        <input type="text" name="titulo" value="<?=$data->titulo?>" required>
        <label>Descripción</label>
        <textarea name="descripcion" required> <?=$data->descripcion?></textarea>
        <label>Precio</label>
        <input type="number" name="precio" value="<?=$data->precio?>" required>
        <label>Stock</label>
        <input type="number" name="stock" value="<?=$data->stock?>" required>
        <label>Categoría</label>
        <select name="categoria_id" required>
            <?php while($cat = $list->fetch_object()): ?>
            <option value="<?=$cat->id?>" <?php if($cat->id == $data->categoria_id){echo 'selected';} ?> > <?=$cat->titulo?> </option>
            <?php endwhile; ?>
        </select>
        <img src="<?=base_url?>uploads/<?=$data->imagen?>" height="100px" style="margin:auto;">
        <label>Imagen</label>
        <input type="file" name="imagen" >
        <input type="submit" value="Editar producto" required>
    </form>
</section>