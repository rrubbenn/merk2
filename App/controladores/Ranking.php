<?php
    class Ranking extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);

            $this->rankingModelo = $this->modelo('RankingModelo');

        }

        public function index(){

            $this->datos['categorias'] = $this->rankingModelo->getCategorias();

            $this->datos['ventas'] = $this->rankingModelo->getVentas();
            $this->datos['compras'] = $this->rankingModelo->getCompras();

            $this->vista("ranking/ranking", $this->datos);

        }

        public function participar(){

            $this->datos['categorias'] = $this->rankingModelo->getCategorias();

            $this->vista("ranking/participar", $this->datos);

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