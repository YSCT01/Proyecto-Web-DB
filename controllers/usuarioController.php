<?php
require_once 'models/usuarioModel.php';
class usuarioController{
    public function test(){
        echo "Usuario Works";
    }

    public function signUp(){
        if(isset($_POST)){
            $user = new Usuario();
            $user->setNombre($_POST['nombre']);
            $user->setApellidos($_POST['apellido']);
            $user->setEmail($_POST['correo']);
            $user->setPassword($_POST['password']);

            if($_POST['password'] != $_POST['confirm']){
                $_SESSION['registro']="<span class='error'>Las contraseñas no coinciden</span>";
            }
            else{
                $register = $user->save();
                if($register){
                    $_SESSION['registro']="<span class='logro'>Usuario registrado correctamente</span>";
                }
                else{
                    $_SESSION['registro']="<span class='error'>El correo ya está registrado</span>";
                }
            }
        }
        header('location: '.base_url.'main/signup');
    }

    public function logIn(){
        if(isset($_POST)){
            $user = new Usuario();

            $user->setEmail($_POST['correo']);
            $password = $_POST['password'];

            $logged = $user->log($password);

            if($logged != false){
                $_SESSION['log'] = $logged;
                header('location:'.base_url);
            }
            else{
                $_SESSION['login'] = "<span class='error'>La contraseña es incorrecta</span>";
                header('location:'.base_url.'main/login');
            }
        }
    }

    public function logOut(){
        if(isset($_SESSION['log'])){
            unset($_SESSION['log']);
        }
        header('location: '.base_url);
    }

}