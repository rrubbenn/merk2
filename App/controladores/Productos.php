<?php
    class Productos extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);

            $this->productoModelo = $this->modelo('ProductoModelo');

        }

        public function index($id_usuario){

            $this->datos['roles'] = $this->productoModelo->obtenerRoles();

            $this->datos['datosUsuario'] = $this->productoModelo->obtenerInformacionPerfil($id_usuario);

            $this->datos['productos'] = $this->productoModelo->obtenerProductos($this->datos['usuarioSesion']->id_usuario);


            $this-> vista("productos/productos", $this->datos);


        }

        public function compras(){

            $this->datos['roles'] = $this->productoModelo->obtenerRoles();

            $this->datos['compras'] = $this->productoModelo->obtenerCompras($this->datos['usuarioSesion']->id_usuario);


            $this-> vista("productos/compras", $this->datos);


        }

        public function ventas(){

            $this->datos['roles'] = $this->productoModelo->obtenerRoles();

            $this->datos['ventas'] = $this->productoModelo->obtenerVentas($this->datos['usuarioSesion']->id_usuario);


            $this-> vista("productos/ventas", $this->datos);


        }

        public function venta($id_producto){

            $this->datos['roles'] = $this->productoModelo->obtenerRoles();

            $this->datos["producto"] = $this->productoModelo->getProducto($id_producto);

            $this-> vista("productos/venta", $this->datos);

        }

        public function addventa($id_producto){

            if ($_SERVER["REQUEST_METHOD"]=="POST") {
    
                $datos = $_POST;
                //print_r($datos);
                //echo "<br>";
                //print_r($id_producto);
                //echo "<br>";
                //print_r($this->datos['usuarioSesion']->id_usuario);
                //exit();

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

                //print_r($imagenes);
                //exit();
        
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
                //print_r($datos);
                //exit();

                if ($this->productoModelo->editProducto($datos)) {
                
                    $this->vistaApi(true);

                } else {

                    $this->vistaApi(false);

                }
    
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

            $this->datos["esFavorito"] = $this->productoModelo->getFavoritoUsuario($id_producto, $this->datos['usuarioSesion']->id_usuario);

            $this->vista("/productos/producto",$this->datos);

        }

    } 
?>