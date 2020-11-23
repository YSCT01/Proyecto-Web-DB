<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf8">
    <title>SmartWorld</title>
    <link rel="stylesheet" href="<?=base_url?>assets/css/style.css?ver=1.6">
    <link rel="stylesheet" href="<?=base_url?>assets/css/slider.css?ver=1.1">
    <script src="https://kit.fontawesome.com/32ec682ca2.js" crossorigin="anonymous"></script>
</head>
<body>
<header class="menu-fixed">
    <a id="logo" href="<?=base_url?>">SmartWorld</a>
    <nav>
        <ul id="mainnav">
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
            <li><a href="<?=base_url?>main/contacto">Contacto</a></li>
            <li><a  href="<?=base_url?>main/nosotros">Nosotros</a></li>
            <?php if(isset($_SESSION['log'])): ?>
                <li><a href="<?=base_url?>usuario/profile"><?=$_SESSION['log']->nombres ?></a> <a  href="<?=base_url?>usuario/logOut" class="button delete">Cerrar Sesión</a></li>
            <?php  else:?>
            <li><a  href="<?=base_url?>main/login">Iniciar sesión</a></li>
            <?php endif;?>
        </ul>
    </nav>
</header>
<section id="maincontent">