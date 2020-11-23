<?php
require_once 'config/db.php';
class Categoria{
    private $id;
    private $titulo;
    private $db;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }



    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getOne(){
        $sql = "SELECT * FROM categorias WHERE titulo = '{$this->getTitulo()}'";

        $query = $this->db->query($sql);
        if($query){
            return $query->fetch_object();
        }
        else{
            return false;
        }
    }

    public function getAll(){
        $sql ="SELECT * FROM categorias";

        $query = $this->db->query($sql);

        return $query;
    }

    public function getByID($cat){
        $sql = "SELECT titulo FROM categorias WHERE id = $cat";

        $query = $this->db->query($sql);

        return $query;
    }
}
