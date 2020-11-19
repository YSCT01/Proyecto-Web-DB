<?php
session_start();
require_once 'autoload.php';
require_once 'helpers/utils.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'views/layout/header.php';

$error = new errorController();


if(isset($_GET['controller'])){
    $ncontroller = $_GET['controller'].'Controller';
}
else{
    if(!isset($_GET['action'])){
        $ncontroller = default_ctlr;
    }
    else {
        $error->index();
        exit();
    }
}

if(class_exists($ncontroller)){

    $controller = new $ncontroller();

    if(isset($_GET['action']) && method_exists($controller, $_GET['action'])){
        $action = $_GET['action'];
        $controller->$action();
    }
    else{
        if(!isset($_GET['action'])){
            $page = default_action;
            $controller->$page();
        }
        else {
            $error->index();
        }
    }
}
else{
    $error->index();
}

require_once 'views/layout/footer.php';
