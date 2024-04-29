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
                                P.nombre_producto,
                                P.id_usuario,
                                IP.ruta AS imagen_producto,
                                U.id_usuario,
                                U.nombre AS nombre_comprador,
                                V.puntuacion,
                                V.comentario,
                                V.fecha_valoracion
                            FROM 
                                producto P
                                INNER JOIN venta Vn ON P.id_producto = Vn.id_producto
                                INNER JOIN valoracion V ON Vn.id_venta = V.id_venta
                                INNER JOIN usuario U ON Vn.id_comprador = U.id_usuario
                                INNER JOIN imagenesproducto IP ON P.id_producto = IP.id_producto
                            WHERE
                                P.id_usuario = :id_usuario");



            $this->db->bind(':id_usuario',$id_usuario);

            return $this->db->registros();   
            
        }


        
    } 