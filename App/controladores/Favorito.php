<?php
    class Favorito extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);

            $this->favoritoModelo = $this->modelo('FavoritoModelo');

        }

        public function index(){

            $this->datos['roles'] = $this->favoritoModelo->obtenerRoles();

            $this->datos['favoritos'] = $this->favoritoModelo->obtenerFavoritos($this->datos['usuarioSesion']->id_usuario);
            
            $this-> vista("favoritos/favoritos", $this->datos);
            
        }

        public function delFavorito(){

            if ($this->favoritoModelo->deleteFavorito($datos)) {
                    
                redireccionar("/favorito");

            }else{

                echo "error";

            }

        }

        public function addFavorito(){

            if ($this->favoritoModelo->addFavorito($datos)) {
                    
                redireccionar("/favorito");

            }else{

                echo "error";

            }

        }
        





        
    }








?>