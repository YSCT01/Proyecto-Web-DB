<?php
class Producto{
private $id;
private $categoria_id;
private $titulo;
private $descripcion;
private $precio;
private $tamaño;
private $cantidad;
private $image;
private $db;

public function getId()
{
return $this->id;
}

public function setId($id)
{
$this->id = $id;
}

public function getCategoriaId()
{
return $this->categoria_id;
}

public function setCategoriaId($categoria_id)
{
$this->categoria_id = $categoria_id;
}

public function getTitulo()
{
return $this->titulo;
}

public function setTitulo($titulo)
{
$this->titulo = $titulo;
}

public function getDescripcion()
{
return $this->descripcion;
}

public function setDescripcion($descripcion)
{
$this->descripcion = $descripcion;
}

public function getPrecio()
{
return $this->precio;
}

public function setPrecio($precio)
{
$this->precio = $precio;
}

public function getTamaño()
{
return $this->tamaño;
}

public function setTamaño($tamaño)
{
$this->tamaño = $tamaño;
}

public function getCantidad()
{
return $this->cantidad;
}

public function setCantidad($cantidad)
{
$this->cantidad = $cantidad;
}

public function getImage()
{
return $this->image;
}

public function setImage($image)
{
$this->image = $image;
}


/*
public function __construct(){
$this->db = Database::connect();
}
*/

}
