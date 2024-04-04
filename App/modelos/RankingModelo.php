<?php
    class RankingModelo{
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

        public function editarRanking($datos){

            $this->db->query("UPDATE usuario SET ranking = :ranking where id_usuario = :id_usuario");

            $this->db->bind(':ranking',$datos['ranking']);
            $this->db->bind(':id_usuario',$datos['id_usuario']);

            if($this->db->execute()) {
    
                return true;
    
            } else {
    
                return false;
    
            }
            
        }

    }

?>