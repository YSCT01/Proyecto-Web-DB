<?php
class mainController{
    public function index(){
      require_once 'views/index/main.php';
    }

    public function nosotros(){
        require_once 'views/index/nosotros.php';
    }

    public function contacto(){
        require_once 'views/index/contacto.php';
    }

    public function login(){
       require_once 'views/index/login.php';
    }

    public function signup(){
        require_once 'views/index/signup.php';
    }

    public function sendEmail(){
        if(isset($_POST)){
            $sendto ="yaredch@hotmail.com";
            $subject = "Correo desde formulario";
            $emailfrom ="formyaredblog@gmail.com";
            $mensaje = "Detalles de formulario:\n";
            $mensaje.= "Nombre: ".$_POST['name']." ".$_POST['lastname']."\n";
            $mensaje.= "Email: ".$_POST['email']."\n";
            $mensaje.= "Mensaje: ".$_POST['message']."\n";

            $headers = "From: ".$_POST['email']."\n";
            $headers .= "Reply-To: ".$_POST['email']."\n";
            $headers .= "X-Mailer: PHP/".phpversion();

            mail($sendto, $subject, $mensaje, $headers);

            echo "<script>alert('Mensaje enviado correctamente')</script>";
            header('location:'.base_url.'main/contacto');
        }
    }

}