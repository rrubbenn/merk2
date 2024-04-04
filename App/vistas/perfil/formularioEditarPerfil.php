<?php require_once RUTA_APP.'/vistas/inc/header_no_login.php'?>

<body class="bodyregistro">
    <div class="container">
    <h1 class="text-center mt-4">Editar perfil</h1>
        <div class="d-flex"> 
            <div class="col-6 border-end">
                <form class="offset-1 col-10" method="post" action="<?php echo RUTA_URL?>/Perfil/enviarEditar">
                        <div class="mb-2 text-start">
                            <label for="nombre" class="form-label text-dark fs-4">Nombre</label>
                            <input type="text" name="nombre" class="form-control fs-5" value="<?php echo $datos['datosUsuario']->nombre ?>" id="nombre" aria-describedby="emailHelp" style="width: 100%;" disabled>
                        </div>
                        <div class="mb-2 text-start">
                            <label for="apellidos" class="form-label text-dark fs-4">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control fs-5" value="<?php echo $datos['datosUsuario']->apellidos ?>" id="apellidos" aria-describedby="emailHelp" style="width: 100%;" disabled>
                        </div>
                        <div class="mb-2 text-start">
                            <label for="email" class="form-label text-dark fs-4">Email</label>
                            <input type="text" name="email" class="form-control fs-5" value="<?php echo $datos['datosUsuario']->email ?>" id="email" aria-describedby="emailHelp" style="width: 100%;" disabled>
                        </div>
                        <div class="mb-2 text-start">
                            <label for="telefono" class="form-label text-dark fs-4">Teléfono</label>
                            <input type="text" name="telefono" class="form-control fs-5" value="<?php echo $datos['datosUsuario']->telefono ?>" id="telefono" style="width: 100%;" disabled>
                        </div>
                        <div class="mb-2 text-start">
                            <label for="fechanacimiento" class="form-label text-dark fs-4">Fecha de nacimiento</label>
                            <input type="date" name="fechanacimiento" class="form-control fs-5" value="<?php echo $datos['datosUsuario']->fecha_nacimiento ?>" id="fechanacimiento" style="width: 100%;" disabled>
                        </div>
                        <div class="mb-2 text-start">
                            <label for="ciudad" class="form-label text-dark fs-4">Ciudad</label>
                            <input type="text" name="ciudad" class="form-control fs-5" value="<?php echo $datos['datosUsuario']->ciudad ?>" id="ciudad" style="width: 100%;" disabled>
                        </div>
                        <div class="mb-2 text-start">
                            <label for="direccion" class="form-label text-dark fs-4">Direccion</label>
                            <input type="text" name="direccion" class="form-control fs-5" value="<?php echo $datos['datosUsuario']->direccion ?>" id="direccion" style="width: 100%;" disabled>
                        </div>
                        <button type="button" onclick="habilitarCambios();" class="btn btn-outline-light mt-3 fs-5" id="btnhabilitarCambios" style="background-color: #A898D5;">Realizar Cambios</button>
                        <button type="submit" class="btn btn-outline-light mt-3 fs-5 d-none" id="btnguardarCambios" style="background-color: #A898D5;">Guardar Cambios</button>
                        <a href="<?php echo RUTA_URL?>/Perfil/editarPerfil"> <button type="button" class="btn btn-outline-secondary mt-3 fs-5 d-none" id="btncancelar">Cancelar</button> </a>
                    
                </form>
            </div>
            <div class="col-6">
                <div class="col-10 offset-1">
                    <img class="mt-3 imgperfil" src="<?php echo RUTA_URL_STATIC?>/imgbase/<?php echo $datos['datosUsuario']->imagen_perfil ?>" alt=""></img>
                    <div class="mt-5 col-12">
                        <a class="text-dark cambiarimgperfil" href="#" onclick="openModal(this)"> <h5> Cambiar imagen de perfil </h5> </a>
                    </div>
                    <div class="col-12">
                        <a class="text-dark" href="<?php echo RUTA_URL?>/Perfil/cambiarPass"> <h5> Cambiar contraseña </h5> </a>
                    </div>
                    <div class="col-12">
                        <a class="text-dark" href="<?php echo RUTA_URL?>/Ranking"> <h5> Participar en el Ranking </h5> </a>
                    </div>
                </div>
            </div>
            
        </div>



    </div>
</body>


<div id="modalCambiarImagenPerfil" class="modal-container">
    <div class="modal-contenido">
        <i onclick="closeModal()" class="fa-solid fa-xmark cerrar"></i>
            <form method="post" enctype="multipart/form-data" action="<?php echo RUTA_URL?>/Perfil/cambiarImagen">
                <div class="modal-header">
                    <h2>Subir Imagen</h2>
                </div>
                <div class="modal-body d-flex">
                    <div class="col-12">
                        <div class="col-10 offset-1">
                            <div class="mb-3">
                                <input class="form-control" name="imagen" type="file" id="formFile" >
                            </div>
                        </div>
                    </div>
                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" onclick="closeModal()">Cancelar</button>
                    <button type="submit" class="btn btn-outline-light participar" style="background-color: #A898D5;">Subir</button>
                </div>
            </form>
    </div>
</div>

<script>

    let inputNombre = document.getElementById("nombre");
    let inputApellidos = document.getElementById("apellidos");
    let inputEmail = document.getElementById("email");
    let inputTelefono = document.getElementById("telefono");
    let inputFecha = document.getElementById("fechanacimiento");
    let inputCiudad = document.getElementById("ciudad");
    let inputDireccion = document.getElementById("direccion");

    let botonRealizar = document.getElementById("btnhabilitarCambios");
    let botonGuardar = document.getElementById("btnguardarCambios");
    let botonCancelar = document.getElementById("btncancelar");

    function habilitarCambios(){
        
        botonRealizar.classList.add("d-none");
        botonGuardar.classList.remove("d-none");
        botonCancelar.classList.remove("d-none");

        inputNombre.disabled = false;
        inputApellidos.disabled = false;
        inputEmail.disabled = false;
        inputTelefono.disabled = false;
        inputFecha.disabled = false;
        inputCiudad.disabled = false;
        inputDireccion.disabled = false;

        botonGuardar.disabled = true;

        setTimeout(function(){
            botonGuardar.disabled = false;
        }, 2500);

        
    }
    
</script>
<script src="<?php echo RUTA_URL_STATIC?>/js/main.js"></script>