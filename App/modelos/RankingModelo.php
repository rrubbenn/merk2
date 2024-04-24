<?php
    class RankingModelo{
        private $db;

        public function __construct(){ 
            $this->db = new Base;
        }

        public function obtenerRoles(){
            $this->db->query("SELECT * FROM rol");

            return $this->db->registros();                    
        }

        public function getVentas(){

            $this->db->query("SELECT u.id_usuario, u.nombre, u.apellidos, v.fecha_venta, c.id_categoria, v.id_venta, va.puntuacion
                                FROM usuario u
                                JOIN venta v ON u.id_usuario = v.id_comprador
                                LEFT JOIN valoracion va ON v.id_venta = va.id_venta
                                JOIN producto p ON v.id_producto = p.id_producto
                                JOIN categoria c ON p.id_categoria = c.id_categoria
                                WHERE u.ranking = 'si' AND v.fecha_venta >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR);
                            ");
        
            return $this->db->registros(); 
                    
        }

        public function editarRanking($datos){

            $this->db->query("UPDATE usuario SET ranking = :ranking where id_usuario = :id_usuario");

            $this->db->bind(':ranking',$datos['ranking']);
            $this->db->bind(':id_usuario',$datos['id_usuario']);

            if($this->db->execute()) {
    
                return true;
    
            } else {
    
                return false;
    
            }
            
        }

        public function getCategorias(){

            $this->db->query("SELECT * FROM categoria");

            return $this->db->registros();                    
        }

    }

?>