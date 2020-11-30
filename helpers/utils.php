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
    public static function getCarrito(){
        $stats = array(
            'count'=>0,
            'total'=>0
        );
        if(isset($_SESSION['cart'])){

            foreach ($_SESSION['cart'] as $value){
                $stats['count'] += $value['qty'];
                $stats['total'] += $value['precio']*$value['qty'];
            }
        }
        return $stats;
    }
}