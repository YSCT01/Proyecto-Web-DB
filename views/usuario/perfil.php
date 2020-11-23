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
            <a class="button">Gestionar pedidos</a>
            <a href="<?=base_url?>producto/addProduct" class="button">Añadir producto</a>
            <a href="<?=base_url?>producto/editProduct" class="button">Editar productos</a>
            <a href="<?=base_url?>usuario/logOut" class="button">Cerrar sesión</a>
        <?php else: ?>
        <a class="button">Pedidos</a>
        <a class="button">Editar Datos</a>
        <a class="button delete">Borrar perfil</a>
        <a href="<?=base_url?>usuario/logOut" class="button delete">Cerrar sesión</a>
        <?php endif; ?>
    </div>
</section>
