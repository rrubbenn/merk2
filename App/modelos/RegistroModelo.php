<?php

    class RegistroModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;

        }

        public function registrar($usuarionuevo){

            $this->db->query("INSERT INTO usuario(nombre, apellidos, email, contrasena, telefono, fecha_nacimiento, ciudad, direccion, id_rol)
                                    VALUES (:nombre, :apellidos, :email, sha2(:contrasena, 256), :telefono, :fechanacimiento, :ciudad, :direccion, 2)");

            $this->db->bind(':nombre',$usuarionuevo['nombre']);
            $this->db->bind(':apellidos',$usuarionuevo['apellidos']);
            $this->db->bind(':email',$usuarionuevo['email']);
            $this->db->bind(':contrasena',$usuarionuevo['contrasena']);
            $this->db->bind(':telefono',$usuarionuevo['telefono']);
            $this->db->bind(':fechanacimiento',$usuarionuevo['fechanacimiento']);
            $this->db->bind(':ciudad',$usuarionuevo['ciudad']);
            $this->db->bind(':direccion',$usuarionuevo['direccion']);

            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }
    }

