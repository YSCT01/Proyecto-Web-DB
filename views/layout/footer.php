</section>

<footer>
    <span>SmartWorld &COPY; <?=date('Y');?></span>
    <div id="botfooter">
        <nav> <ul id="mainnav">
                <li><a href="<?=base_url?>">Inicio</a></li>
                <li><a href="<?=base_url?>producto/all">Productos</a>
                    <ul>
                        <li><a href="<?=base_url?>categoria/smartphone">Smartphones</a></li>
                        <li><a href="<?=base_url?>categoria/tablet">Tablets</a></li>
                        <li><a href="<?=base_url?>categoria/laptop">Laptops</a></li>
                        <li><a href="<?=base_url?>categoria/watch">Wearables</a></li>
                        <li><a href="<?=base_url?>categoria/otros">Accesorios</a></li>
                    </ul>
                </li>
                <li><a  href="<?=base_url?>main/contacto">Contacto</a></li>
                <li><a  href="<?=base_url?>main/nosotros">Nosotros</a></li>
                <?php if(isset($_SESSION['log'])): ?>
                    <li><a href="<?=base_url?>usuario/profile"><?=$_SESSION['log']->nombres ?></a> <a  href="<?=base_url?>usuario/logOut" class="button delete">Cerrar Sesión</a></li>
                <?php  else:?>
                    <li><a  href="<?=base_url?>main/login">Iniciar sesión</a></li>
                <?php endif;?>
            </ul>
        </nav>
        <div id="social">
            <i class="fab fa-facebook"></i>
            <i class="fab fa-twitter-square"></i>
            <i class="fab fa-instagram-square"></i>
            <i class="fab fa-github-square"></i>
        </div>
    </div>
</footer>
<script src="<?=base_url?>assets/js/slider.js"></script>
</body>
</html>