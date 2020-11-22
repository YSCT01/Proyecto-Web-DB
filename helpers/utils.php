<?php
class Utils{
    public static function deleteSession($session){
        if(isset($_SESSION[$session])){
            unset($_SESSION[$session]);
        }
    }
}