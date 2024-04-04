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

        public function addproducto(){

            if ($_SERVER["REQUEST_METHOD"]=="POST") {
    
                $datos = $_POST;
                print_r($datos);
                exit();

                if ($this->productoModelo->addProducto($datos)) {
                    
                    redireccionar("/Productos");

                }else{
                    echo "error";
                }
    
            }

        }

        public function editproducto(){

            if ($_SERVER["REQUEST_METHOD"]=="POST") {
    
                $datos = $_POST;
                print_r($datos);
                exit();

                if ($this->productoModelo->editProducto($datos)) {
                    
                    redireccionar("/Productos");

                }else{
                    echo "error";
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

            //Indica que se ilumina en el menu superior
            //$this->datos["menuActivo"] = "curso";

            $this->datos["producto"] = $this->productoModelo->getProducto($id_producto);

            $this->datos["vendedor"] = $this->productoModelo->getVendedorProducto($id_producto);

            //$this->datos["cursoactual"]= $this->productoModelo->getCursoMaterial($id_material);

            //$this->datos["materialRealizado"] = $this->productoModelo->getAlumnosRealizados($id_material);
            
            //$this->datos["materialNoRealizado"] = $this->productoModelo->getAlumnosNoRealizados($id_material);

            $this->vista("/productos/producto",$this->datos);

        }

    } 
?>