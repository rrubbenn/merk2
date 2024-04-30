<?php require_once RUTA_APP.'/vistas/inc/header.php'?>


<div class="container">
    <div class="row mt-5">

        <div class="col-2 d-flex flex-column border-end">
            <div class="p-3">
                <a href="<?php echo RUTA_URL?>/productos/<?php echo $datos['usuarioSesion']->id_usuario ?>" class="text-decoration-none text-dark"> <div class="mt-3"> <h4> Productos </h4> </div> </a>
                <a href="<?php echo RUTA_URL?>/productos/compras/<?php echo $datos['usuarioSesion']->id_usuario ?>" class="text-decoration-none text-dark"> <div class="mt-3"> <h4> <b> Compras </b> <h4></div> </a>
                <a href="<?php echo RUTA_URL?>/productos/ventas/<?php echo $datos['usuarioSesion']->id_usuario ?>" class="text-decoration-none text-dark"> <div class="mt-3"> <h4> Ventas </h4> </div> </a>
            </div>  
        </div>
        <div class="col-9">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <?php foreach ($datos['compras'] as $compra): ?>
                    <div class="col-4">
                        <div class="card">
                            <img src="<?php echo RUTA_URL_STATIC ?>/imgbase/<?php echo $compra->ruta ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="row">
                                    <h5 class="card-title col-8"> <?php echo $compra->nombre_producto ?> </h5>
                                    <div class="col-4">
                                        <h5 class="card-title d-flex justify-content-end"> <?php echo $compra->precio ?> € </h5>
                                    </div>
                                </div>
                                <?php if($compra->puntuacion == ""): ?>
                                    <div class="row">
                                        <input type="hidden" id="id_venta" value="<?php echo $compra->id_venta ?>"> </input>
                                        <button onclick="openModal(this)" 
                                        class="col-10 offset-1 d-flex justify-content-center btn text-decoration-none text-dark mt-3 valorar"
                                        style="background-color: #A898D5">
                                            Valorar
                                        </button>
                                    </div>
                                <?php else: ?>
                                    <div class="row">
                                        <h5
                                        class="col-12 d-flex justify-content-center mt-3 valorar"
                                        style="color: #A898D5">
                                            Valoracion realizada!
                                        </h5>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

        </div>

    </div>
</div>

<div id="modalValorar" class="modal-container">
    <div class="modal-contenido">
        <i onclick="closeModal()" class="fa-solid fa-xmark cerrar"></i>
        <form method="post" id="formValorar" action="<?php echo RUTA_URL?>/valoraciones/addvaloracion">
                <div class="modal-header">
                    <h2>Valorar producto</h2>
                </div>
                <div class="modal-body d-flex">
                    <div class="col-12 border-end pe-4">
                        <input type="hidden" id="id_ventamodal" name="id_venta" value=""></input>

                        <label for="puntuacion">Puntuación</label>
                        <select class="form-select" name="puntuacion" id="puntuacion">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <label for="detalles">Más detalles</label>
                        <div class="input-group mb-3">
                            <textarea name="detalles" id="detalles" class="form-control"> </textarea>
                        </div> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" onclick="closeModal()">Cancelar</button>
                    <button type="submit" class="btn btn-outline-light participar" style="background-color: #A898D5;">Subir</button>
                </div>
        </form>
    </div>
</div>

</div>
<script>




</script>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
