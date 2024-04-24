<?php require_once RUTA_APP.'/vistas/inc/header.php'?>



<div class="container">
    <div class="row mt-5">
        <div class="col-2 d-flex flex-column border-end m-0 p-0">
            
            <a href="" class="text-decoration-none text-dark mt-5"> <div class="mt-3"> <h4> <b> Ventas </b> <h4> </div> </a>
            <a href="" class="text-decoration-none text-dark"> <div class="mt-3"> <h4> Compras </h4> </div> </a>
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
                            <option selected>Ninguna</option>
                            <?php foreach($datos['categorias'] as $categoria): ?>
                                <option value="<?php echo $categoria->id_categoria ?>"> <?php echo $categoria->nombre_categoria ?> </option>
                            <?php endforeach ?>
                        </select>
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
                    <h4> Compras </h4>
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

var ruta = "<?php echo htmlspecialchars(RUTA_URL.'/Ranking')?>";

var datos = <?php echo json_encode($datos['ventas']); ?>;
var ventas = calcularVentasPorUsuario(datos);
var datosFiltrados = Object.values(ventas); // Convertir el objeto ventas a un array de valores

var numeroporpagina = 20;
var totalPaginas = Math.ceil(datosFiltrados.length / numeroporpagina);
var paginaActual = 1;

actualizarPaginacion();
mostrarPagina(paginaActual);


</script>


