<?php
    class PerfilModelo{
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

        public function obtenerInformacionPerfil($id_usuario){

            $this->db->query("SELECT * FROM usuario where id_usuario = :id_usuario");

            $this->db->bind(':id_usuario',$id_usuario);

            return $this->db->registro();                    
        }

        public function obtenerEnVentaUsuario($id_usuario){

            $this->db->query("SELECT p.*, ip.ruta AS ruta
                            FROM producto p
                            LEFT JOIN imagenesproducto ip ON p.id_producto = ip.id_producto
                            WHERE p.id_usuario = :id_usuario 
                            AND NOT EXISTS (
                                SELECT 1    
                                FROM venta v
                                WHERE p.id_producto = v.id_producto
                            );");

            $this->db->bind(':id_usuario',$id_usuario);

            return $this->db->registros();   

        }

        public function obtenerVendidosUsuario($id_usuario){

            $this->db->query("SELECT p.*, ip.ruta AS ruta
                            FROM producto p
                            LEFT JOIN imagenesproducto ip ON p.id_producto = ip.id_producto
                            WHERE p.id_usuario = :id_usuario 
                            AND EXISTS (
                                SELECT 1
                                FROM venta v
                                WHERE p.id_producto = v.id_producto
                            );");

            $this->db->bind(':id_usuario',$id_usuario);

            return $this->db->registros();   

        }

        public function enviarEditarModelo($datos, $id_usuario) {

            $this->db->query("UPDATE usuario 
            SET nombre = :nombre, apellidos = :apellidos, email = :email,
            telefono = :telefono, fecha_nacimiento = :fecha_nacimiento, ciudad = :ciudad, direccion = :direccion
            where id_usuario = :id_usuario");

            $this->db->bind(':id_usuario',$id_usuario);
            $this->db->bind(':nombre',$datos['nombre']);
            $this->db->bind(':apellidos',$datos['apellidos']);
            $this->db->bind(':email',$datos['email']);
            $this->db->bind(':telefono',$datos['telefono']);
            $this->db->bind(':fecha_nacimiento',$datos['fecha_nacimiento']);
            $this->db->bind(':ciudad',$datos['ciudad']);
            $this->db->bind(':direccion',$datos['direccion']);

            if($this->db->execute()) {
    
                return true;
    
            } else {
    
                return false;
    
            }

        }

        public function subirImagen($datos, $id_usuario) {

            $target_dir = "/var/www/html/proyecto/public/imgbase/";
            $file = basename($_FILES["imagen"]["name"]);
            $pieces = explode(".", $file);
            $max = (count($pieces) - 1);
            $pieces[$max];

            if (!empty($file)) {
                $file = time().".". $pieces[$max];
            }

            $target_file = $target_dir . $file;

            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["imagen"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["imagen"]["size"] > 20971520) {
                echo "Sorry, your file is too large. A total of: ".$_FILES["imagen"]["size"];
                $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["imagen"]["name"])). " has been uploaded.";
                    chmod('/var/www/html/proyecto/public/imgbase/'.$file, 0777);
                } else {
                echo "Sorry, there was an error uploading your file.";
                //exit();
                }   
            }

            $this->db->query("UPDATE usuario 
                                SET imagen_perfil = :imagen
                                where id_usuario = :id_usuario");
            
            $this->db->bind(':id_usuario',$id_usuario);
            $this->db->bind(':imagen',$file);

            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }

        public function comprobarPass($pass, $id_usuario) {
            
            $this->db->query("SELECT contrasena FROM usuario where contrasena = sha2(:contrasena,256) and id_usuario = :id_usuario");

            $this->db->bind(':id_usuario',$id_usuario);
            $this->db->bind(':contrasena',$pass);

            if($this->db->rowCount()>=1) {
    
                return true;
    
            } else {
    
                return false;
    
            }

        }

        public function cambiarPass($pass, $id_usuario) {
            
            $this->db->query("UPDATE usuario 
            SET contrasena = sha2(:contrasena,256)
            where id_usuario = :id_usuario");

            $this->db->bind(':id_usuario',$id_usuario);
            $this->db->bind(':contrasena',$pass);

            if($this->db->execute()) {
    
                return true;
    
            } else {
    
                return false;
    
            }

        }

    }

?>