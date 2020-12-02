<?php
class Pedido{
    private $id;
    private $producto_id;
    private $pedido_id;
    private $cantidad;
    private $estado;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getProductoId()
    {
        return $this->producto_id;
    }

    /**
     * @param mixed $producto_id
     */
    public function setProductoId($producto_id)
    {
        $this->producto_id = $producto_id;
    }

    /**
     * @return mixed
     */
    public function getPedidoId()
    {
        return $this->pedido_id;
    }

    /**
     * @param mixed $pedido_id
     */
    public function setPedidoId($pedido_id)
    {
        $this->pedido_id = $pedido_id;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function genPedido($total){
        $sql = "INSERT INTO total VALUES(NULL, {$_SESSION['log']->id}, $total, CURDATE())";
        $query = $this->db->query($sql);
        if($query){
            return true;
        }
        else{
            return false;
        }
    }

    public function lastPedido(){
        $sql = "SELECT LAST_INSERT_ID() as id;";
        return $this->db->query($sql);
    }

    public function indivPedido(){
            $this->db->query("UPDATE productos SET stock = (stock - {$this->getCantidad()}) WHERE id= {$this->getProductoId()}");
            $sql = "INSERT INTO pedido VALUES(NULL, {$this->getProductoId()}, {$this->getCantidad()}, 'Confirmado', {$this->getPedidoId()})";
            $query = $this->db->query($sql);
            if ($query) {
                return true;
            } else {
                return false;
            }

    }

    public function getAllUser(){
        $sql = "SELECT * FROM total WHERE usuario_id = {$_SESSION['log']->id} ORDER BY fecha DESC";
        $query = $this->db->query($sql);
        if($query){
            return $query;
        }
        else{
            return false;
        }
    }

    public function getOne(){
        $sql = "SELECT * FROM pedido WHERE id = {$this->getId()})";
        $query = $this->db->query($sql);
        if($query){
            return $query->fetch_object();
        }
        else{
            return false;
        }
    }

    public function getAllFromPed($pedido){
        $sql = "SELECT * FROM pedido WHERE pedido_id = $pedido";
        $query = $this->db->query($sql);
        if($query){
            return $query;
        }
        else{
            return false;
        }
    }

    public function getAllAdmin(){
        $sql = "SELECT * FROM total ORDER BY id ASC";
        $query = $this->db->query($sql);
        if($query){
            return $query;
        }
        else{
            return false;
        }
    }

    public function updateState(){
        $sql = "UPDATE pedido SET estado = '{$this->getEstado()}' WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);

        if($query){
            return true;
        }
        else{
            return false;
        }
    }
}