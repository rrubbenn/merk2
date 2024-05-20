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

        public function obtenerCategorias(){
            $this->db->query("SELECT * FROM categoria");

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

        public function obtenerUltimosProductos(){

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
                            ORDER BY p.fecha_subida DESC
                            LIMIT 5;");

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

        public function totalProductosBusqueda($datos){
            $this->db->query("SELECT 
                                COUNT(*) as total 
                            FROM producto p 
                            LEFT JOIN venta v ON p.id_producto = v.id_producto
                            WHERE (p.nombre_producto LIKE :busqueda OR p.descripcion LIKE :busqueda)
                            AND v.id_producto IS NULL");

            $this->db->bind(':busqueda', $datos);

            $resultado = $this->db->registro();
        
            return $resultado->total;
        }

        public function totalProductosCategoria($datos){
            $this->db->query("SELECT 
                                COUNT(*) as total 
                            FROM producto p
                            INNER JOIN categoria c
                            ON p.id_categoria = c.id_categoria
                            WHERE c.id_categoria = :busqueda
                            AND NOT EXISTS 
                                (SELECT 1 
                                FROM venta v 
                                WHERE p.id_producto = v.id_producto)");

            $this->db->bind(':busqueda', $datos);

            $resultado = $this->db->registro();
        
            return $resultado->total;
        }

        public function buscarProductos($datos, $pagina, $por_pagina){

            $offset = ($pagina - 1) * $por_pagina;

            $this->db->query("SELECT *, 
                                (SELECT ruta 
                                FROM imagenesproducto 
                                WHERE id_producto = p.id_producto 
                                ORDER BY id_imagen ASC 
                                LIMIT 1) AS ruta
                                FROM producto p
                                WHERE p.nombre_producto 
                                    LIKE :busqueda
                                OR p.descripcion 
                                    LIKE :busqueda
                                AND NOT EXISTS 
                                    (SELECT 1 
                                    FROM venta v 
                                    WHERE p.id_producto = v.id_producto)
                                LIMIT :por_pagina OFFSET :offset;");

            $this->db->bind(':busqueda', $datos);
            $this->db->bind(':por_pagina', $por_pagina);
            $this->db->bind(':offset', $offset);

            $resultados = $this->db->registros();   

            if ($resultados) {
                return $resultados;
            } else {
                return array(); // Devolver un array vacío si no hay resultados
            }
        }

        public function buscarCategoria($datos, $pagina, $por_pagina){

            $offset = ($pagina - 1) * $por_pagina;

            $this->db->query("SELECT p.*, 
                                (SELECT ruta 
                                FROM imagenesproducto 
                                WHERE id_producto = p.id_producto 
                                ORDER BY id_imagen ASC 
                                LIMIT 1) AS ruta
                                FROM producto p
                                INNER JOIN categoria c
                                ON p.id_categoria = c.id_categoria
                                WHERE c.id_categoria = :busqueda
                                AND NOT EXISTS 
                                    (SELECT 1 
                                    FROM venta v 
                                    WHERE p.id_producto = v.id_producto)
                                LIMIT :por_pagina OFFSET :offset;");

            $this->db->bind(':busqueda', $datos);
            $this->db->bind(':por_pagina', $por_pagina);
            $this->db->bind(':offset', $offset);

        
            $resultados = $this->db->registros();   

            if ($resultados) {
                return $resultados;
            } else {
                return array(); // Devolver un array vacío si no hay resultados
            }     
        }

    }

?>