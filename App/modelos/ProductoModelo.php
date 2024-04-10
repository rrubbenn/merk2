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

        public function addVenta($datos, $id_producto, $id_usuario){
            $this->db->query("INSERT INTO venta (id_producto, fecha_venta, id_comprador, nombre, apellidos, provincia, localidad, calle, numerocasa, piso, codigo_postal, nombre_cuenta, numero_cuenta, fecha_cuenta, cvv_cuenta)
            VALUES (:id_producto, NOW(), :id_comprador, :nombre, :apellidos, :provincia, :localidad, :calle, :numerocasa, :piso, :codigo_postal, :nombre_cuenta, :numero_cuenta, :fecha_cuenta, :cvv_cuenta)");

            $this->db->bind(':id_producto', $id_producto);
            $this->db->bind(':id_comprador', $id_usuario);
            $this->db->bind(':nombre', $datos['nombre']);
            $this->db->bind(':apellidos', $datos['apellidos']);
            $this->db->bind(':provincia', $datos['provincia']);
            $this->db->bind(':localidad', $datos['localidad']);
            $this->db->bind(':calle', $datos['calle']);
            $this->db->bind(':numerocasa', $datos['numerocasa']);
            $this->db->bind(':piso', $datos['piso']);
            $this->db->bind(':codigo_postal', $datos['codigo_postal']);
            $this->db->bind(':nombre_cuenta', $datos['nombre_cuenta']);
            $this->db->bind(':numero_cuenta', $datos['numero_cuenta']);
            $this->db->bind(':fecha_cuenta', $datos['fecha_cuenta']);
            $this->db->bind(':cvv_cuenta', $datos['cvv_cuenta']);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
            
        }

        public function addProducto($datos){
            $this->db->query("INSERT INTO producto (id_categoria, nombre_producto, descripcion, precio, id_usuario)
            VALUES (:id_categoria, :nombre_producto, :descripcion, :precio, :id_usuario);");

            $this->db->bind(':id_categoria',$datos['id_categoria']);
            $this->db->bind(':nombre_producto',$datos['nombre_producto']);
            $this->db->bind(':descripcion',$datos['descripcion']);
            $this->db->bind(':precio',$datos['precio']);
            $this->db->bind(':id_usuario',$datos['id_usuario']);
            
            // Ejecutar la consulta y obtener el último ID insertado
            $last_insert_id = $this->db->executeLastId();

            // Verificar si se obtuvo correctamente el último ID insertado
            if ($last_insert_id) {
                return $last_insert_id; // Devolver el ID del producto recién insertado
            } else {
                return false;
            }
            
        }

        public function subirImagenes($imagenes, $id_producto) {
            $target_dir = "/var/www/html/proyecto/public/imgbase/";
            $uploaded_files = array();
        
            // Procesar cada imagen subida
            foreach ($imagenes["tmp_name"] as $key => $tmp_name) {
                $file = basename($imagenes["name"][$key]);
                $pieces = explode(".", $file);
                $max = (count($pieces) - 1);
        
                // Renombrar el archivo para evitar colisiones de nombres
                if (!empty($file)) {
                    $file = time() . "_" . $key . "." . $pieces[$max];
                }
        
                $target_file = $target_dir . $file;
        
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
                // Verificar si el archivo es una imagen válida
                $check = getimagesize($tmp_name);
                if ($check !== false) {
                    // Si es una imagen válida, continuar con la subida
                    $uploadOk = 1;
                } else {
                    echo "El archivo no es una imagen válida.";
                    $uploadOk = 0;
                }
        
                // Verificar si el archivo ya existe
                if (file_exists($target_file)) {
                    echo "Lo siento, el archivo ya existe.";
                    $uploadOk = 0;
                }
        
                // Verificar el tamaño del archivo
                if ($imagenes["size"][$key] > 20971520) {
                    echo "Lo siento, el archivo es demasiado grande.";
                    $uploadOk = 0;
                }
        
                // Permitir solo ciertos formatos de archivo
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
                    $uploadOk = 0;
                }
        
                // Verificar si $uploadOk está establecido en 0 debido a un error
                if ($uploadOk == 0) {
                    echo "Lo siento, tu archivo no se pudo cargar.";
                    // Puedes agregar un manejo de error aquí
                } else {
                    // Si todo está bien, intenta subir el archivo
                    if (move_uploaded_file($tmp_name, $target_file)) {
                        //echo "El archivo " . htmlspecialchars(basename($imagenes["name"][$key])) . " ha sido cargado.";
                        chmod($target_file, 0777);
                        $uploaded_files[] = $file; // Agregar el nombre del archivo a la lista de archivos cargados
                    } else {
                        //echo "Lo siento, hubo un error al cargar tu archivo.";
                    }
                }
            }
        
            // Insertar los nombres de archivo en la base de datos
            foreach ($uploaded_files as $file) {
                // Tu consulta de inserción
                $this->db->query("INSERT INTO imagenesproducto (id_producto, ruta) 
                                    VALUES (:id_producto, :imagen)");

                
            
                // Bind de parámetros
                $this->db->bind(':id_producto', $id_producto);
                $this->db->bind(':imagen', $file);
            
                // Ejecutar la consulta
                if (!$this->db->execute()) {
                    // Si falla la ejecución de alguna de las consultas, retornar falso
                    return false;
                }
            }
            
            // Si todas las consultas se ejecutan correctamente, retornar true
            return true;
            
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
                                producto.*, 
                                CASE 
                                    WHEN venta.id_producto IS NOT NULL THEN TRUE 
                                    ELSE FALSE 
                                END AS existe_en_venta
                            FROM 
                                producto
                            LEFT JOIN 
                                venta ON producto.id_producto = venta.id_producto
                            WHERE 
                                producto.id_producto = :id_producto;
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