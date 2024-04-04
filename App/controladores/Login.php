<?php
    class Login extends Controlador{
        public function __construct(){
            $this->LoginModelo = $this->modelo('LoginModelo');
        }

        public function index($error = ''){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $datos = $_POST;
                $this->datos['usuario'] = trim($_POST['usuario']);
                $this->datos['contrasena'] = trim($_POST['contrasena']);
    
                $usuarioSesion = $this->LoginModelo->login($this->datos);
    
                if (isset($usuarioSesion) && !empty($usuarioSesion)) {
                    Sesion::crearSesion($usuarioSesion);
                    redireccionar('/');
                }
                else{
                    redireccionar('/login/index/error_1');
                }
            }
            else{
                
                if (Sesion::sesionCreada()) {
                    redireccionar('/');
                }
                $this->datos['error'] = $error;
    
                $this->vista('login', $this->datos);
            }
        }

        public function logout(){
            Sesion::cerrarSesion();
            redireccionar('/');
        }


        public function registrarse(){

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $newuser = $_POST;
                
                if ($this->LoginModelo->registrar($newuser)){
                    redireccionar("/Login");
    
                }else{
                    echo "se ha producido un error";
                }
            }else{
                $this->vista('registro', $this->datos);

            }
        }
    } 
?> 