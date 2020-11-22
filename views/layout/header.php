<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf8">
    <title>SmartWorld</title>
    <link rel="stylesheet" href="<?=base_url?>assets/css/style.css?ver=1.3">
    <link rel="stylesheet" href="<?=base_url?>assets/css/slider.css?ver=1.1">
    <script src="https://kit.fontawesome.com/32ec682ca2.js" crossorigin="anonymous"></script>
</head>
<body>
<header class="menu-fixed">
    <a id="logo" href="<?=base_url?>">SmartWorld</a>
    <nav>
        <ul id="mainnav">
            <li><a href="<?=base_url?>">Inicio</a></li>
            <li> Productos
                <ul>
                    <li><a>Smartphones</a></li>
                    <li><a>Tablets</a></li>
                    <li><a>Laptops</a></li>
                    <li><a>Wearables</a></li>
                    <li><a>Accesorios</a></li>
                </ul>
            </li>
            <li><a href="<?=base_url?>main/contacto">Contacto</a></li>
            <li><a  href="<?=base_url?>main/nosotros">Nosotros</a></li>
            <?php if(isset($_SESSION['log'])): ?>
                <li><a href="<?=base_url?>"><?=$_SESSION['log']->nombres ?></a> <a  href="<?=base_url?>usuario/logOut" class="button">Cerrar Sesión</a></li>
            <?php  else:?>
            <li><a  href="<?=base_url?>main/login">Iniciar sesión</a></li>
            <?php endif;?>
        </ul>
    </nav>
</header>
<section id="maincontent">