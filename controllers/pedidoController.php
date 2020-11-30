<?php
require_once 'models/productoModel.php';
class pedidoController{
    public function cart(){
        require_once 'views/pedido/cart.php';
    }

    public function addCart(){
            if(isset($_GET['id'])) {
                $prodid =$_GET['id'];
                if (isset($_SESSION['cart'])) {
                    $counter = 0;
                    foreach($_SESSION['cart'] as $index=>$element){
                        if($element['id']== $prodid){
                            $_SESSION['cart'][$index]['qty'] += isset($_GET['qty']) ? $_GET['qty']: $_POST['qty'];
                            $counter++;
                        }
                    }

                }
                if(!isset($counter) || $counter == 0){
                    $prod = new Producto();
                    $prod->setId($prodid);
                    $data = $prod->getOne();
                    $data = $data->fetch_object();
                    if(is_object($data)) {
                        $_SESSION['cart'][]= array(
                            'id'=>$data->id,
                            'precio'=>$data->precio,
                            'qty'=> isset($_GET['qty']) ? $_GET['qty']: $_POST['qty'],
                            'producto'=>$data
                        );
                    }
                }

                header('location:'.base_url.'pedido/cart');
            }
            else {
                header('location:' . base_url);
            }
        }

    public function deleteCart(){
            unset($_SESSION['cart']);
            header('location:'.base_url.'pedido/cart');
        }

    public function deleteItem(){
        if(isset($_GET['id'])) {
            foreach($_SESSION['cart'] as $index=>$element) {
                if($element['id'] == $_GET['id']){
                    $_SESSION['cart'][$index]['qty'] = $element['qty']-1;
                    //$element['qty'] = $element['qty'] -1;
                    if($_SESSION['cart'][$index]['qty'] == 0){
                        unset($_SESSION['cart'][$index]);
                    }
                }
            }

        }
        header('location:'.base_url.'pedido/cart');
    }

    public function addItem(){
        if(isset($_GET['id'])) {
            foreach($_SESSION['cart'] as $index=>$element) {
                if($element['id'] == $_GET['id']){
                    $_SESSION['cart'][$index]['qty'] = $element['qty']+1;
                    //$element['qty'] = $element['qty'] +1;
                }
            }

        }
        header('location:'.base_url.'pedido/cart');
    }


}