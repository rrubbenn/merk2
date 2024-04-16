<?php
    class Inicio extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);

            $this->inicioModelo = $this->modelo('InicioModelo');

        }

        public function index(){
            $pagina_actual = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
            $productos_por_pagina = 20; // Define cuántos productos quieres mostrar por página
        
            $total_productos = $total_productos = $this->inicioModelo->totalProductos();
            $total_paginas = ceil($total_productos / $productos_por_pagina);
        
            // Asegúrate de que la página actual esté dentro de los límites
            if ($pagina_actual < 1) {
                $pagina_actual = 1;
            } elseif ($pagina_actual > $total_paginas) {
                $pagina_actual = $total_paginas;
            }
        
            $productos = $this->inicioModelo->obtenerProductos($pagina_actual, $productos_por_pagina);
        
            $this->datos['productos'] = $productos;
            $this->datos['total_paginas'] = $total_paginas;
            $this->datos['pagina_actual'] = $pagina_actual;
        
            $this->vista("index", $this->datos);
        }

    } 
?>