<section id="addForm" class="formsl">
    <h1>Añadir producto</h1>
    <form method="POST" action="<?=base_url?>producto/addNew" enctype="multipart/form-data">
        <?php if (isset($_SESSION['añadir'])){
                    echo $_SESSION['añadir'];
                    Utils::deleteSession('añadir');
                }
            ?>
        <label>Nombre</label>
        <input type="text" name="titulo" required>
        <label>Descripción</label>
        <textarea name="descripcion" required></textarea>
        <label>Precio</label>
        <input type="number" name="precio" required>
        <label>Stock</label>
        <input type="number" name="stock" required>
        <label>Categoría</label>
        <select name="categoria_id" required>
            <?php while($cat = $list->fetch_object()): ?>
            <option value="<?=$cat->id?>"><?=$cat->titulo?></option>
            <?php endwhile; ?>
        </select>
        <label>Imagen</label>
        <input type="file" name="imagen" >
        <input type="submit" value="Añadir producto" required>
    </form>
</section>