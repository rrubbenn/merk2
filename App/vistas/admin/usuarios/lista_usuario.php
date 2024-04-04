<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<div class="container">
<h1 class="text-center">Lista de Usuarios</h1>

<nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" onclick="paginar(this)">Anterior</a>
            </li>

            <li class="page-item disabled"><a class="page-link" href="#" onclick="paginar(this)">1</a></li>
            <li class="page-item"><a class="page-link" href="#" onclick="paginar(this)">2</a></li>
            <li class="page-item"><a class="page-link" href="#" onclick="paginar(this)">3</a></li>

            <li class="page-item">
                <a class="page-link" href="#" onclick="paginar(this)">Siguiente</a>
            </li>
            
        </ul>
    </nav>


    <div class="row g-3 my-4">
        <div class="col-lg-1">
            <a class="btn color-logo mb-3 w-100" href="<?php echo RUTA_URL?>/Usuario/anadirUsuarios">Añadir</a>
        </div>
        <!-- Buscador -->
        <div class="col-sm-12 col-lg-9">
          <input type="text" class="form-control" onkeyup="buscador()" id="buscador" placeholder="Buscar...">   
        </div>
        <div class="col-lg-2 text-center">
            <a class="color-logo btn w-100" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Filtrar por Rol
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <!-- Filtro -->
              <?php foreach ($datos['roles'] as $rol ): ?>    
                <li><a class="dropdown-item" href="#" id="<?php echo $rol -> id_rol?>" onclick="filtrar(this, 'id_rol')"><?php echo $rol -> rol?></a></li>
              <?php endforeach; ?>
                <li><a class="dropdown-item" href="#" id="todos" onclick="filtrar(this)">Todos</a></li>
            </ul>
        </div>
      </div>




        <table class="table">
        <thead>
            <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">DNI</th>
            <th scope="col">Telefono</th>
            <th scope="col">Email</th>
            <th scope="col">Rol</th>
            <th></th>

            </tr>
        </thead>


        </table>

</div>

<!-- MODAL HTML -->
<div id="modal1" class="modal-container">
    <div class="modal-contenido">
        <i onclick="closeModal()" class="fa-solid fa-xmark cerrar"></i>
    

        <div class="modal-header">
            <h2>ELIMINAR USUARIO</h2>
        </div>

        <div class="modal-body">
            ¿Estás seguro de que quieres eliminar este usuario?
        </div>

        <div class="modal-footer">
            <button class="btn btn-outline-secondary" onclick="closeModal()">Cancelar</button>
            <a id="modalBorrar" href="">
            <button class="btn btn-outline-danger">Eliminar</button>
            </a>
        </div>

        </div><!-- Fin modal-contenido -->
    </div><!-- Fin modal-container -->





         <!-- MODAL EDITAR HTML -->
         <div id="modalEdit" class="modal-container">
    <div class="modal-contenido">
        <i onclick="closeModal()" class="fa-solid fa-xmark cerrar"></i>


        <div class="modal-header">
            <h2>EDITAR REGISTRO</h2>
        </div>

        <div class="modal-body">
            <form method="post" id="editForm" enctype="multipart/form-data" action="javascript:editarDatos()">


            <input type="hidden" name="id_usuario" id="id_usuario">
            <div class="col-12 mb-3">
                <label class="form-label" for="usuario">Nombre de Usuario:</label>
                <input class="form-control" type="text" id="usuario" name="usuario" required >
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
                        
                        <option id="ponerRol" data-nombre="<?php echo $rol->rol?>" value="<?php echo $rol->id_rol;?>"><?php echo $rol->rol; ?></option>
                    <?php endforeach;?>
                    </select>

            </div>
            <div class="modal-footer">
                      <div class="row col-12 g-2" >
                        <div class="col-6">
                            <button type="button" class="btn btn-dark w-100" onclick="closeModal()">Cancelar</button>
                        </div>
                        <div class="col-6">
                          <button type="submit" id="buttonEditar" class="btn color-logo w-100" onclick="closeModal()">Enviar</button>
                        </div>
                      </div>                        
                    </div>
            </form>

            </div>
        </div><!-- Fin modal-contenido -->
    </div><!-- Fin modal-container -->

 


<script type="text/javascript">
        // obtenemos el array de valores mediante la conversion a json del array de php        
        let arrayPHP = <?php echo json_encode($datos['usuarios']);?>;
        let arrayJS = arrayPHP.slice();
        let tableName = "Usuarios";
        console.log(arrayJS);

        /* Colocamos los atributos de la tabla */ 
        let atributos = [
        "nombre_usuario",
        "apellidos",
        "dni",
        "telefono",
        "email",
        "nombre_rol",
        "id_usuario" /* Clave siempre al final */
        ];

        

          /* Colocamos los atributos por los que se ordenará */
        // let ordenar = [

        // ]

          /* Funciones Edit y Borrar */
        let funciones = [
            <?php echo json_encode(RUTA_URL);?>, /* Directorio root */
            "usuario", /* controlador */
            "borrarusuario", /* función borrar */
            "editarusuario", /* función editar */
            "id_usuario", /* idUser */
        ];


        //  Funciones del Fetch 
        let arrayfetch = [
            "fetchVerDatos",
            "fetchEditarDatos",
        ];

        let formData =[
          "usuario",
          "apellidos",
          "dni",
          "telefono",
          "email",
          "id_rol",
          "id_usuario"
        ];

        

        </script>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>

