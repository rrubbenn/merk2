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
        <?php foreach ($datos['productos'] as $producto): ?>
            <div class="col-4" id="producto_<?php echo $producto->id_producto ?>">
                <div class="card-container" style="position: relative;">
                    <div class="card">
                        <a href="<?php echo RUTA_URL?>/productos/producto/<?php echo $producto->id_producto?>" class="text-decoration-none text-dark">
                            <img src="<?php echo RUTA_URL_STATIC ?>/imgbase/<?php echo $producto->ruta ?>" class="card-img-top" id="imagenes" alt="...">
                        </a>
                        <a href="<?php echo RUTA_URL?>/productos/producto/<?php echo $producto->id_producto?>" class="card-body text-decoration-none text-dark">
                            <div class="d-flex">
                                <h5 class="card-title col-8" id="nombre_producto"> <?php echo $producto->nombre_producto ?> </h5>
                                <div class="col-4 d-flex justify-content-end">
                                    <h5 class="card-title" id="precio"> <?php echo $producto->precio ?> € </h5>
                                </div>
                            </div>
                            <p class="card-text" id="descripcion"> <?php echo $producto->descripcion ?> </p>
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
                <?php $active_class = ($i === $datos['pagina_actual']) ? 'active' : ''; ?>
                <li class="page-item <?php echo $active_class; ?>">
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
