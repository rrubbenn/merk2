<?php require_once RUTA_APP.'/vistas/inc/header.php'?>


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

    <div class="row row-cols-1 row-cols-md-2 g-2">
        <?php foreach ($datos['productos'] as $producto): ?>
            <div class="col-3" id="producto_<?php echo $producto->id_producto ?>">
                <a href="<?php echo RUTA_URL?>/productos/producto/<?php echo $producto->id_producto?>" class="text-decoration-none text-dark">
                    <div class="card-container" style="position: relative;">
                        <div class="card">
                            <img src="<?php echo RUTA_URL_STATIC ?>/img/ejemplo1.png" class="card-img-top imgcard" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"> <?php echo $producto->nombre_producto ?> </h5>
                                <h5 class="card-title"> <?php echo $producto->precio ?> € </h5>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach ?>
    </div> 


  
</div>

</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>

