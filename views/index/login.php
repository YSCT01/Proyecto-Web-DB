<section id="loginSec" class="formsl">
    <h1>Inicia sesión</h1>
    <form method="POST" action="<?=base_url?>usuario/logIn">
        <?php
        if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            Utils::deleteSession('login');
        }
        ?>
        <label for="email">Correo</label>
        <input type="email" name="correo" placeholder="Escribe tu correo" required>
        <label for="password">Contraseña</label>
        <input type="password" name="password" placeholder="Escribe tu contraseña" required>
        <input type="submit" value="Ingresar">
        <a href="<?=base_url?>main/signup">¿No tienes cuenta? Regístrate</a>
    </form>
</section>