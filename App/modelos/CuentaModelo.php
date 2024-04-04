<?php
    class CuentaModelo{
        private $db;

        public function __construct(){ 
            $this->db = new Base;
        }

        public function obtenerRoles(){
            $this->db->query("SELECT * FROM rol");

            return $this->db->registros();                    
        }

        public function obtenerInformacionPerfil(){
            $this->db->query("SELECT * FROM usuario");

            return $this->db->registros();                    
        }

    }

?>