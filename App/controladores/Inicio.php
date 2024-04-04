<?php
    class Inicio extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);

            $this->inicioModelo = $this->modelo('InicioModelo');

        }

        public function index(){

            $this->datos['roles'] = $this->inicioModelo->obtenerRoles();

            $this->datos['productos'] = $this->inicioModelo->obtenerProductos();

            $this-> vista("index", $this->datos);


        }

    } 
?>