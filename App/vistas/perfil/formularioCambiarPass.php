<?php require_once RUTA_APP.'/vistas/inc/header_no_login.php'?>

<body class="bodyregistro">
    <div class="container">
    <h1 class="text-center mt-4">Editar perfil</h1>

        <div class="d-flex"> 
            <div class="col-10 offset-1 ">
                <form class="offset-1 col-10" method="post" action="<?php echo RUTA_URL?>/Perfil/enviarPass">
                        <div class="mb-2 text-start">
                            <label for="nombre" class="form-label text-dark fs-4">Contraseña actual</label>
                            <input type="password" name="oldpass" class="form-control fs-5" id="oldpass" aria-describedby="emailHelp" style="width: 100%;">
                        </div>
                        <div class="mb-2 text-start">
                            <label for="nombre" class="form-label text-dark fs-4">Nueva contraseña</label>
                            <input type="password" name="newpass1" class="form-control fs-5" id="newpass1" aria-describedby="emailHelp" style="width: 100%;">
                        </div>
                        <div class="mb-2 text-start">
                            <label for="apellidos" class="form-label text-dark fs-4">Repetir contraseña</label>
                            <input type="password" name="newpass2" class="form-control fs-5" id="newpass2" aria-describedby="emailHelp" style="width: 100%;">
                        </div>
                        <button type="submit" class="btn btn-outline-light mt-3 fs-5" id="btnguardarCambios" style="background-color: #A898D5;" disabled>Guardar Cambios</button>
                        <a href="<?php echo RUTA_URL?>/Perfil/editarPerfil"> <button type="button" class="btn btn-outline-secondary mt-3 fs-5">Volver</button> </a>
                    
                </form>
            </div>

    </div>
</body>

<!-- Modal de éxito -->
<div class="modal-container" id="modalExito" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Éxito</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closeModal()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Se ha cambiado la contraseña exitosamente.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal()" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de error -->
<div class="modal-container" id="modalError" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closeModal()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Ha ocurrido un error al cambiar la contraseña.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal()" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script> 


    document.addEventListener("DOMContentLoaded", function() {
        var exito = '<?php echo isset($_GET) ?>';

        console.log(exito);
        if (exito == 1) {

            modal = document.getElementById('modalExito');
            modal.style.display="flex";

        } else if (exito == 0) {

            modal = document.getElementById('modalError');
            modal.style.display="flex";

        }
    });


    const validacionClave = document.querySelector('#oldpass');

    let Clavevalidado1 = false;
    let regClave = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})/;

    validacionClave.addEventListener('keyup', (e)=> {

        if (regClave.test(validacionClave.value)) {

            validacionClave.classList.remove("is-invalid");
            validacionClave.classList.add("is-valid");
            Clavevalidado1 = true;

        } else {

            validacionClave.classList.remove("is-valid");
            validacionClave.classList.add("is-invalid");
            Clavevalidado1 = false;

        }
    });

    validacionClave2 = document.querySelector('#newpass1');

    let Clavevalidado2 = false;

    validacionClave2.addEventListener('keyup', (e)=> {

        if (regClave.test(validacionClave2.value)) {

            validacionClave2.classList.remove("is-invalid");
            validacionClave2.classList.add("is-valid");
            Clavevalidado2 = true;

        } else {

            validacionClave2.classList.remove("is-valid");
            validacionClave2.classList.add("is-invalid");
            Clavevalidado2 = false;

        }
    });

    validacionClave3 = document.querySelector('#newpass2');

    let Clavevalidado3 = false;

    validacionClave3.addEventListener('keyup', (e)=> {

        if (regClave.test(validacionClave3.value)) {

            validacionClave3.classList.remove("is-invalid");
            validacionClave3.classList.add("is-valid");
            Clavevalidado3 = true;

        } else {

            validacionClave3.classList.remove("is-valid");
            validacionClave3.classList.add("is-invalid");
            Clavevalidado3 = false;

        }
    });

    const botonguardar = document.querySelector('#btnguardarCambios');

    document.addEventListener('keyup', (e)=> {

        if (Clavevalidado1 === true && Clavevalidado2 === true && Clavevalidado3 === true) {

            botonguardar.removeAttribute("disabled");

        } else {

            botonguardar.disabled = "true";

        }

    });

    document.addEventListener('change', (e)=> {

        if (Clavevalidado1 === true && Clavevalidado2 === true && Clavevalidado3 === true) {

            botonguardar.removeAttribute("disabled");

        } else {

            botonguardar.disabled = "true";

        }

    });


</script>

<script src="<?php echo RUTA_URL_STATIC?>/js/main.js"></script>