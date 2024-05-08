<?php
    class Perfil extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);

            $this->perfilModelo = $this->modelo('PerfilModelo');

        }

        public function index($id_usuario){

            $this->datos['roles'] = $this->perfilModelo->obtenerRoles();
            $this->datos['categorias'] = $this->perfilModelo->obtenerCategorias();

            $this->datos['datosUsuario'] = $this->perfilModelo->obtenerInformacionPerfil($id_usuario);
            

            $this->datos['enVenta'] = $this->perfilModelo->obtenerEnVentaUsuario($id_usuario);
            $this->datos['Vendidos'] = $this->perfilModelo->obtenerVendidosUsuario($id_usuario);
            
            $this->vista("/perfil/perfil", $this->datos);
            
        }

        public function editarPerfil(){  
            
            $this->datos['datosUsuario'] = $this->perfilModelo->obtenerInformacionPerfil($this->datos['usuarioSesion']->id_usuario);
            $this->datos['categorias'] = $this->perfilModelo->obtenerCategorias();

            $this->vista("/perfil/formularioEditarPerfil", $this->datos);
            
        }

        public function enviarEditar() {

            if($_SERVER['REQUEST_METHOD']=='POST'){

            $perfilModificado = $_POST;
            
                if ($this->perfilModelo->enviarEditarModelo($perfilModificado, $this->datos['usuarioSesion']->id_usuario)){
                    
                    redireccionar("/perfil/editarPerfil");
    
                }else{
                    echo "Error";
                }
            } else {
    
                $this->vista('/perfil/perfil', $this->datos); 

            }
        }

        public function cambiarImagen() {

            if($_SERVER['REQUEST_METHOD']=='POST'){

                $datos = $_POST;
                
                    if ($this->perfilModelo->subirImagen($datos, $this->datos['usuarioSesion']->id_usuario)){
                        
                        redireccionar("/perfil/editarPerfil");
        
                    }else{
                        echo "Error";
                    }
                } else {
        
                    $this->vista('/perfil/perfil/editarPerfil', $this->datos); 
    
                }


        }

        public function cambiarPass() {

            $this->vista("/perfil/formularioCambiarPass", $this->datos);

        }
    
        public function enviarPass() {

            if($_SERVER['REQUEST_METHOD']=='POST'){

            $oldpass = $_POST['oldpass'];
            $newpass = $_POST['newpass1'];

                if ($this->perfilModelo->comprobarPass($oldpass, $this->datos['usuarioSesion']->id_usuario)){

                    if ($this->perfilModelo->cambiarPass($newpass, $this->datos['usuarioSesion']->id_usuario)){
                    
                        $this->vistaApi(true);
        
                    }else{

                        $this->vistaApi(false);
                    
                    }
    
                }else{
                    
                    $this->vistaApi(false);

                }
            } else {

                $this->vistaApi(false);
                //$this->vista('/perfil/perfil/cambiarPass', $this->datos); 
                
            }
        }
    
    } 
?>