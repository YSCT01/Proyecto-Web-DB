<section id="signUpSec" class="formsl">
    <h1>Regístrate</h1>
    <form method="POST" action="<?=base_url?>usuario/signUp">
        <?php
        if(isset($_SESSION['registro'])){
            echo $_SESSION['registro'];
            Utils::deleteSession('registro');
        }
        ?>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" placeholder="Escribe tu/s nombre/s" required>
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellido" placeholder="Escribe tus apellidos" required>
        <label for="email">Correo</label>
        <input type="email" name="correo" placeholder="Escribe tu correo" required>
        <label for="password">Contraseña</label>
        <input type="password" name="password" placeholder="Escribe tu contraseña" required>
        <label for="confirm">Confirma tu contraseña</label>
        <input type="password" name="confirm" placeholder="Confirma tu contraseña" required>
        <input type="submit" value="Regístrate">
        <a href="<?=base_url?>main/login">¿Ya tienes cuenta? Inicia sesión</a>
    </form>
</section>