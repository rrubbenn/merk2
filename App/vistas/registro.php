<?php require_once RUTA_APP.'/vistas/inc/header_no_login.php'?>

<body class="bodyregistro mb-5">
    <div class="registro-page">
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card text-center" style="background-color: #A898D5;">
                        <div class="card-body">
                            <h4 class="card-title text-light mt-2 mb-3">REGISTRARSE</h4>
                            <form method="post">
                                <div class="mb-3 text-start">
                                    <label for="nombre" class="form-label text-light mb-0">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="emailHelp" style="width: 100%;">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="apellidos" class="form-label text-light mb-0">Apellidos</label>
                                    <input type="text" name="apellidos" class="form-control" id="apellidos" aria-describedby="emailHelp" style="width: 100%;">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="email" class="form-label text-light mb-0">Email</label>
                                    <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" style="width: 100%;">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="contrasena" class="form-label text-light mb-0">Contraseña</label>
                                    <input type="password" name="contrasena" class="form-control" id="contrasena" style="width: 100%;">
                                    <div id="direccionAyuda" class="form-text text-light">
                                        Tu contraseña debe tener 8 carácteres, incluir una mayúscula y un carácter especial.
                                    </div>
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="telefono" class="form-label text-light mb-0">Teléfono</label>
                                    <input type="text" name="telefono" class="form-control" id="telefono" style="width: 100%;">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="fechanacimiento" class="form-label text-light mb-0">Fecha de nacimiento</label>
                                    <input type="date" name="fechanacimiento" class="form-control" id="fechanacimiento" style="width: 100%;">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="ciudad" class="form-label text-light mb-0">Ciudad</label>
                                    <input type="text" name="ciudad" class="form-control" id="ciudad" style="width: 100%;">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="direccion" class="form-label text-light mb-0">Direccion</label>
                                    <input type="text" name="direccion" class="form-control" id="direccion" style="width: 100%;">
                                    <div id="direccionAyuda" class="form-text text-light">
                                        Escribe tu dirección y número.
                                    </div>
                                </div>
                                <button type="submit" id="botonsubmit" class="btn btn-outline-light" style="background-color: #A898D5;" disabled>Registrarse</button>
                                <div class="">
                                    <a href="<?php echo RUTA_URL?>/Login">
                                        <div class="form-text text-light text-decoration-underline">¿Ya tienes una cuenta? Inicia sesión aquí</div>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>

    // VALIDACIONES

    const validacionNombre = document.querySelector('#nombre');

    let Nombrevalidado = false;
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
    let Apellidovalidado = false;

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

    let Mailvalidado = false;
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

    const validacionClave = document.querySelector('#contrasena');

    let Clavevalidado = false;
    let regClave = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})/;

    validacionClave.addEventListener('keyup', (e)=> {

        if (regClave.test(validacionClave.value)) {

            validacionClave.classList.remove("is-invalid");
            validacionClave.classList.add("is-valid");
            Clavevalidado = true;

        } else {

            validacionClave.classList.remove("is-valid");
            validacionClave.classList.add("is-invalid");
            Clavevalidado = false;

        }
    });

    const validacionTelefono = document.querySelector('#telefono');

    let Telefonovalidado = false;
    regTelefono = /^[0-9]/;

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

    let Ciudadvalidado = false;
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

    let Direccionvalidado = false;
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
    let anyoValidado = false;

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
    const botonguardar = document.querySelector('#botonsubmit');

    document.addEventListener('keyup', (e)=> {

        if (Nombrevalidado === true && Apellidovalidado === true && Mailvalidado === true && Clavevalidado === true && Telefonovalidado === true && anyoValidado === true && Ciudadvalidado === true && Direccionvalidado === true) {

            botonguardar.removeAttribute("disabled");

        } else {

            botonguardar.disabled = "true";

        }

    });

    document.addEventListener('change', (e)=> {

        if (Nombrevalidado === true && Apellidovalidado === true && Mailvalidado === true && Clavevalidado === true && Telefonovalidado === true && anyoValidado === true && Ciudadvalidado === true && Direccionvalidado === true) {

            botonguardar.removeAttribute("disabled");

        } else {

            botonguardar.disabled = "true";

        }

    });

</script>