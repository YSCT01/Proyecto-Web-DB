<?php
class Utils{
    public static function deleteSession($session){
        if(isset($_SESSION[$session])){
            unset($_SESSION[$session]);
        }
    }

    public static function isAdmin(){
        if ($_SESSION['log']->rol != 'admin'){
            header('location: '.base_url);
        }
    }
}