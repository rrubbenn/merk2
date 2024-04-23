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

        public function getCompras(){

            switch ($intervalo) {
                case 'semana':
                    $this->db->query("SELECT * FROM Venta WHERE fecha_venta >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK)");
                    break;
                case 'mes':
                    $this->db->query("SELECT * FROM Venta WHERE fecha_venta >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)");
                    break;
                case 'año':
                    $this->db->query("SELECT * FROM Venta WHERE fecha_venta >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)");
                    break;
                default:
                    echo "Intervalo no válido";
            }

            $this->db->bind(':ranking',$datos['ranking']);
            $this->db->bind(':id_usuario',$datos['id_usuario']);

            if($this->db->execute()) {
    
                return true;
    
            } else {
    
                return false;
    
            }
            
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