<?php
    class InicioModelo{
        private $db;

        public function __construct(){ 
            $this->db = new Base;
        }

        public function obtenerRoles(){
            $this->db->query("SELECT * FROM rol");

            return $this->db->registros();                    
        }

        public function obtenerProductos(){
            $this->db->query("SELECT p.*,
                                (SELECT ruta 
                                FROM imagenesproducto 
                                WHERE id_producto = p.id_producto 
                                ORDER BY id_imagen ASC 
                                LIMIT 1) AS ruta
                            FROM producto p
                            WHERE NOT EXISTS (
                                SELECT 1
                                FROM venta v
                                WHERE p.id_producto = v.id_producto);");

            return $this->db->registros();                    
        }

    }

?>