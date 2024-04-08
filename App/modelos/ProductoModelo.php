<?php
    class ProductoModelo{
        private $db;

        public function __construct(){ 
            $this->db = new Base;
        }

        public function obtenerRoles(){
            $this->db->query("SELECT * FROM rol");

            return $this->db->registros();                    
        }

        public function obtenerInformacionPerfil($id_usuario){

            $this->db->query("SELECT * FROM usuario where id_usuario = :id_usuario");

            $this->db->bind(':id_usuario',$id_usuario);

            return $this->db->registro();                    
        }

        public function obtenerProductos($id_usuario){
            $this->db->query("SELECT *
            FROM producto p
            WHERE id_usuario = :id_usuario AND NOT EXISTS (
                SELECT 1
                FROM venta v
                WHERE p.id_producto = v.id_producto) ");

            $this->db->bind(':id_usuario',$id_usuario);

            return $this->db->registros();                    
        }

        public function obtenerVentas($id_usuario){
            $this->db->query("SELECT 
                                P.id_producto,
                                P.nombre_producto,
                                P.descripcion,
                                P.precio
                            FROM 
                                producto P
                                INNER JOIN venta V ON P.id_producto = V.id_producto
                            WHERE 
                                P.id_usuario = :id_usuario
                                AND V.id_comprador IS NOT NULL");

            $this->db->bind(':id_usuario',$id_usuario);

            return $this->db->registros();                    
        }

        public function obtenerCompras($id_usuario){
            $this->db->query("SELECT 
                                P.id_producto,
                                P.nombre_producto,
                                P.descripcion,
                                P.precio
                            FROM 
                                producto P
                                INNER JOIN venta V ON P.id_producto = V.id_producto
                            WHERE 
                                V.id_comprador = :id_usuario");

            $this->db->bind(':id_usuario',$id_usuario);

            return $this->db->registros();                    
        }

        public function editProducto($datos){
            $this->db->query("UPDATE  
                                producto
                            SET
                                id_categoria = :id_categoria,
                                nombre_producto = :nombre_producto,
                                descripcion = :descripcion,
                                precio = :precio
                            WHERE
                                id_producto = :id_producto AND id_usuario = :id_usuario");

            $this->db->bind(':id_usuario',$datos['id_usuario']);
            $this->db->bind(':id_producto',$datos['id_producto']);
            $this->db->bind(':id_categoria',$datos['id_categoria']);
            $this->db->bind(':nombre_producto',$datos['nombre_producto']);
            $this->db->bind(':descripcion',$datos['descripcion']);
            $this->db->bind(':precio',$datos['precio']);

            if ($this->db->execute()) {

                return true;

            }else{

                return false;

            }     
            
        }

        public function getDatosProducto($datos) {

            $this->db->query("SELECT * FROM producto WHERE id_producto = :id_producto");
    
            $this->db->bind(':id_producto',$datos['id_producto']);
    
            return $this->db->registro();
    
        }

        public function delProducto($datos){
            $this->db->query("DELETE
                            FROM producto P
                            WHERE P.id_producto = :id_producto AND P.id_usuario = :id_usuario");

            $this->db->bind(':id_producto',$datos['id_producto']);
            $this->db->bind(':id_usuario',$datos['id_usuario']);

            if ($this->db->execute()) {

                return true;

            }else{

                return false;

            }                 
        }

        public function getCategorias(){
            $this->db->query("SELECT 
                                *
                            FROM 
                                categoria");

            return $this->db->registros();                    
        }

        // Vista producto por ID
        public function getProducto($id_producto){
            
            $this->db->query("SELECT 
                                *
                            FROM 
                                producto
                            WHERE
                                id_producto = :id_producto
                            ");

            $this->db->bind(':id_producto',$id_producto);

            return $this->db->registro();                    
        }

        public function getVendedorProducto($id_producto){
            
            $this->db->query("SELECT 
                                producto.*, usuario.*
                            FROM 
                                producto
                            INNER JOIN
                                usuario
                            ON
                                producto.id_usuario = usuario.id_usuario
                            WHERE
                                producto.id_producto = :id_producto;
                            ");

            $this->db->bind(':id_producto',$id_producto);

            return $this->db->registro();                    
        }

        public function getFavoritoUsuario($id_producto, $id_usuario) {

            $this->db->query("SELECT 
                                CASE 
                                    WHEN EXISTS (
                                        SELECT 1
                                        FROM favorito
                                        WHERE id_usuario = :id_usuario AND id_producto = :id_producto
                                    ) THEN 'true'
                                    ELSE 'false'
                                END AS esFavorito;");
    
            $this->db->bind(':id_producto',$id_producto);
            $this->db->bind(':id_usuario',$id_usuario);
    
            return $this->db->registro();

        }

    }

?>