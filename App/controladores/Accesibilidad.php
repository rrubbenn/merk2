<?php
    class Accesibilidad extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);

        }

        public function index(){

            $this-> vista("paginas/accesibilidad", $this->datos);
            
        }

    }