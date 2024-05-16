<?php require_once RUTA_APP.'/vistas/inc/header_no_login.php'?>

<body class="bodyregistro">
    <div class="container">
    <h1 class="text-center mt-4">Editar perfil</h1>
        <div class="d-flex flex-wrap"> 
            <div class="col-12 col-md-6 border-end">
                <form class="offset-1 col-10" method="post" action="<?php echo RUTA_URL?>/Perfil/enviarEditar">
                        <div class="mb-2 text-start">
                            <label for="nombre" class="form-label text-dark fs-4">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control fs-5" value="<?php echo $datos['datosUsuario']->nombre ?>" id="nombre" aria-describedby="emailHelp" style="width: 100%;" disabled>
                        </div>
                        <div class="mb-2 text-start">
                            <label for="apellidos" class="form-label text-dark fs-4">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos" class="form-control fs-5" value="<?php echo $datos['datosUsuario']->apellidos ?>" id="apellidos" aria-describedby="emailHelp" style="width: 100%;" disabled>
                        </div>
                        <div class="mb-2 text-start">
                            <label for="email" class="form-label text-dark fs-4">Email</label>
                            <input type="text" name="email" id="email" class="form-control fs-5" value="<?php echo $datos['datosUsuario']->email ?>" id="email" aria-describedby="emailHelp" style="width: 100%;" disabled>
                        </div>
                        <div class="mb-2 text-start">
                            <label for="telefono" class="form-label text-dark fs-4">Teléfono</label>
                            <input type="text" name="telefono" id="telefono" class="form-control fs-5" value="<?php echo $datos['datosUsuario']->telefono ?>" id="telefono" style="width: 100%;" disabled>
                        </div>
                        <div class="mb-2 text-start">
                            <label for="fechanacimiento" class="form-label text-dark fs-4">Fecha de nacimiento</label>
                            <input type="date" name="fechanacimiento" id="fechanacimiento" class="form-control fs-5" value="<?php echo $datos['datosUsuario']->fecha_nacimiento ?>" id="fechanacimiento" style="width: 100%;" disabled>
                        </div>
                        <div class="mb-2 text-start">
                            <label for="ciudad" class="form-label text-dark fs-4">Ciudad</label>
                            <input type="text" name="ciudad" id="ciudad" class="form-control fs-5" value="<?php echo $datos['datosUsuario']->ciudad ?>" id="ciudad" style="width: 100%;" disabled>
                        </div>
                        <div class="mb-2 text-start">
                            <label for="direccion" class="form-label text-dark fs-4">Direccion</label>
                            <input type="text" name="direccion" id="direccion" class="form-control fs-5" value="<?php echo $datos['datosUsuario']->direccion ?>" id="direccion" style="width: 100%;" disabled>
                        </div>
                        <button type="button" onclick="habilitarCambios();" class="btn btn-outline-light mt-3 fs-5" id="btnhabilitarCambios" style="background-color: #A898D5;">Realizar Cambios</button>
                        <button type="submit" class="btn btn-outline-light mt-3 fs-5 d-none" id="btnguardarCambios" style="background-color: #A898D5;">Guardar Cambios</button>
                        <a href="<?php echo RUTA_URL?>/Perfil/editarPerfil"> <button type="button" class="btn btn-outline-secondary mt-3 fs-5 d-none" id="btncancelar">Cancelar</button> </a>
                    
                </form>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <div class="mt-5 d-flex d-md-none justify-content-center col-12">
                    <h1> Imagen y extras </h1>
                </div>
                <div class="col-12 col-md-10 offset-md-1 d-flex flex-wrap justify-content-center">
                    <img class="mt-3 mb-5 imgperfil col-12 justify-content-center" src="<?php echo RUTA_URL_STATIC?>/imgbase/<?php echo $datos['datosUsuario']->imagen_perfil ?>" alt=""></img>
                    <div class="mt-4 col-10 col-md-12 justify-content-center d-flex justify-content-md-start">
                        <a class="text-dark cambiarimgperfil" href="#" onclick="openModal(this)"> <h5> Cambiar imagen de perfil </h5> </a>
                    </div>
                    <div class="col-10 col-md-12 justify-content-center d-flex justify-content-md-start">
                        <a class="text-dark" href="<?php echo RUTA_URL?>/perfil/cambiarPass"> <h5> Cambiar contraseña </h5> </a>
                    </div>
                    <div class="col-10 col-md-12 justify-content-center d-flex justify-content-md-start">
                        <a class="text-dark" href="<?php echo RUTA_URL?>/ranking/participar"> <h5> Participar en el Ranking </h5> </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>


