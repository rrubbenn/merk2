<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<div class="row border-bottom d-none position-absolute bg-light w-100 m-0" id="divCategorias">
    <div class="row mt-3 col-6 offset-3">
        <a href="javascript:void(0)" onclick="buscarProductoBoton(this)" data-categoria="" class="position-relative text-decoration-none text-dark p-0 m-0"> 
            <h5 class="position-relative top-0 end-0 ms-5"> X </h5>
        </a>
        <?php foreach ($datos['categorias'] as $categoria): ?>
            <a href="javascript:void(0)" onclick="buscarProductoBoton(this)" data-categoria="<?php echo $categoria->id_categoria ?>" class="col-3 text-decoration-none text-dark p-0 m-0"> 
                <h5 class="ms-5"> <?php echo $categoria->nombre_categoria ?> </h5>
            </a>
        <?php endforeach ?>
        
    </div>
</div>

<div class="container">
    <div class="mt-5 text-center">
        <h1 class="mt-5 text-start fw-bold"> Productos recién subidos! </h1>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="<?php echo RUTA_URL_STATIC ?>/img/ejemplo1.png" class="img-carousel d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo RUTA_URL_STATIC ?>/img/ejemplo1.png" class="img-carousel d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo RUTA_URL_STATIC ?>/img/ejemplo1.png" class="img-carousel d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    <div class="mt-5 text-center">
        <?php if (empty($datos["usuarioSesion"])):?>
            <p> Registrate o inicia sesión para ver tus suscripciones! </p>
        <?php else : ?>
            <p> Tus suscripciones! </p>
        <?php endif ?>
    </div>

    <div id="contenedor" class="row row-cols-1 row-cols-md-2 g-2">
    </div> 

                                        
    <nav class="mt-3" aria-label="...">
    <ul id="pagination" class="pagination justify-content-center">
        
    </ul>
</nav>
                                

</div>

</div>



<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>

<script>

var datos = <?php echo json_encode($datos['productos']); ?>;

var datosFiltrados = datos;

var numeroporpagina = 20;
var totalPaginas = Math.ceil(datosFiltrados.length / numeroporpagina);
var paginaActual = 1;

var rutastatic = <?php echo json_encode(RUTA_URL_STATIC); ?>;
var ruta = <?php echo json_encode(RUTA_URL) ?>+"/productos/producto/";
var tipo = "producto";

// esta linea muestra los primeros productos de la pagina para que no este vacia
actualizarPaginacion();
mostrarPagina(paginaActual);


</script>