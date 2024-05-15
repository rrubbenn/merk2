<?php
    class Politica extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);

        }

        public function index(){

            $this-> vista("paginas/politica", $this->datos);
            
        }

    }