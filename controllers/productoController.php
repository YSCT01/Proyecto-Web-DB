<?php
require_once 'models/productoModel.php';
require_once 'models/categoriaModel.php';
class productoController{
    public function test(){
        echo "product Works";
    }

    public function addProduct(){
        Utils::isAdmin();
        $cat = new Categoria();
        $list = $cat->getAll();
        require_once 'views/producto/añadirProducto.php';
    }

    public function addNew(){
        Utils::isAdmin();
        if(isset($_POST)){
            $producto = new Producto();
            $producto->setTitulo($_POST['titulo']);
            $producto->setCategoriaId($_POST['categoria_id']);
            $producto->setDescripcion($_POST['descripcion']);
            $producto->setPrecio($_POST['precio']);
            $producto->setCantidad($_POST['stock']);

            $file = $_FILES['imagen'];
            $fname  = $file['name'];
            $ftype = $file['type'];
            if($ftype == "image/jpg" || $ftype == "image/jpeg" || $ftype == "image/png" || $ftype == "image/gif"){
                if(!is_dir('uploads')){
                    mkdir('uploads', 0777, true);
                }
                move_uploaded_file($file['tmp_name'], 'uploads/'.$fname);
                $producto->setImage($fname);
            }
            $result = $producto->save();
            if($result){
                $_SESSION['añadir'] = "<h1 class='logro'>Producto guardado correctamente</h1>";
            }
            else{
                $_SESSION['añadir'] = "<h1 class='error'>Un error ocurrió, intenta de nuevo</h1>";
            }
            header('location: '.base_url.'producto/addProduct');

        }
    }

    public function editProduct(){
        Utils::isAdmin();
        $producto = new Producto();
        $list = $producto->getAll();
        $cat = new Categoria();
        require_once 'views/producto/listProducts.php';
    }

    public function delete(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $producto = new Producto();
            $deleted = $producto->delete($_GET['id']);
            if($deleted){
                $_SESSION['delete'] = "<h1 class='logro'>Producto eliminado correctamente</h1>";
            }
            else{
                $_SESSION['delete'] = "<h1 class='error'>Un problema ocurrió, intenta de nuevo</h1>";
            }
        }
        header('location:'.base_url.'producto/editProduct');
    }

    public function edit(){
        Utils::isAdmin();
        if(isset($_GET['id'])) {
            $producto = new Producto();
            $cat = new Categoria();
            $list = $cat->getAll();
            $producto->setId($_GET['id']);
            $data = $producto->getOne()->fetch_object();
            require_once 'views/producto/editarForm.php';
        }
    }

    public function editProd(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $product = new Producto();
            $product->setId($_GET['id']);
            $product->setCategoriaId($_POST['categoria_id']);
            $product->setTitulo($_POST['titulo']);
            $product->setDescripcion($_POST['descripcion']);
            $product->setPrecio($_POST['precio']);
            $product->setCantidad($_POST['stock']);

            $file = $_FILES['imagen'];
            $fname = $file['name'];
            $ftype = $file['type'];

            if($ftype == "image/jpg" || $ftype == "image/jpeg" || $ftype == "image/png" || $ftype == "image/gif"){
                if(!is_dir('uploads')){
                    mkdir('uploads', 0777, true);
                }
                move_uploaded_file($file['tmp_name'], 'uploads/'.$fname);
                $product->setImagen($fname);
            }

            $updated = $product->update();
            if($updated){
                $_SESSION['updated'] = "<h1 class='logro'>El producto ha sido actualizado correctamente</h1>";
            }
            else{
                $_SESSION['updated'] = "<h1 class='error'>Un error ocurrió, intenta de nuevo</h1>";
            }
        }
        header('location:'.base_url.'producto/editProduct');
    }

    public function all(){
        $producto = new Producto();
        $list = $producto->getAll();
        require_once 'views/producto/todos.php';
    }

    public function details(){
        if(isset($_GET['id'])){
            $prod = new Producto();
            $prod->setId($_GET['id']);
            $data = $prod->getOne()->fetch_object();
            require_once 'views/producto/oneItem.php';
        }
    }

}