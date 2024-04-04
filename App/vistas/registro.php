<?php require_once RUTA_APP.'/vistas/inc/header_no_login.php'?>

<!-- nombre, apellidos, email, contrasena, telefono, fecha_nacimiento, ciudad, direccion -->

<body class="bodyregistro">
    <div class="registro-page">
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card text-center" style="background-color: #A898D5;">
                        <div class="card-body">
                            <h4 class="card-title text-light mt-3 mb-3">REGISTRARSE</h4>
                            <form method="post">
                                <div class="mb-3 text-start">
                                    <label for="nombre" class="form-label text-light">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="emailHelp" style="width: 100%;">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="apellidos" class="form-label text-light">Apellidos</label>
                                    <input type="text" name="apellidos" class="form-control" id="apellidos" aria-describedby="emailHelp" style="width: 100%;">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="email" class="form-label text-light">Email</label>
                                    <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" style="width: 100%;">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="contrasena" class="form-label text-light">Contraseña</label>
                                    <input type="password" name="contrasena" class="form-control" id="contrasena" style="width: 100%;">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="telefono" class="form-label text-light">Teléfono</label>
                                    <input type="text" name="telefono" class="form-control" id="telefono" style="width: 100%;">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="fechanacimiento" class="form-label text-light">Fecha de nacimiento</label>
                                    <input type="date" name="fechanacimiento" class="form-control" id="fechanacimiento" style="width: 100%;">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="ciudad" class="form-label text-light">Ciudad</label>
                                    <input type="text" name="ciudad" class="form-control" id="ciudad" style="width: 100%;">
                                </div>
                                <div class="mb-3 text-start">
                                    <label for="direccion" class="form-label text-light">Direccion</label>
                                    <input type="text" name="direccion" class="form-control" id="direccion" style="width: 100%;">
                                </div>
                                <button type="submit" class="btn btn-outline-light" style="background-color: #A898D5;">Registrarse</button>
                                <div class="mt-3">
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
