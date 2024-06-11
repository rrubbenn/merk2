<?php require_once RUTA_APP.'/vistas/inc/header.php'?>


<div class="container">
    <div class="row mt-5 mb-3">

        <div class="col-3 col-md-2 d-flex flex-column border-end m-0 p-0">
            <div class="p-3">
                <a href="<?php echo RUTA_URL?>/productos/<?php echo $datos['datosUsuario']->id_usuario ?>" class="text-decoration-none text-dark"> <div class="mt-3"> <h4> Productos </h4> </div> </a>
                <a href="<?php echo RUTA_URL?>/productos/compras/<?php echo $datos['datosUsuario']->id_usuario ?>" class="text-decoration-none text-dark"> <div class="mt-3"> <h4> Compras <h4> </div> </a>
                <a href="<?php echo RUTA_URL?>/productos/ventas/<?php echo $datos['datosUsuario']->id_usuario ?>" class="text-decoration-none text-dark"> <div class="mt-3"> <h4> <b> Ventas </b> </h4> </div> </a>
            </div>
        </div>
        <div class="col-9 col-md-10">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <?php foreach ($datos['ventas'] as $venta): ?>
                    <div class="col-6 col-md-4">
                        <div class="card-container h-100" style="position: relative;">
                            <div class="card h-100">
                                <img src="<?php echo RUTA_URL_STATIC ?>/imgbase/<?php echo $venta->ruta ?>" class="card-img-top imgcard" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"> <?php echo $venta->nombre_producto ?> </h5>
                                    <p class="card-text"> <?php echo $venta->descripcion ?> </p>
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
