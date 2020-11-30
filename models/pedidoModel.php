<?php
class pedidoModel{
    private $id;
    private $producto_id;
    private $usuario_id;
    private $fecha;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getProductoId()
    {
        return $this->producto_id;
    }


    public function setProductoId($producto_id)
    {
        $this->producto_id = $producto_id;
    }

    public function getUsuarioId()
    {
        return $this->usuario_id;
    }


    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }


    public function getFecha()
    {
        return $this->fecha;
    }


    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }


}