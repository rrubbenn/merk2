<?php
    class ValoracionesModelo{
        private $db;

        public function __construct(){ 
            $this->db = new Base;
        }

        public function obtenerCategorias(){
            $this->db->query("SELECT * FROM categoria");

            return $this->db->registros();                    
        }


        public function getValoraciones($id_usuario){

            $this->db->query("SELECT 
                                p.nombre_producto,
                                p.id_usuario AS id_usuario_vendedor,
                                uv.nombre AS nombre_vendedor,
                                uv.apellidos AS apellidos_vendedor,
                                ip.ruta AS ruta,
                                u.nombre AS nombre_comprador,
                                u.apellidos AS apellidos_comprador,
                                vr.puntuacion,
                                vr.comentario,
                                vr.fecha_valoracion
                            FROM 
                                producto p
                            JOIN 
                                venta v ON p.id_producto = v.id_producto
                            JOIN 
                                usuario uv ON p.id_usuario = uv.id_usuario -- Usuario que vende el producto
                            JOIN 
                                usuario u ON v.id_comprador = u.id_usuario -- Usuario que compra el producto
                            LEFT JOIN 
                                valoracion vr ON v.id_venta = vr.id_venta
                            LEFT JOIN 
                                imagenesproducto ip ON p.id_producto = ip.id_producto
                            WHERE 
                                uv.id_usuario = :id_usuario");



            $this->db->bind(':id_usuario',$id_usuario);

            return $this->db->registros();   
            
        }

        public function addValoracion($datos){
        
            $this->db->query("INSERT INTO valoracion (id_venta, puntuacion, comentario, fecha_valoracion)
            VALUES (:id_venta, :puntuacion, :comentario, NOW())");

            $this->db->bind(':id_venta', $datos['id_venta']);
            $this->db->bind(':puntuacion', $datos['puntuacion']);
            $this->db->bind(':comentario', $datos['comentario']);

            //$last_insert_id = $this->db->executeLastId();

            // Verificar si se obtuvo correctamente el último ID insertado
            //if ($last_insert_id) {
                //return $last_insert_id; // Devolver el ID del producto recién insertado
            //} else {
            //    return false;
            //}

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        
        }

        
    } 