<?php
    class Valoraciones extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);

            $this->valoracionesModelo = $this->modelo('ValoracionesModelo');

        }

        public function index($id_usuario){

            //$this->datos['roles'] = $this->valoracionesModelo->obtenerRoles();
            $this->datos['categorias'] = $this->valoracionesModelo->obtenerCategorias();
            $this->datos['valoraciones'] = $this->valoracionesModelo->getValoraciones($id_usuario);

            $this->vista("valoraciones/valoraciones", $this->datos);
            
        }
    
        public function addvaloracion(){

            if($_SERVER['REQUEST_METHOD']=='POST'){

                $datos = $_POST;

                if ($this->valoracionesModelo->addValoracion($datos)) {

                    redireccionar("/productos/compras/".$datos['id_usuario']);
                
                }else{
                
                    echo "error";
                
                }
            }
        }
        
    }