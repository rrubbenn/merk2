<?php
    class Inicio extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);

            $this->inicioModelo = $this->modelo('InicioModelo');

        }

        public function index($paginita = 1){

            $pagina_actual = $paginita ? $paginita : 1;
            $productos_por_pagina = 9; // Define cuántos productos quieres mostrar por página
        
            $total_productos = $this->inicioModelo->totalProductos();
            $total_paginas = ceil($total_productos / $productos_por_pagina);
        
            // Asegúrate de que la página actual esté dentro de los límites
            if ($pagina_actual < 1) {
                $pagina_actual = 1;
            } elseif ($pagina_actual > $total_paginas) {
                $pagina_actual = $total_paginas;
            }

            $this->datos['total_paginas'] = $total_paginas;
            $this->datos['pagina_actual'] = $pagina_actual;
        
            $productos = $this->inicioModelo->obtenerProductos($pagina_actual, $productos_por_pagina);
            if (!empty($productos)) {
                $this->datos['productos'] = $productos;
            } else {
                // Si no hay productos, asignar un array vacío
                $this->datos['productos'] = array();
            }

            $this->datos['categorias'] = $this->inicioModelo->obtenerCategorias();
        
            $this->vista("/inicio/index", $this->datos);
        }

        public function busqueda($paginita = 1) {

            if($_SERVER['REQUEST_METHOD']=='POST'){

                $datos = "%".$_POST['buscador']."%";
                
                    if ($this->inicioModelo->buscarProductos($datos)){

                        $pagina_actual = $paginita ? $paginita : 1;
                        $productos_por_pagina = 9; // Define cuántos productos quieres mostrar por página
                    
                        $total_productos = count($this->inicioModelo->buscarProductos($datos));
                        $total_paginas = ceil($total_productos / $productos_por_pagina);
                    
                        // Asegúrate de que la página actual esté dentro de los límites
                        if ($pagina_actual < 1) {
                            $pagina_actual = 1;
                        } elseif ($pagina_actual > $total_paginas) {
                            $pagina_actual = $total_paginas;
                        }

                        $this->datos['total_paginas'] = $total_paginas;
                        $this->datos['pagina_actual'] = $pagina_actual;

                        $this->datos['resultados'] = $this->inicioModelo->buscarProductos($datos);
                        
                        $this->vista('/inicio/busqueda', $this->datos); 
        
                    }else{

                        $pagina_actual = $paginita ? $paginita : 1;
                        $productos_por_pagina = 9; // Define cuántos productos quieres mostrar por página
                    
                        $total_productos = 0;
                        $total_paginas = ceil($total_productos / $productos_por_pagina);
                    
                        // Asegúrate de que la página actual esté dentro de los límites
                        if ($pagina_actual < 1) {
                            $pagina_actual = 1;
                        } elseif ($pagina_actual > $total_paginas) {
                            $pagina_actual = $total_paginas;
                        }

                        $this->datos['total_paginas'] = $total_paginas;
                        $this->datos['pagina_actual'] = $pagina_actual;

                        $this->datos['resultados'] = $this->inicioModelo->buscarProductos($datos);
                        
                        $this->vista('/inicio/busqueda', $this->datos); 
                    }
                } else {
        
                    $this->vista('/inicio/busqueda', $this->datos); 
    
                }

        }

    } 
?>