<?php
    class Cuenta extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);

            $this->cuentaModelo = $this->modelo('CuentaModelo');

        }

        public function index(){

            $this->datos['roles'] = $this->cuentaModelo->obtenerRoles();

            //$this->datos['enventa'] = $this->cuentaModelo->obtenerEnVenta();
            //$this->datos['vendidos'] = $this->cuentaModelo->obtenerVendidos();
            //$this->datos['compras'] = $this->cuentaModelo->obtenerCompras();
            
            $this-> vista("cuenta", $this->datos);
            
        }

    } 
?>