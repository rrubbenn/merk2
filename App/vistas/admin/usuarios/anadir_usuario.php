<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<div class="container">
<h1 class="text-center">Añadir Usuario</h1>

    <form method="post">
        <div class="row">
            <div class="col-12 mb-3">
                <label class="form-label" for="usuario">Nombre de Usuario:</label>
                <input class="form-control" type="text" id="usuario" name="usuario" required >
            </div>
            <div class="col-12 mb-3">
                <label class="form-label" for="pass">Contraseña:</label>
                <input class="form-control" type="password" id="pass" name="pass" required>
            </div>
            <div class="col-12 mb-3">
                <label class="form-label" for="nombre">Nombre:</label>
                <input class="form-control" type="text" id="nombre" name="nombre" required>
            </div>
            <div class="col-12 mb-3">
                <label class="form-label" for="apellidos">Apellidos:</label>
                <input class="form-control" type="text" id="apellidos" name="apellidos" required>
            </div>
            
            <div class="col-12 mb-3">
                <label class="form-label" for="dni">DNI:</label>
                <input class="form-control" type="text" id="dni" name="dni" >
            </div>
            <div class="col-12 mb-3">
                <label class="form-label" for="telefono">Teléfono:</label>
                <input class="form-control" type="text" id="telefono" name="telefono"  required>
            </div>
            <div class="col-12 mb-3">
                <label class="form-label" for="email">Email:</label>
                <input class="form-control" type="text" id="email" name="email"  required>
            </div>
            <div class="col-12 mb-3">

                <label class="form-label" for="id_rol">Rol:</label>

                    <select class="form-control" aria-label=".form-select-sm example" id="id_rol" name="id_rol">
                    <?php foreach ($datos['roles'] as $rol): ?> 
                        
                        <option value="<?php echo $rol->id_rol;?>"><?php echo $rol->nombre; ?></option>
                    <?php endforeach;?>
                    </select>

            </div>
            <div class="row col-12 g-2 mb-5" >
                <div class="col-6">
                    <a class="btn btn-dark mb-5 w-100" href="<?php echo RUTA_URL?>/Usuario/anadirUsuarios">Volver</a>

                </div>
                <div class="col-6">
                    <input class="btn color-logo mb-5 w-100" type="submit" value="Añadir" >
                </div>
            </div>

        </div>

        
    </form>

</div>


<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
