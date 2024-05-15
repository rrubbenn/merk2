<?php
    class AvisoLegal extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);

        }

        public function index(){

            $this-> vista("paginas/avisolegal", $this->datos);
            
        }

    }