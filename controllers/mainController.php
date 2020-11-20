<?php
class mainController{
    public function index(){
      require_once 'views/index/main.php';
    }

    public function nosotros(){
        require_once 'views/index/nosotros.php';
    }

    public function contacto(){
        require_once 'views/index/contacto.php';
    }

    public function login(){
        echo "login";
    }

    public function signup(){
        echo "signup";
    }

}