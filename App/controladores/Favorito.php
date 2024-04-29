<?php
    class Favorito extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);

            $this->favoritoModelo = $this->modelo('FavoritoModelo');

        }

        public function index(){

            $this->datos['roles'] = $this->favoritoModelo->obtenerRoles();
            $this->datos['categorias'] = $this->favoritoModelo->obtenerCategorias();

            $this->datos['favoritos'] = $this->favoritoModelo->obtenerFavoritos($this->datos['usuarioSesion']->id_usuario);
            
            $this-> vista("favoritos/favoritos", $this->datos);
            
        }

        public function delFavorito($id_producto){

            if ($this->favoritoModelo->deleteFavorito($id_producto, $this->datos['usuarioSesion']->id_usuario)) {
                    
                $this->vistaApi(true);

            } else {

                $this->vistaApi(false);

            }

        }

        public function addFavorito($id_producto){

            if ($this->favoritoModelo->addFavorito($id_producto, $this->datos['usuarioSesion']->id_usuario)) {
                    
                $this->vistaApi(true);

            } else {

                $this->vistaApi(false);

            }

        }
        
    }








?>