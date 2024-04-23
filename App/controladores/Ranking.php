<?php
    class Ranking extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);

            $this->rankingModelo = $this->modelo('RankingModelo');

        }

        public function index(){

            $intervalo = 'semana';

            $this->datos['compras'] = $this->rankingModelo->getCompras($intervalo);

            $this-> vista("ranking/ranking", $this->datos);

        }

        public function participar(){

            $this-> vista("ranking/participar", $this->datos);

        }

        public function askRanking(){

            if ($_SERVER["REQUEST_METHOD"]=="POST") {
    
                $datos = $_POST;

                if ($this->rankingModelo->editarRanking($datos)) {
                    
                    Sesion::actualizarRanking($this->datos,$datos['ranking']);
                    redireccionar("/ranking/participar");
                }else{
                    echo "error";
                }
    
            }

        }
    
    } 
?>