<section id="signUpSec" class="formsl">
    <h1>Regístrate</h1>
    <form method="POST" action="<?=base_url?>usuario/edit">
        <?php
        if(isset($_SESSION['editado'])){
            echo $_SESSION['editado'];
            Utils::deleteSession('editado');
        }
        ?>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" placeholder="Escribe tu/s nombre/s" value="<?=$_SESSION['log']->nombres?>" required>
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellido" placeholder="Escribe tus apellidos" value="<?=$_SESSION['log']->apellidos?>" required>
        <input type="submit" value="Actualiza datos">
        <a href="<?=base_url?>usuario/profile">Regresar al menu</a>
    </form>
</section>