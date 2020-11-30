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

    public function profile(){
        if(isset($_SESSION['log'])) {
            require_once 'views/usuario/perfil.php';
        }
        else{
            header('location:'.base_url);
        }
    }

    public function editData(){
       require_once 'views/usuario/editData.php';
    }

    public function edit(){
        $user = new Usuario();
        $user->setNombre($_POST['nombre']);
        $user->setApellidos($_POST['apellido']);
        $user->setId($_SESSION['log']->id);
        $edited = $user->edit();
        if($edited){
            $_SESSION['editado'] = "<h1 class='logro'>Datos actualizados correctamente</h1>";
            $_SESSION['log']->nombres = $user->getNombre();
            $_SESSION['log']->apellidos = $user->getApellidos();

        }
        else{
            $_SESSION['editado'] = "<h1 class='error'>Algo salió mal, intenta de nuevo</h1>";
        }

        header('location:'.base_url.'usuario/editData');
    }

    public function delete(){
        $user = new Usuario();
        $user->setId($_SESSION['log']->id);
        $user->delete();
        header('location:'.base_url.'usuario/logout');
    }

}