<?php
class Usuario{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $db;


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $this->db->real_escape_string($id);
    }


    public function getNombre()
    {
        return $this->nombre;
    }


    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }


    public function getApellidos()
    {
        return $this->apellidos;
    }


    public function setApellidos($apellidos)
    {
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);
    }


    public function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost'=>4]);
    }


    public function setPassword($password)
    {
        $this->password = $this->db->real_escape_string($password);
    }


    public function getRol()
    {
        return $this->rol;
    }


    public function setRol($rol)
    {
        $this->rol = $this->db->real_escape_string($rol);
    }


    public function __construct()
    {
        $this->db = Database::connect();
    }


    public function save(){
        $sql = "INSERT INTO usuarios VALUES (NULL, '{$this->getNombre()}', '{$this->getApellidos()}' , '{$this->getEmail()}', '{$this->getPassword()}', 'cliente')";
        $query =$this->db->query($sql);

        if($query){
            return true;
        }
        else{
            return false;
        }
    }

    public function log($password){
        $sql = "SELECT * FROM usuarios WHERE email = '{$this->getEmail()}'";
        $log = $this->db->query($sql);

        if($log && $log->num_rows == 1){
            $data = $log->fetch_object();

            $crypt = password_verify($password, $data->password);
            if($crypt){
                return $data;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

    public function edit(){
        $sql = "UPDATE usuarios SET nombres = '{$this->getNombre()}', apellidos = '{$this->getApellidos()}' WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);

        if($query){
            return true;
        }
        else{
            return false;
        }
    }

    public function delete(){
        $query = "DELETE FROM usuarios WHERE id = {$this->getId()}";
        $delete = $this->db->query($query);

        if($delete){
            return true;
        }
        else{
            return false;
        }
    }
}