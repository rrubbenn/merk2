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
                            <img src="<?php echo RUTA_URL_STATIC ?>/imgbase/<?php echo $producto->ruta ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 text-start">
                                        <h5 class="card-title"> <?php echo $producto->nombre_producto ?> </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-10 text-start">
                                        <h5 class="card-title"> <?php echo $producto->precio ?> € </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach ?>
    </div> 

    <nav class="mt-3" aria-label="...">
        <ul class="pagination justify-content-center">
            <?php if ($datos['pagina_actual'] > 1): ?>
                <li class="page-item">
                    <a class="page-link text-decoration-none text-dark" href="?pagina=<?php echo $datos['pagina_actual'] - 1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                </li>
            <?php else: ?>
                <li class="page-item disabled">
                    <span class="page-link" aria-hidden="true">&laquo;</span>
                </li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $datos['total_paginas']; $i++): ?>
                <?php $active_class = ($i === $datos['pagina_actual']) ? 'active' : ''; ?>
                <li class="page-item <?php echo $active_class; ?>">
                    <a  class="page-link text-decoration-none <?php echo $active_class ? 'text-light' : 'text-dark'; ?> <?php echo $active_class ? 'border' : ''; ?>" 
                        style="background-color: <?php echo $active_class ? '#A898D5' : '#fff'; ?>;" 
                        href="?pagina=<?php echo $i; ?>">
                            <?php echo $i; ?>
                    </a>
                </li>
            <?php endfor; ?>
            <?php if ($datos['pagina_actual'] < $datos['total_paginas']): ?>
                <li class="page-item">
                    <a class="page-link text-decoration-none text-dark" href="?pagina=<?php echo $datos['pagina_actual'] + 1; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </li>
            <?php else: ?>
                <li class="page-item disabled">
                    <span class="page-link" aria-hidden="true">&raquo;</span>
                </li>
            <?php endif; ?>
        </ul>
    </nav>

</div>

</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>

