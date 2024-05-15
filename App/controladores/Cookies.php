<?php
    class Cookies extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);

        }

        public function index(){

            $this-> vista("paginas/cookies", $this->datos);
            
        }

    }