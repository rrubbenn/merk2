<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
<div class="container">
    <div class="col-sm-12">
        <div class="row">
            <?php foreach ($datos["productos"] as $producto): ?>

                <div class="col-4 g-4 text-center" >
                    <div class="col-12"><a href="<?php echo RUTA_URL?>/Producto/ProductoEscogido/<?php echo $producto->id_producto ?>">
                        <div class="card-header borde-producto">
                            <img style="width:140px" src="<?php echo RUTA_URL_STATIC?>/img-bd/<?php echo $producto->imagen?>" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-uppercase"><?php echo $producto->nombre?></h5>
                            <p class="card-text color-letra"><?php echo $producto->precio?>€</p>
                            
                        </div></a>
                    </div>
                </div>

            <?php endforeach ?>
        </div>
    </div>
</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
