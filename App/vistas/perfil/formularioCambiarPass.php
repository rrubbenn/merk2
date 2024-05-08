<?php require_once RUTA_APP.'/vistas/inc/header_no_login.php'?>

<body class="bodyregistro">
    <div class="container">
    <h1 class="text-center mt-4">Editar perfil</h1>

        <div class="d-flex"> 
            <div class="col-10 offset-1 ">
                <form class="offset-1 col-10" id="formContrasena" action="javascript:cambiarPass()" data-ruta="<?php echo htmlspecialchars(RUTA_URL.'/perfil/enviarPass')?>" >
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

async function cambiarPass(){
    
    let formulario = document.getElementById('formContrasena');
    let ruta = formulario.dataset.ruta;

    let formData = new FormData(formulario); // Crear un objeto FormData para enviar los datos del formulario

    await fetch(ruta, {
        method: "POST",
        body: formData,
    })
        .then((resp) => resp.json())
        .then(function(data) {

            let datos = data;

            if (datos) {

                modal = document.getElementById('modalExito');
                modal.style.display="flex";

                } else {

                modal = document.getElementById('modalError');
                modal.style.display="flex";

            }

        })
}

let regClave = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})/;

const validacionClave1 = document.querySelector('#newpass1');
const validacionClave2 = document.querySelector('#newpass2');
const botonguardar = document.querySelector('#btnguardarCambios');

let claveValidada1 = false;
let claveValidada2 = false;

// Event listener para newpass1
validacionClave1.addEventListener('keyup', () => {
    if (regClave.test(validacionClave1.value)) {
        validacionClave1.classList.remove("is-invalid");
        validacionClave1.classList.add("is-valid");
        claveValidada1 = true;
    } else {
        validacionClave1.classList.remove("is-valid");
        validacionClave1.classList.add("is-invalid");
        claveValidada1 = false;
    }
    validarBotonGuardar();
});

// Event listener para newpass2
validacionClave2.addEventListener('keyup', () => {
    if (regClave.test(validacionClave2.value)) {
        validacionClave2.classList.remove("is-invalid");
        validacionClave2.classList.add("is-valid");
        claveValidada2 = true;
    } else {
        validacionClave2.classList.remove("is-valid");
        validacionClave2.classList.add("is-invalid");
        claveValidada2 = false;
    }
    validarBotonGuardar();
});

// Función para validar el botón de guardar
function validarBotonGuardar() {
    if (claveValidada1 && claveValidada2 && validacionClave1.value === validacionClave2.value) {
        botonguardar.removeAttribute("disabled");
    } else {
        botonguardar.disabled = true;
    }
}

</script>

<script src="<?php echo RUTA_URL_STATIC?>/js/main.js"></script>