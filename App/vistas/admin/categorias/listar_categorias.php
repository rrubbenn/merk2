<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<div class="container">

    <h1 class="text-center">Lista de Categorías</h1>

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
            <a class="btn color-logo mb-3 w-100" href="<?php echo RUTA_URL?>/Categoria/anadirCategoria">Añadir</a>
        </div>
        <!-- Buscador -->
        <div class="col-sm-12 col-lg-11">
          <input type="text" class="form-control" onkeyup="buscador()" id="buscador" placeholder="Buscar...">   
        </div>
      </div>

    <table class="table">

        <thead>
            <tr>
                
                <th scope="col">Nombre</th>
                <th scope="col">Productos</th>
                <th></th>

            </tr>
        </thead>

    </table>

</div>


<!-- MODAL HTML -->
<div id="modal1" class="modal-container">
    <div class="modal-contenido">
        <i onclick="closeModal()" class="fa-solid fa-xmark cerrar"></i>
    

        <div class="modal-header ">
            <h2>ELIMINAR CATEGORÍA</h2>
        </div>

        <div class="modal-body">
            ¿Estás seguro de que quieres eliminar esta categoría?
            ¡SE PERDERÁN TODOS LOS PRODUCTOS QUE TENGAS ASOCIADOS A ESTA CATEGORÍA!
        </div>

        <div class="modal-footer">
            <button class="btn btn-outline-secondary" onclick="closeModal()">Cancelar</button>
            <a id="modalBorrar" href="">
            <button class="btn btn-outline-danger">Eliminar</button>
            </a>
        </div>

        </div><!-- Fin modal-contenido -->
    </div><!-- Fin modal-container -->

 


<script type="text/javascript">
        // obtenemos el array de valores mediante la conversion a json del array de php        
        let arrayPHP = <?php echo json_encode($datos['categorias']);?>;
        let arrayJS = arrayPHP.slice();
        let tableName = "Categorias";
        console.log(arrayJS);

        /* Colocamos los atributos de la tabla */ 
        let atributos = [
        "nombre_tipo",
        "contador_filas",
        "id_tipo" /* Clave siempre al final */
        ];

        

          /* Colocamos los atributos por los que se ordenará */
        // let ordenar = [

        // ]

          /* Funciones Edit y Borrar */
        let funciones = [
            <?php echo json_encode(RUTA_URL);?>, /* Directorio root */
            "categoria", /* controlador */
            "EliminarCategoria", /* función borrar */
            "EditarCategoria", /* función editar */
            "id_tipo", /* idUser */
        ];


        /* Funciones del Fetch */
        // let arrayfetch = [
        //     "fetchVerDatos",
        //     "fetchEditarDatos",
        // ];

        // let formData =[
        //     "nombre", 
        //     "apellidos",
        //     "DNI",
        //     "telefono",
        //     "correo",
        //     "fechaNacimiento",
        //     "cursoActual",
        //     "idPersona",
        // ];


        </script>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
