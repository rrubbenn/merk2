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
                        <button type="submit" class="btn btn-outline-light mt-3 fs-5" style="background-color: #A898D5;">Guardar Cambios</button>
                        <a href="<?php echo RUTA_URL?>/Perfil/editarPerfil"> <button type="button" class="btn btn-outline-secondary mt-3 fs-5">Volver</button> </a>
                    
                </form>
            </div>

    </div>
</body>

<!-- Modal de éxito -->
<div class="modal fade show" id="modalExito" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Éxito</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Se ha cambiado la contraseña exitosamente.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de error -->
<div class="modal fade" id="modalError" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Ha ocurrido un error al cambiar la contraseña.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script> 

document.addEventListener("DOMContentLoaded", function() {
        var exito = '<?php echo isset($_GET["exito"]) ? $_GET["exito"] : "" ?>';
        if (exito == 'true') {
            document.getElementById('modalExito').classList.add('show');
        } else if (exito == 'false') {
            document.getElementById('modalError').classList.add('show');
        }
    });


</script>