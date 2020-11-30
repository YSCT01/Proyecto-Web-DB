<?php
class Producto{
private $id;
private $categoria_id;
private $titulo;
private $descripcion;
private $precio;
private $cantidad;
private $image;
private $db;

public function getId()
{
return $this->id;
}

public function setId($id)
{
$this->id = $this->db->real_escape_string($id);
}

public function getCategoriaId()
{
return $this->categoria_id;
}

public function setCategoriaId($categoria_id)
{
$this->categoria_id = $this->db->real_escape_string($categoria_id);
}

public function getTitulo()
{
return $this->titulo;
}

public function setTitulo($titulo)
{
$this->titulo = $this->db->real_escape_string($titulo);
}

public function getDescripcion()
{
return $this->descripcion;
}

public function setDescripcion($descripcion)
{
$this->descripcion = $this->db->real_escape_string($descripcion);
}

public function getPrecio()
{
return $this->precio;
}

public function setPrecio($precio)
{
$this->precio = $this->db->real_escape_string($precio);
}

public function getCantidad()
{
return $this->cantidad;
}

public function setCantidad($cantidad)
{
$this->cantidad = $this->db->real_escape_string($cantidad);
}

public function getImage()
{
return $this->image;
}

public function setImage($image)
{
$this->image = $this->db->real_escape_string($image);
}



public function __construct(){
$this->db = Database::connect();
}

    public function getByCat($category){
        $sql = "SELECT * FROM productos WHERE categoria_id = $category";
        $query = $this->db->query($sql);
        if($query){
            return $query;
        }
        else{
            return false;
        }
    }

    public function save(){
        $sql = "INSERT INTO productos VALUES(NULL, {$this->getCategoriaId()},'{$this->getTitulo()}', '{$this->getDescripcion()}', {$this->getPrecio()}, {$this->getCantidad()}, '{$this->getImage()}')";

        $query = $this->db->query($sql);

        if($query){
            return true;
        }
        else{
            return false;
        }
    }

    public function getAll(){
        $sql ="SELECT * FROM productos";

        $query = $this->db->query($sql);

        if($query){
            return $query;
        }
        else{
            return false;
        }
    }

    public function delete($id){
        $sql = "DELETE FROM productos WHERE id = $id";

        $query = $this->db->query($sql);

        if($query){
            return true;
        }
        else{
            return false;
        }
    }

    public function getOne(){
        $sql = "SELECT * FROM productos WHERE id = {$this->getId()}";

        $query = $this->db->query($sql);
        if($query){
            return $query;
        }
        else{
            return false;
        }
    }

    public function update(){
        $sql = "UPDATE productos SET categoria_id = {$this->getCategoriaId()}, titulo = '{$this->getTitulo()}', descripcion = '{$this->getDescripcion()}', precio = {$this->getPrecio()}, stock={$this->getCantidad()}";
        if($this->getImage() != NULL && !empty($this->getImage())){
            $sql .= ", imagen='{$this->getImage()}'";
        }
        $sql.= " WHERE id = {$this->getId()};";

        $update = $this->db->query($sql);

        if($update){

            return true;
        }else{

            return false;
        }
    }

}
