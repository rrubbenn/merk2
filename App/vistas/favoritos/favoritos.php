<?php require_once RUTA_APP.'/vistas/inc/header.php'?>


<div class="container">
    <div class="row mt-5 mb-3">

        <div class="col-3 col-md-2 d-flex flex-column border-end">
            <div class="">
                <a href="<?php echo RUTA_URL?>/Productos" class="text-decoration-none text-dark"> <div class="mt-3"> <h4> <b> Favoritos </b> </h4> </div> </a>
                
            </div>
        </div>
        <div class="col-9 col-md-10">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <?php foreach ($datos['favoritos'] as $favorito): ?>
                    <div id="producto_<?php echo $favorito->id_producto ?>" class="col-6 col-md-4">
                        <div class="card-container h-100" style="position: relative;">
                            <div class="card h-100">
                                <a href="<?php echo RUTA_URL?>/productos/producto/<?php echo $favorito->id_producto?>" class="text-decoration-none text-dark">
                                    <img src="<?php echo RUTA_URL_STATIC ?>/imgbase/<?php echo $favorito->ruta ?>" class="card-img-top" id="imagenes" alt="...">
                                </a>
                                <div class="card-body pt-2">
                                    <div class="d-flex align-items-center">
                                        <a href="<?php echo RUTA_URL?>/productos/producto/<?php echo $favorito->id_producto?>" class="text-decoration-none text-dark col-9">
                                            <h5 class="card-title mb-0"> <?php echo $favorito->nombre_producto ?> </h5>
                                        </a>
                                        <div class="col-2 col-md-2 offset-md-1 d-flex justify-content-around">
                                            <button onclick='marcardesmarcarFavorito(<?php echo json_encode(RUTA_URL) ?>, true, <?php echo $favorito->id_producto ?>)' class="btn fav">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                                </svg>
                                            </button>
                                            <button onclick='marcardesmarcarFavorito(<?php echo json_encode(RUTA_URL) ?>, false, <?php echo $favorito->id_producto ?>)' class="btn unfav d-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="red" class="bi bi-heart" viewBox="0 0 16 16">
                                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.920 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <a href="<?php echo RUTA_URL?>/productos/producto/<?php echo $favorito->id_producto?>" class="card-text mt-3 text-decoration-none text-dark col-12 d-none d-md-flex"> 
                                        <?php echo $favorito->descripcion ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

    </div>
</div>

</div>
<script>




</script>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
