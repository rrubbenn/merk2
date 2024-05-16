<?php require_once RUTA_APP.'/vistas/inc/header.php'?>


<div class="container">

    <div class="row mt-5">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php $primerElemento = true; ?>
                <?php foreach($datos['imagenes'] as $index => $imagen): ?>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $index; ?>" class="<?php echo $primerElemento ? 'active' : ''; ?>" <?php if ($primerElemento) echo 'aria-current="true"'; ?> aria-label="Slide <?php echo $index + 1; ?>"></button>
                    <?php $primerElemento = false; ?>
                <?php endforeach; ?>
            </div>
            <div class="carousel-inner">
            <?php $primerElemento = true; ?>
            <?php foreach($datos['imagenes'] as $imagen): ?>
                <div class="carousel-item <?php echo $primerElemento ? 'active' : ''; ?>">
                    <img src="<?php echo RUTA_URL_STATIC ?>/imgbase/<?php echo $imagen->ruta ?>" class="d-block w-100 imgproducto" alt="...">
                </div>
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

    <div class="row mt-5">
        <div class="d-flex">
            <div class="col-6">
                <h2> <?php echo $datos['producto']->nombre_producto ?> </h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <h2> <?php echo $datos['producto']->precio ?> € </h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="d-flex">
            <div class="col-6 col-lg-10 col-md-9">
                <h5> <?php echo $datos['producto']->descripcion ?> </h5>
            </div>
            <?php if(!empty($datos['usuarioSesion'])): ?>
                <?php if($datos['producto']->id_usuario != $datos['usuarioSesion']->id_usuario && $datos['producto']->existe_en_venta == false): ?>
                    <div class="col-3 col-md-1 text-end">
                        <?php if( $datos['esFavorito']->esFavorito == 'false'): ?>
                            <button onclick='marcardesmarcarFavorito(<?php echo json_encode(RUTA_URL) ?>, false, <?php echo $datos["producto"]->id_producto ?>)' class="btn btn-light unfav fs-5"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                </svg>
                            </button>
                            <button onclick='marcardesmarcarFavorito(<?php echo json_encode(RUTA_URL) ?>, true, <?php echo $datos["producto"]->id_producto ?>)' class="btn btn-light fs-5 fav d-none"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                </svg>
                            </button>
                        <?php elseif ($datos['esFavorito']->esFavorito == 'true'): ?>
                            <button onclick='marcardesmarcarFavorito(<?php echo json_encode(RUTA_URL) ?>, false, <?php echo $datos["producto"]->id_producto ?>)' class="btn btn-light fs-5 unfav d-none"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                </svg>
                            </button>
                            <button onclick='marcardesmarcarFavorito(<?php echo json_encode(RUTA_URL) ?>, true, <?php echo $datos["producto"]->id_producto ?>)' class="btn btn-light fav fs-5"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                </svg>
                            </button>
                        <?php endif ?>
                    </div>
                    
                    <div class="col-3 col-md-2 col-lg-1 text-end">
                        <a href="<?php echo RUTA_URL ?>/productos/venta/<?php echo $datos['producto']->id_producto ?>" class="btn btn-outline-light fs-5" style="background-color: #A898D5;"> Comprar </a>
                    </div>
                <?php endif ?>
            <?php endif ?>
        </div>
    </div>

    <hr>

    <div class="row my-4 d-flex align-items-center">
        <a class="col-6 text-decoration-none text-dark" href="<?php echo RUTA_URL?>/perfil/<?php echo $datos['vendedor']->id_usuario ?>">
            <div class="col-12 d-flex align-items-center mt-3">
                <div class="col-4 text-center">
                    <img src="<?php echo RUTA_URL_STATIC ?>/imgbase/<?php echo $datos['vendedor']->imagen_perfil ?>" class="card-img-top" id="imagenes" alt="...">
                </div>
                <div class="col-8 ms-2">
                    <h5 class="mb-0"> <strong> <?php echo $datos['vendedor']->nombre ?> </strong> </h5>
                </div>
            </div>
        </a>

        <div class="col-6 col-md-3 offset-md-3 mt-4">
            <a href="<?php echo RUTA_URL?>/Valoraciones/<?php echo $datos['vendedor']->id_usuario ?>" class="text-decoration-none">
                <div class="text-center text-decoration-none text-dark text-alignment-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                    </svg>
                    <p class="m-0"> Valoraciones </p>
                </div>
            </a>
        </div>
    </div>

</div>




</div>
</div>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
