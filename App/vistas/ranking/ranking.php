<?php require_once RUTA_APP.'/vistas/inc/header.php'?>



<div class="container">
    <div class="row mt-5">
        <div class="col-2 d-flex flex-column border-end m-0 p-0">
            
            <a href="#" class="text-decoration-none text-dark mt-5" onclick="mostrarVentas();"> <div class="mt-3"> <h4 id="pestanaVentas" class="fw-bold"> Ventas <h4> </div> </a>
            <a href="#" class="text-decoration-none text-dark" onclick="mostrarCompras();"> <div class="mt-3"> <h4 id="pestanaCompras" class=""> Compras </h4> </div> </a>
        </div>
        <div class="col-9">
            <div class="row d-flex">
                <div class="col-4">
                    <div class="input-group mb-3 col-2">
                        <label class="input-group-text" for="inputGroupSelect01">Periodo de tiempo</label>
                        <select class="form-select" name="tiempo" id="tiempo">
                            <option value="semana" selected>Última semana</option>
                            <option value="mes">Último mes</option>
                            <option value="anyo">Último año</option>
                        </select>
                    </div>
                </div>

                

                <div class="col-4">
                    <div class="input-group mb-3 col-2">
                        <label class="input-group-text" for="inputGroupSelect01">Categoría</label>
                        <select class="form-select" name="categoria" id="categoria">
                            <option value="" selected>Ninguna</option>
                            <?php foreach($datos['categorias'] as $categoria): ?>
                                <option value="<?php echo $categoria->id_categoria ?>"> <?php echo $categoria->nombre_categoria ?> </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="col-4">
                    <div class="text-center">
                        <div class="mb-3 text-start col-11">
                            <input type="text" class="form-control" id="buscadorranking" aria-describedby="buscador" style="width: 100%;">
                        </div>
                    </div>
                </div>
            
            </div>
            
            <div class="row ">
                <div class="col-2 d-flex justify-content-center">
                    <h4> Puesto </h4>
                </div>
                <div class="col-3 d-flex justify-content-center">
                    <h4> Nombre </h4>
                </div>
                <div class="col-3 d-flex justify-content-center">
                    <h4> Apellidos </h4>
                </div>
                <div class="col-2 d-flex justify-content-center">
                    <h4 id="tipoColumna"> Ventas </h4>
                </div>
                <div class="col-2 d-flex justify-content-center">
                    <h4> Valoraciones </h4>
                </div>
            </div>
            
            <div id="contenedor" class="row row-cols-1 row-cols-md-2 g-2">

            </div> 

            <nav class="mt-3" aria-label="...">
                <ul id="pagination" class="pagination justify-content-center">
                    
                </ul>
            </nav>

        </div>  
    </div>
</div>


<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>

<script>

var ruta = "<?php echo htmlspecialchars(RUTA_URL)?>";

var ventasConsulta = <?php echo json_encode($datos['ventas']); ?>;
var comprasConsulta = <?php echo json_encode($datos['compras']); ?>;

var datos = ventasConsulta;

var datosFiltrados = Object.values(calcularVentasPorUsuario(datos, tiempoSeleccionado, categoriaSeleccionada)); // Convertir el objeto ventas a un array de valores

var numeroporpagina = 10;
var totalPaginas = Math.ceil(datosFiltrados.length / numeroporpagina);
var paginaActual = 1;

actualizarPaginacion();
mostrarPagina(paginaActual);


var selectTiempo = document.getElementById('tiempo');
var tiempoSeleccionado = "";

// Agregar un event listener al elemento <select>
selectTiempo.addEventListener('change', function() {
    // Obtener el valor seleccionado del elemento <select>

    tiempoSeleccionado = selectTiempo.value;
    categoriaSeleccionada = selectCategoria.value;

    datosFiltrados = Object.values(calcularVentasPorUsuario(datos, tiempoSeleccionado, categoriaSeleccionada));

    paginaActual = 1;
    // Actualizar la vista llamando a la función mostrarPagina con los nuevos datos filtrados
    totalPaginas = Math.ceil(datosFiltrados.length / numeroporpagina);
    actualizarPaginacion();
    mostrarPagina(paginaActual); // Mostrar la primera página de los datos filtrados
});

var selectCategoria = document.getElementById('categoria');
var categoriaSeleccionada = "";

// Agregar un event listener al elemento <select>
selectCategoria.addEventListener('change', function() {
    // Obtener el valor seleccionado del elemento <select>
    categoriaSeleccionada = selectCategoria.value;
    tiempoSeleccionado = selectTiempo.value;

    datosFiltrados = Object.values(calcularVentasPorUsuario(datos, tiempoSeleccionado, categoriaSeleccionada));

    paginaActual = 1;
    // Actualizar la vista llamando a la función mostrarPagina con los nuevos datos filtrados
    totalPaginas = Math.ceil(datosFiltrados.length / numeroporpagina);
    actualizarPaginacion();
    mostrarPagina(paginaActual); // Mostrar la primera página de los datos filtrados
});

var buscador = document.getElementById('buscadorranking');
buscador.addEventListener('input', function() {
  // Obtener los resultados filtrados al escribir en el campo de búsqueda
    datosFiltrados = buscarProducto(this.value);

    totalPaginas = Math.ceil(datosFiltrados.length / numeroporpagina);
    mostrarPagina(paginaActual);
    actualizarPaginacion();

    datosFiltrados = Object.values(calcularVentasPorUsuario(datos, tiempoSeleccionado, categoriaSeleccionada));
});

cambiarContraste();

</script>


