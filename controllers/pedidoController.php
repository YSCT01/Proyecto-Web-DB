<?php
require_once 'models/pedidoModel.php';
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

    public function comprar(){
        if(isset($_SESSION['log'])) {
            $pedido = new Pedido();
            $total = Utils::getCarrito()['total'];
            $pedido->genPedido($total);
            $confirmed = $pedido->lastPedido()->fetch_object();
            if($total){
                foreach ($_SESSION['cart'] as $index=>$element){
                    $pedido->setProductoId($element['id']);
                    $pedido->setCantidad($element['qty']);
                    $pedido->setPedidoId($confirmed->id);
                   $pedido->indivPedido();
                }
                unset($_SESSION['cart']);
                header('location:'.base_url.'pedido/confirmado');
            }else{
                $_SESSION['inises'] = "<h1 class='error'>Algo salió mal, intenta de nuevo</h1>";
                header('location:'.base_url.'pedido/cart');
            }

        }
        else{
            $_SESSION['inises'] = "<h1 class='error'>Inicia sesión primero para poder continuar</h1>";
            header('location:'.base_url.'pedido/cart');
        }
    }

    public function confirmado(){
        require_once 'views/pedido/realizado.php';
    }

    public function all(){
        $ped = new Pedido();
        $list = $ped->getAllUser();

        require_once 'views/pedido/all.php';
    }

    public function detailed(){
        $id_total = $_GET['id'];
        $ped = new Pedido();
        $list = $ped->getAllFromPed($id_total);
        require_once 'views/pedido/details.php';
    }

    public function administrate(){
        Utils::isAdmin();
        $ped = new Pedido();
        $list = $ped->getAllAdmin();

        require_once 'views/pedido/administrat.php';
    }

    public function edit(){
        Utils::isAdmin();
        $id_total = $_GET['id'];
        $ped = new Pedido();
        $list = $ped->getAllFromPed($id_total);
        require_once 'views/pedido/edit.php';
    }

    public function update(){
        Utils::isAdmin();
        $ped = new Pedido();
        $ped->setEstado($_POST['status']);
        $ped->setId($_POST['id']);
        $update = $ped->updateState();
        if($update){
            $_SESSION['status']= "<h1 class='logro'>Estado de pedido actualizado correctamente</h1>";
        }
        else{
            $_SESSION['status']= "<h1 class='error'>Algo salió mal, intenta de nuevo</h1>";
        }
        header('location:'.base_url.'pedido/edit&id='.$_POST['total']);
    }

}