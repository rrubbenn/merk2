<?php
    class Inicio extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);

            $this->inicioModelo = $this->modelo('InicioModelo');

        }

        public function index(){
        
            $productos = $this->inicioModelo->obtenerProductos();
        
            $this->datos['productos'] = $productos;
        
            $this->vista("index", $this->datos);
        }

    } 
?>