<div id="modalCambiarImagenPerfil" class="modal-container">
    <div class="modal-contenido">
        <form method="post" enctype="multipart/form-data" action="<?php echo RUTA_URL?>/perfil/cambiarImagen">
            <div class="modal-header">
                <h2>Subir Imagen</h2>
                <i onclick="closeModal()" class="fa-solid fa-xmark cerrar"></i>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="col-12 col-md-10 offset-md-1">
                                <div class="mb-3">
                                    <input class="form-control" name="imagen" type="file" id="formFile">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary col-12 col-md-6 mb-2 mb-md-0" onclick="closeModal()">Cancelar</button>
                <button type="submit" class="btn btn-outline-light participar col-12 col-md-5" style="background-color: #A898D5;">Subir</button>
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

    }

    // VALIDACIONES

    const validacionNombre = document.querySelector('#nombre');

    let Nombrevalidado = true;
    let regNombreApellidos = /^[a-zA-Z\s]*$/;

    validacionNombre.addEventListener('keyup', (e)=> {

        if (regNombreApellidos.test(validacionNombre.value)) {

            validacionNombre.classList.remove("is-invalid");
            validacionNombre.classList.add("is-valid");
            Nombrevalidado = true;

        } else {

            validacionNombre.classList.remove("is-valid");
            validacionNombre.classList.add("is-invalid");
            Nombrevalidado = false;

        }
    });

    const validacionApellidos = document.querySelector('#apellidos');
    let Apellidovalidado = true;

    validacionApellidos.addEventListener('keyup', (e)=> {

        if (regNombreApellidos.test(validacionApellidos.value)) {

            validacionApellidos.classList.remove("is-invalid");
            validacionApellidos.classList.add("is-valid");
            Apellidovalidado = true;

        } else {

            validacionApellidos.classList.remove("is-valid");
            validacionApellidos.classList.add("is-invalid");
            Apellidovalidado = false;

        }
    });

    const validacionMail = document.querySelector('#email'); 

    let Mailvalidado = true;
    var MailRegex = /^([a-zA-Z0-9_.+-]+)@[a-zA-Z0-9_.+-]+\.[a-zA-Z]{2,4}$/;

    validacionMail.addEventListener('keyup', (e)=> {

        if (MailRegex.test(validacionMail.value)) {

            validacionMail.classList.remove("is-invalid");
            validacionMail.classList.add("is-valid");
            Mailvalidado = true;

        } else {

            validacionMail.classList.remove("is-valid");
            validacionMail.classList.add("is-invalid");
            Mailvalidado = false;

        }

    });

    const validacionTelefono = document.querySelector('#telefono');

    let Telefonovalidado = true;
    regTelefono = /^[0-9]{9}$/;

    validacionTelefono.addEventListener('keyup', (e)=> {

        if (regTelefono.test(validacionTelefono.value)) {

            validacionTelefono.classList.remove("is-invalid");
            validacionTelefono.classList.add("is-valid");
            Telefonovalidado = true;

        } else {

            validacionTelefono.classList.remove("is-valid");
            validacionTelefono.classList.add("is-invalid");
            Telefonovalidado = false;

        }
    });

    const validacionCiudad = document.querySelector('#ciudad');

    let Ciudadvalidado = true;
    let regCiudad = /^[a-zA-Z\s]*$/;

    validacionCiudad.addEventListener('keyup', (e)=> {

        if (regCiudad.test(validacionCiudad.value)) {

            validacionCiudad.classList.remove("is-invalid");
            validacionCiudad.classList.add("is-valid");
            Ciudadvalidado = true;

        } else {

            validacionCiudad.classList.remove("is-valid");
            validacionCiudad.classList.add("is-invalid");
            Ciudadvalidado = false;

        }
    });

    const validacionDireccion = document.querySelector('#direccion');

    let Direccionvalidado = true;
    let regDireccion = /^[a-zA-Z0-9\s,]+ \d+$/;

    validacionDireccion.addEventListener('keyup', (e)=> {

        if (regDireccion.test(validacionDireccion.value)) {

            validacionDireccion.classList.remove("is-invalid");
            validacionDireccion.classList.add("is-valid");
            Direccionvalidado = true;

        } else {

            validacionDireccion.classList.remove("is-valid");
            validacionDireccion.classList.add("is-invalid");
            Direccionvalidado = false;

        }
    });

    const campoAnyo = document.querySelector('#fechanacimiento');
    let anyoValidado = true;

    campoAnyo.addEventListener('change', (e) => {
        const fechaNacimiento = new Date(campoAnyo.value);
        const fechaHoy = new Date();
        const edadMinima = 18;

        const diferenciaTiempo = fechaHoy.getTime() - fechaNacimiento.getTime();
        const edad = Math.floor(diferenciaTiempo / (1000 * 3600 * 24 * 365.25));

        if (edad < edadMinima) {

            campoAnyo.classList.add("is-invalid");
            campoAnyo.classList.remove("is-valid");
            anyoValidado = false;

        } else {

            campoAnyo.classList.add("is-valid");
            campoAnyo.classList.remove("is-invalid");
            anyoValidado = true;

        }

    });
    const botonguardar = document.querySelector('#btnguardarCambios');

    document.addEventListener('keyup', (e)=> {

        if (Nombrevalidado === true && Apellidovalidado === true && Mailvalidado === true && Telefonovalidado === true && anyoValidado === true && Ciudadvalidado === true && Direccionvalidado === true) {

            botonguardar.removeAttribute("disabled");

        } else {

            botonguardar.disabled = "true";

        }

    });

    document.addEventListener('change', (e)=> {

        if (Nombrevalidado === true && Apellidovalidado === true && Mailvalidado === true && Telefonovalidado === true && anyoValidado === true && Ciudadvalidado === true && Direccionvalidado === true) {

            botonguardar.removeAttribute("disabled");

        } else {

            botonguardar.disabled = "true";

        }

    });
    
</script>
<script src="<?php echo RUTA_URL_STATIC?>/js/main.js"></script>