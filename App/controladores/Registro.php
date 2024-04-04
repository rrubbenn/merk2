<?php
    class Registro extends Controlador{
        public function __construct(){
            $this->RegistroModelo = $this->modelo('RegistroModelo');
        }

        public function index(){

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $usuarionuevo = $_POST;
                
                if ($this->RegistroModelo->registrar($usuarionuevo)){
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