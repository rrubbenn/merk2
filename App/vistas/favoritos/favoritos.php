<?php require_once RUTA_APP.'/vistas/inc/header.php'?>


<div class="container">
    <div class="row mt-5">

        <div class="col-2 d-flex flex-column border-end">
            <div class="">
                <a href="<?php echo RUTA_URL?>/Productos" class="text-decoration-none text-dark"> <div class="mt-3"> <h4> <b> Favoritos </b> </h4> </div> </a>
                
            </div>
        </div>
        <div class="col-9">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <?php foreach ($datos['favoritos'] as $favorito): ?>
                    <div class="col-4">
                        <div class="card">
                            <img src="<?php echo RUTA_URL_STATIC ?>/img/ejemplo1.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="col-11">
                                        <h5 class="card-title"> <?php echo $favorito->nombre_producto ?> </h5>
                                    </div>
                                    <div class="col-1">
                                        <a href="<?php echo RUTA_URL?>/Favorito/delFavorito">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <p class="card-text mt-1"> <?php echo $favorito->descripcion ?> </p>
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
