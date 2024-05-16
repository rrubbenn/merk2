<?php require_once RUTA_APP.'/vistas/inc/header_no_login.php'?>

<div class="login-page">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card text-center" style="background-color: #A898D5;">
                <div class="card-body">
                    <h4 class="card-title text-light mt-3 mb-3">INICIAR SESIÓN</h4>
                    <form method="post">
                        <div class="mb-3 text-start">
                            <label for="nombreusuario" class="form-label text-light">Nombre de Usuario</label>
                            <input type="text" name="usuario" class="form-control" id="nombreusuario" aria-describedby="emailHelp" style="width: 100%;">
                        </div>
                        <div class="mb-4 text-start">
                            <label for="exampleInputPassword1" class="form-label text-light">Contraseña</label>
                            <input type="password" name="contrasena" class="form-control" id="exampleInputPassword1" style="width: 100%;">
                        </div>
                        <button type="submit" class="btn btn-outline-light" style="background-color: #A898D5;">Iniciar Sesión</button>
                        <div class="mt-3">
                            <a href="<?php echo RUTA_URL?>/Registro">
                                <div class="form-text text-light text-decoration-underline">¿No tienes una cuenta? Crea una aquí</div>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
                                <?php 
                                    if (isset($datos['error']) && $datos['error'] == 'error_1'): ?>
                                        <br>
                                    <div class="alert alert-danger" role="alert">
                                        Usuario o contraseña incorrectos
                                    </div>
                                <?php endif ?>
        </div>
    </div>
</div>
