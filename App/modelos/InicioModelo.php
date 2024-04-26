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

        public function obtenerProductos($pagina, $por_pagina){

            $offset = ($pagina - 1) * $por_pagina; // Calcular el desplazamiento

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
                                WHERE p.id_producto = v.id_producto)
                            LIMIT :por_pagina OFFSET :offset;");

            $this->db->bind(':por_pagina', $por_pagina);
            $this->db->bind(':offset', $offset);
        
            $productos = $this->db->registros();

            // Verificar si se obtuvieron productos
            if (!empty($productos)) {
                return $productos;
            } else {
                // Si no se encontraron productos, devolver un array vacío
                return array();
            }              
        }

        public function obtenerCategorias() {

            $this->db->query("SELECT *
                            FROM categoria c");
        
            return $this->db->registros();  

        }

        public function totalProductos(){
            $this->db->query("SELECT 
                                COUNT(*) as total 
                            FROM producto p 
                            WHERE NOT EXISTS 
                                    (SELECT 1 
                                    FROM venta v 
                                    WHERE p.id_producto = v.id_producto)");

            $resultado = $this->db->registro();
        
            return $resultado->total;
        }

    }

?>