<?php require_once RUTA_APP.'/vistas/inc/header.php'?>
<?php $id_cliente = $datos["usuarioSesion"]->id_usuario; ?>
<div class="container">

    <div class="row">
        <?php foreach ($datos["productos"] as $producto): ?>

            <div class="col-6 text-center">
                <img style="width:200px" src="<?php echo RUTA_URL_STATIC?>/img-bd/<?php echo $producto->imagen?>" alt="">
            </div>
            <div class="col-6 pt-5">
                <h1 class="pb-3"><?php echo $producto->nombre ?></h1>
                <p class="pb-3"><?php echo $producto->descripcion ?></p>
                <p class=" color-letra display-6"><?php echo $producto->precio ?> €</p>
                <form method="post" action="<?php RUTA_URL?>/Carrito/comprarCarrito/">
                    
                    <input type="hidden" id="precio" name="precio" value="<?php echo $producto->precio ?>">
                    <input type="number" id="cantidad" name="cantidad" min="0" class="form-control contador mb-3" style="background: transparent" value="1" step="1">
                    <input type="hidden" id="id_cliente" name="id_cliente" value="<?php echo $id_cliente ?>">
                    <input type="hidden" id="id_producto" name="id_producto" value="<?php echo $producto->id_producto ?>">
                    <input type="submit" class="btn color-logo" value="Añadir al carrito">
                </form>
            </div>

        <?php endforeach ?>

    </div>
</div>




<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
