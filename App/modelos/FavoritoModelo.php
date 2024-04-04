<?php
    class FavoritoModelo{
        private $db;

        public function __construct(){ 
            $this->db = new Base;
        }

        public function obtenerRoles(){
            $this->db->query("SELECT * FROM rol");

            return $this->db->registros();                    
        }

        public function obtenerFavoritos($id_usuario){
            $this->db->query("SELECT * 
                            FROM favorito F
                            INNER JOIN producto P ON F.id_producto = P.id_producto
                            WHERE F.id_usuario = :id_usuario");

            $this->db->bind(':id_usuario',$id_usuario);

            return $this->db->registros();                    
        }

        public function deleteFavorito($datos){
            $this->db->query("DELETE * 
                            FROM favorito F
                            WHERE F.id_usuario = :id_usuario AND F.id_producto = :id_producto");

            $this->db->bind(':id_usuario',$datos['id_usuario']);
            $this->db->bind(':id_usuario',$datos['id_producto']);

            return $this->db->registros();                    
        }

        public function addFavorito($datos){
            $this->db->query("INSERT INTO favorito (id_usuario, id_producto)
                            VALUES (:id_usuario, :id_producto)");

            $this->db->bind(':id_usuario',$datos['id_usuario']);
            $this->db->bind(':id_producto',$datos['id_producto']);

            return $this->db->registros();                    
        }

    }





?>