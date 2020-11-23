<?php
require_once 'models/productoModel.php';
require_once 'models/categoriaModel.php';
class categoriaController{
    public function test(){
        echo "product Works";
    }


    public function smartphone(){
        $category = new Categoria();
        $category->setTitulo('Smartphone');
        $cat = $category->getOne();
        $producto = new Producto();
        $list = $producto->getByCat($cat->id);
        require_once 'views/categoria/showAll.php';
    }

    public function tablet(){
        $category = new Categoria();
        $category->setTitulo('Tablet');
        $cat = $category->getOne();
        $producto = new Producto();
        $list = $producto->getByCat($cat->id);
        require_once 'views/categoria/showAll.php';
    }
    public function laptop(){
        $category = new Categoria();
        $category->setTitulo('Laptop');
        $cat = $category->getOne();
        $producto = new Producto();
        $list = $producto->getByCat($cat->id);
        require_once 'views/categoria/showAll.php';
    }
    public function watch(){
        $category = new Categoria();
        $category->setTitulo('Watch');
        $cat = $category->getOne();
        $producto = new Producto();
        $list = $producto->getByCat($cat->id);
        require_once 'views/categoria/showAll.php';
    }

    public function otros(){
        $category = new Categoria();
        $category->setTitulo('Otros');
        $cat = $category->getOne();
        $producto = new Producto();
        $list = $producto->getByCat($cat->id);
        require_once 'views/categoria/showAll.php';
    }

}