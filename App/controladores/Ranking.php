<?php
    class Ranking extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);

            $this->rankingModelo = $this->modelo('RankingModelo');

        }

        public function index(){

            $this-> vista("ranking", $this->datos);

            
            
        }

        public function askRanking(){

            if ($_SERVER["REQUEST_METHOD"]=="POST") {
    
                $datos = $_POST;

                if ($this->rankingModelo->editarRanking($datos)) {
                    
                    Sesion::actualizarRanking($this->datos,$datos['ranking']);
                    redireccionar("/Ranking");
                }else{
                    echo "error";
                }
    
            }

        }
    
    } 
?>