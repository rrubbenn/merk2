<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<div class="container">
    <?php if($datos['carousel']): ?>
        <div class="mt-5 text-center">
            <h1 class="mt-5 text-start fw-bold"> Productos recién subidos! </h1>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <?php $primerElemento = true; ?>
                    <?php foreach($datos['ultimosProductos'] as $index => $producto): ?>
                        <button 
                        type="button" 
                        data-bs-target="#carouselExampleIndicators" 
                        data-bs-slide-to="<?php echo $index; ?>" 
                        class="<?php echo $primerElemento ? 'active' : ''; ?>" 
                        <?php if ($primerElemento) echo 'aria-current="true"'; ?> 
                        aria-label="Slide <?php echo $index + 1; ?>"></button>
                        <?php $primerElemento = false; ?>
                    <?php endforeach; ?>
                </div>
                <div class="carousel-inner">
                <?php $primerElemento = true; ?>
                <?php foreach($datos['ultimosProductos'] as $producto): ?>
                    <a href="<?php echo RUTA_URL?>/productos/producto/<?php echo $producto->id_producto?>" class="carousel-item <?php echo $primerElemento ? 'active' : ''; ?>">
                        <img src="<?php echo RUTA_URL_STATIC ?>/imgbase/<?php echo $producto->ruta ?>" class="d-block w-100 img-carousel" alt="...">
                    </a>
                    <?php $primerElemento = false; ?>
                <?php endforeach; ?>
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
        </div>
    <?php endif ?>

    <!--
    <div class="mt-5 text-center">
        <?php //if (empty($datos["usuarioSesion"])):?>
            <p> Registrate o inicia sesión para ver tus suscripciones! </p>
        <?php //else : ?>
            <p> Tus suscripciones! </p>
        <?php //endif ?>
    </div>
        -->

<div id="contenedor" class="row row-cols-1 row-cols-md-2 g-2 mt-3">
    <?php foreach ($datos['productos'] as $producto): ?>
        <div class="col-6 col-md-4 col-lg-3" id="producto_<?php echo $producto->id_producto ?>">
            <div class="card-container h-100">
                <div class="card h-100">
                    <a href="<?php echo RUTA_URL?>/productos/producto/<?php echo $producto->id_producto?>" class="text-decoration-none text-dark">
                        <img src="<?php echo RUTA_URL_STATIC ?>/imgbase/<?php echo $producto->ruta ?>" class="card-img-top imgcard" id="imagenes" alt="...">
                    </a>
                    <a href="<?php echo RUTA_URL?>/productos/producto/<?php echo $producto->id_producto?>" class="card-body text-decoration-none text-dark">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <h5 class="card-title col-12 col-md-8 mb-0"> <?php echo $producto->nombre_producto ?> </h5>
                            <div class="col-12 col-md-4">
                                <h5 class="card-title mb-0 text-md-end" id="precio"> <?php echo $producto->precio ?> € </h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

                                        
    <nav class="mt-3" aria-label="...">
        <ul class="pagination justify-content-center">
            <?php if ($datos['pagina_actual'] > 1): ?>
                <li class="page-item">
                    <a class="page-link text-decoration-none text-dark" 
                    href="<?php echo RUTA_URL ?>/<?php echo $datos['pagina_actual'] - 1; ?>" aria-label="Previous">
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
                <?php $active_class = ($i === intval($datos['pagina_actual'])) ? true : false; ?>
                <li class="page-item">
                    <a class="page-link text-decoration-none <?php echo $active_class ? 'text-light' : 'text-dark'; ?> <?php echo $active_class ? 'border' : ''; ?>" 
                        style="background-color: <?php echo $active_class ? '#A898D5' : '#fff'; ?>;" 
                        href="<?php echo RUTA_URL ?>/<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php endfor; ?>
            <?php if ($datos['pagina_actual'] < $datos['total_paginas']): ?>
                <li class="page-item">
                    <a class="page-link text-decoration-none text-dark" 
                    href="<?php echo RUTA_URL ?>/<?php echo $datos['pagina_actual'] + 1; ?>" aria-label="Next">
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
