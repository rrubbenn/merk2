<?php
    class Productos extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);

            $this->productoModelo = $this->modelo('ProductoModelo');

        }

        public function index($id_usuario, $paginita = 1){

            if(tienePrivilegiosExtra($id_usuario, $this->datos['usuarioSesion']->id_usuario, $this->datos['usuarioSesion']->id_rol, 1)) {

                redireccionar("/");

            }

            $this->datos['categorias'] = $this->productoModelo->obtenerCategorias();

            $pagina_actual = $paginita ? $paginita : 1;
            $productos_por_pagina = 9; // Define cuántos productos quieres mostrar por página
        
            $total_productos = $total_productos = $this->productoModelo->totalProductos($id_usuario);
            $total_paginas = ceil($total_productos / $productos_por_pagina);
        
            // Asegúrate de que la página actual esté dentro de los límites
            if ($pagina_actual < 1) {
                $pagina_actual = 1;
            } elseif ($pagina_actual > $total_paginas) {
                $pagina_actual = $total_paginas;
            }

            $this->datos['total_paginas'] = $total_paginas;
            $this->datos['pagina_actual'] = $pagina_actual;
        
            $productos = $this->productoModelo->obtenerProductos($id_usuario, $pagina_actual, $productos_por_pagina);
            if (!empty($productos)) {
                $this->datos['productos'] = $productos;
            } else {
                // Si no hay productos, asignar un array vacío
                $this->datos['productos'] = array();
            }
            $this->datos['roles'] = $this->productoModelo->obtenerRoles();
            $this->datos['datosUsuario'] = $this->productoModelo->obtenerInformacionPerfil($id_usuario);

            $this-> vista("productos/productos", $this->datos);

        }

        public function compras($id_usuario, $paginita = 1){

            if(tienePrivilegiosExtra($id_usuario, $this->datos['usuarioSesion']->id_usuario, $this->datos['usuarioSesion']->id_rol, 1)) {

                redireccionar("/");

            }

            $this->datos['categorias'] = $this->productoModelo->obtenerCategorias();

            $pagina_actual = $paginita ? $paginita : 1;
            $productos_por_pagina = 9; // Define cuántos productos quieres mostrar por página
        
            $total_productos = $total_productos = $this->productoModelo->totalCompras($id_usuario);
            $total_paginas = ceil($total_productos / $productos_por_pagina);
        
            // Asegúrate de que la página actual esté dentro de los límites
            if ($pagina_actual < 1) {
                $pagina_actual = 1;
            } elseif ($pagina_actual > $total_paginas) {
                $pagina_actual = $total_paginas;
            }

            $this->datos['total_paginas'] = $total_paginas;
            $this->datos['pagina_actual'] = $pagina_actual;
        
            $productos = $this->productoModelo->obtenerCompras($id_usuario, $pagina_actual, $productos_por_pagina);
            if (!empty($productos)) {
                $this->datos['compras'] = $productos;
            } else {
                // Si no hay productos, asignar un array vacío
                $this->datos['compras'] = array();
            }

            $this->datos['datosUsuario'] = $this->productoModelo->obtenerInformacionPerfil($id_usuario);

            $this->datos['roles'] = $this->productoModelo->obtenerRoles();
            $this->datos['categorias'] = $this->productoModelo->obtenerCategorias();

            $this-> vista("productos/compras", $this->datos);

        }

        public function ventas($id_usuario, $paginita = 1){

            if(tienePrivilegiosExtra($id_usuario, $this->datos['usuarioSesion']->id_usuario, $this->datos['usuarioSesion']->id_rol, 1)) {

                redireccionar("/");

            }

            $this->datos['categorias'] = $this->productoModelo->obtenerCategorias();

            $pagina_actual = $paginita ? $paginita : 1;
            $productos_por_pagina = 9; // Define cuántos productos quieres mostrar por página
        
            $total_productos = $total_productos = $this->productoModelo->totalVentas($id_usuario);
            $total_paginas = ceil($total_productos / $productos_por_pagina);
        
            // Asegúrate de que la página actual esté dentro de los límites
            if ($pagina_actual < 1) {
                $pagina_actual = 1;
            } elseif ($pagina_actual > $total_paginas) {
                $pagina_actual = $total_paginas;
            }

            $this->datos['total_paginas'] = $total_paginas;
            $this->datos['pagina_actual'] = $pagina_actual;
        
            $productos = $this->productoModelo->obtenerVentas($id_usuario, $pagina_actual, $productos_por_pagina);
            if (!empty($productos)) {
                $this->datos['ventas'] = $productos;
            } else {
                // Si no hay productos, asignar un array vacío
                $this->datos['ventas'] = array();
            }

            $this->datos['datosUsuario'] = $this->productoModelo->obtenerInformacionPerfil($id_usuario);

            $this->datos['roles'] = $this->productoModelo->obtenerRoles();
            $this->datos['categorias'] = $this->productoModelo->obtenerCategorias();

            $this-> vista("productos/ventas", $this->datos);


        }

        public function venta($id_producto){

            $this->datos['roles'] = $this->productoModelo->obtenerRoles();
            $this->datos['categorias'] = $this->productoModelo->obtenerCategorias();

            $this->datos["producto"] = $this->productoModelo->getProducto($id_producto);

            $this-> vista("productos/venta", $this->datos);

        }

        public function addventa($id_producto){

            if ($_SERVER["REQUEST_METHOD"]=="POST") {
    
                $datos = $_POST;

                if ($this->productoModelo->addVenta($datos, $id_producto, $this->datos['usuarioSesion']->id_usuario)) {
                    
                    redireccionar("/productos/producto/".$id_producto);

                }else{
                    echo "error";
                }
    
            }

        }

        public function addProducto() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Obtener los datos del formulario y las imágenes subidas
                $datos = $_POST;
                $imagenes = $_FILES['imagenes'];
        
                // Llamar a la función addProducto() para agregar el producto
                $id_producto = $this->productoModelo->addProducto($datos);
        
                if ($id_producto) {
                    // Si se agregó el producto correctamente, intentar subir las imágenes si es que se cargaron
                    if (!empty($imagenes['name'][0])) {
                        if ($this->productoModelo->subirImagenes($imagenes, $id_producto)) {
                            $this->vistaApi(true);
                            return;
                        }
                    } else {
                        // No se cargaron imágenes, pero el producto se agregó correctamente
                        $this->vistaApi(true);
                        return;
                    }
                }
        
                // Si algo falla en la agregación del producto o la subida de imágenes
                $this->vistaApi(false);
            }
        }

        public function editproducto(){

            if ($_SERVER["REQUEST_METHOD"]=="POST") {
    
                $datos = $_POST;
                $imagenes = $_FILES['imagenes'];

                $id_producto = $this->productoModelo->editProducto($datos);

                if ($id_producto) {
                    // Si se agregó el producto correctamente, intentar subir las imágenes si es que se cargaron
                    if (!empty($imagenes['name'][0])) {

                        if ($this->productoModelo->delImagenes($datos['id_producto']) && $this->productoModelo->subirImagenes($imagenes, $datos['id_producto'])) {
                            $this->vistaApi($this->productoModelo->getImagenProducto($datos['id_producto'])->ruta);
                        }

                    } else {
                        // No se cargaron imágenes, pero el producto se agregó correctamente
                        $this->vistaApi($this->productoModelo->getImagenProducto($datos['id_producto'])->ruta);
                        
                    }
                }
                // Si algo falla en la agregación del producto o la subida de imágenes
                $this->vistaApi(false);
    
            }

        }

        public function get_datosproducto() {

            if ($_SERVER["REQUEST_METHOD"]=="POST") {
    
                $datos = $_POST;
    
                $this->vistaApi($this->productoModelo->getDatosProducto($datos));
                
            } 
        }

        public function delproducto(){

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $datos = $_POST;

                if ($this->productoModelo->delproducto($datos)){ 

                    $this->vistaApi(true);

                } else {

                    $this->vistaApi(false);

                }
            }
        }

        public function rellenar_categoria() {

            $datos = $this->productoModelo->getCategorias();
    
            $this->vistaApi($datos);
    
        }

        public function producto($id_producto) {

            $this->datos["producto"] = $this->productoModelo->getProducto($id_producto);

            $this->datos["vendedor"] = $this->productoModelo->getVendedorProducto($id_producto);

            $this->datos["imagenes"] = $this->productoModelo->getImagenesProducto($id_producto);

            if (!empty($this->datos['usuarioSesion'])) {

                $this->datos["esFavorito"] = $this->productoModelo->getFavoritoUsuario($id_producto, $this->datos['usuarioSesion']->id_usuario);

            }
            
            $this->vista("/productos/producto",$this->datos);

        }

    } 
?>