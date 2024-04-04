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

        public function deleteFavorito($id_producto, $id_usuario){
            $this->db->query("DELETE
                            FROM favorito F
                            WHERE F.id_usuario = :id_usuario AND F.id_producto = :id_producto");

            $this->db->bind(':id_producto',$id_producto);
            $this->db->bind(':id_usuario',$id_usuario);

            if($this->db->execute()) {
    
                return true;
    
            } else {
    
                return false;
    
            }                  
        }

        public function addFavorito($id_producto, $id_usuario){
            $this->db->query("INSERT INTO favorito (id_usuario, id_producto)
                            VALUES (:id_usuario, :id_producto)");

            $this->db->bind(':id_producto',$id_producto);
            $this->db->bind(':id_usuario',$id_usuario);
            

            if($this->db->execute()) {
    
                return true;
    
            } else {
    
                return false;
    
            }                   
        }

    }





?>