<?php require_once RUTA_APP.'/vistas/inc/header.php'?>


<div class="container">
    <div class="row mt-5">

        <div class="col-3 col-md-2 d-flex flex-column border-end m-0 p-0">
            <div class="p-3">
                <a href="<?php echo RUTA_URL?>/productos/<?php echo $datos['datosUsuario']->id_usuario ?>" class="text-decoration-none text-dark"> <div class="mt-3"> <h4> Productos </h4> </div> </a>
                <a href="<?php echo RUTA_URL?>/productos/compras/<?php echo $datos['datosUsuario']->id_usuario ?>" class="text-decoration-none text-dark"> <div class="mt-3"> <h4> <b> Compras </b> <h4></div> </a>
                <a href="<?php echo RUTA_URL?>/productos/ventas/<?php echo $datos['datosUsuario']->id_usuario ?>" class="text-decoration-none text-dark"> <div class="mt-3"> <h4> Ventas </h4> </div> </a>
            </div>  
        </div>
        <div class="col-9 col-md-10">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <?php foreach ($datos['compras'] as $compra): ?>
                    <div class="col-6 col-md-4">
                        <div class="card-container h-100">
                            <div class="card h-100">
                                <img src="<?php echo RUTA_URL_STATIC ?>/imgbase/<?php echo $compra->ruta ?>" class="card-img-top imgcard" alt="...">
                                <div class="card-body">
                                    <div class="row d-flex flex-wrap">
                                        <h5 class="card-title col-12 col-md-8"> <?php echo $compra->nombre_producto ?> </h5>
                                        <div class="col-12 col-md-4">
                                            <h5 class="card-title d-flex justify-content-md-end"> <?php echo $compra->precio ?> € </h5>
                                        </div>
                                    </div>
                                    <?php if($compra->puntuacion == ""): ?>
                                        <?php if(!empty($datos['usuarioSesion'])):?>
                                            <?php if($datos['usuarioSesion']->id_usuario == $datos['datosUsuario']->id_usuario): ?>
                                                <div class="row">
                                                    <input type="hidden" id="id_venta" value="<?php echo $compra->id_venta ?>"> </input>
                                                    <button onclick="openModal(this)" 
                                                    class="col-10 offset-1 d-flex justify-content-center btn text-decoration-none text-dark mt-3 valorar"
                                                    style="background-color: #A898D5">
                                                        Valorar
                                                    </button>
                                                </div>
                                            <?php endif ?>
                                        <?php endif ?>
                                    <?php else: ?>
                                        <a class="row text-decoration-none" href="<?php echo RUTA_URL?>/valoraciones/<?php echo $compra->id_usuario ?>">
                                            <h5
                                            class="col-12 d-flex justify-content-center mt-3 valorar"
                                            style="color: #A898D5">
                                                Valoracion realizada!
                                            </h5>
                                        </a>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

        </div>

    </div>

    <?php if (!empty($datos['compras'])): ?>
    <nav class="mt-3" aria-label="...">
        <ul class="pagination justify-content-center">
            <?php if ($datos['pagina_actual'] > 1): ?>
                <li class="page-item">
                    <a class="page-link text-decoration-none text-dark" 
                    href="<?php echo RUTA_URL ?>/productos/compras/<?php echo $datos['datosUsuario']->id_usuario ?>/<?php echo $datos['pagina_actual'] - 1; ?>" aria-label="Previous">
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
                <?php $active_class = ($i === intval($datos['pagina_actual'])) ? 'active' : ''; ?>
                <li class="page-item <?php echo $active_class; ?>">
                    <a class="page-link text-decoration-none <?php echo $active_class ? 'text-light' : 'text-dark'; ?> <?php echo $active_class ? 'border' : ''; ?>" 
                        style="background-color: <?php echo $active_class ? '#A898D5' : '#fff'; ?>;" 
                        href="<?php echo RUTA_URL ?>/productos/compras/<?php echo $datos['datosUsuario']->id_usuario ?>/<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php endfor; ?>
            <?php if ($datos['pagina_actual'] < $datos['total_paginas']): ?>
                <li class="page-item">
                    <a class="page-link text-decoration-none text-dark" 
                    href="<?php echo RUTA_URL ?>/productos/compras/<?php echo $datos['datosUsuario']->id_usuario ?>/<?php echo $datos['pagina_actual'] + 1; ?>" aria-label="Next">
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
    <?php endif ?>
</div>

<div id="modalValorar" class="modal-container">
    <div class="modal-contenido">
        <i onclick="closeModal()" class="fa-solid fa-xmark cerrar"></i>
        <form method="post" id="formValorar" action="<?php echo RUTA_URL?>/valoraciones/addvaloracion">
                <div class="modal-header">
                    <h2>Valorar producto</h2>
                </div>
                <div class="modal-body d-flex">
                    <div class="col-12 border-md-end pe-md-4">
                        <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $datos['datosUsuario']->id_usuario ?>"></input>
                        <input type="hidden" id="id_ventamodal" name="id_venta" value=""></input>

                        <label for="puntuacion">Puntuación</label>
                        <select class="form-select" name="puntuacion" id="puntuacion">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <label for="comentario">Más detalles</label>
                        <div class="input-group mb-3">
                            <textarea name="comentario" id="comentario" class="form-control"> </textarea>
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
