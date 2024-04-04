<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
<div class="container">
    <div class="col-sm-12 mb-5">
        <div class="row">
            <?php foreach ($datos["categorias"] as $categoria): ?>

                <div class="col-6 text-center border-0 g-3 div-imagen" >
                        <div class="col-12 h-100 d-flex justify-content-center align-items-center">
                            <h2 class="text-center color-letra texto-categoria"><?php echo $categoria->nombre_tipo?></h2>
                        </div>
                    <!-- <div class="row g-0"> -->
                        <!-- <div class="col-md-12"> -->
                            
                        <a href="<?php echo RUTA_URL?>/Producto/<?php echo $categoria->id_tipo?>" ><img src="<?php echo RUTA_URL_STATIC?>/img-bd/<?php echo $categoria->imagen?>" class="desvanecer"></a> 
                               
                        <!-- </div> -->
                    <!-- </div> -->
                </div>


            <?php endforeach ?>
        </div>
    </div>
</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
