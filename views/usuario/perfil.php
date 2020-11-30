<section id="profile">
    <div id="userdata">
        <img src="<?=base_url?>assets/images/default.png">
        <h2><?=$_SESSION['log']->nombres?></h2>
        <h2><?=$_SESSION['log']->apellidos?></h2>
        <h3><?=$_SESSION['log']->email?></h3>
        <h3><?=$_SESSION['log']->rol?></h3>
    </div>
    <div id="useropt">
        <?php if($_SESSION['log']->rol === 'admin'): ?>
            <a class="button"><i class="fas fa-folder-plus"></i> Gestión pedidos</a>
            <a href="<?=base_url?>producto/addProduct" class="button"><i class="fas fa-folder-plus"></i> Añadir producto</a>
            <a href="<?=base_url?>producto/editProduct" class="button"><i class="far fa-edit"></i> Editar productos</a>
            <a href="<?=base_url?>usuario/logOut" class="button"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
        <?php else: ?>
        <a class="button"><i class="fas fa-gift"></i> Pedidos</a>
        <a href="<?=base_url?>usuario/editData" class="button"><i class="far fa-edit"></i> Editar Datos</a>
        <a href="<?=base_url?>usuario/delete" class="button delete"><i class="far fa-trash-alt"></i> Borrar perfil</a>
        <a href="<?=base_url?>usuario/logOut" class="button delete"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
        <?php endif; ?>
    </div>
</section>
