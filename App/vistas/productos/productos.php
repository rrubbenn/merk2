<?php require_once RUTA_APP.'/vistas/inc/header.php'?>


<div class="container">
    <div class="row mt-5 mb-3">

        <div class="col-3 col-md-2 d-flex flex-column border-end m-0 p-0">
            <div class="mt-3 p-0"> 
                <?php if($datos['usuarioSesion']->id_usuario == $datos['datosUsuario']->id_usuario): ?>
                    <button class="btn btn-outline-light fs-5 d-flex align-items-center anadir col-11 p-1 m-1" onclick="openModal(this)" style="background-color: #A898D5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                        </svg>
                        
                        <span class="ms-3 fs-5" style="margin-top:1.5%"> Subir </span>
                    </button> 
                <?php endif ?>
            </div> 
            <div class="p-3">
                <a href="<?php echo RUTA_URL?>/productos/<?php echo $datos['datosUsuario']->id_usuario ?>" class="text-decoration-none text-dark"> <div class="mt-3"> <h4> <b> Productos </b> </h4> </div> </a>
                <a href="<?php echo RUTA_URL?>/productos/compras/<?php echo $datos['datosUsuario']->id_usuario ?>" class="text-decoration-none text-dark"> <div class="mt-3"> <h4> Compras <h4> </div> </a>
                <a href="<?php echo RUTA_URL?>/productos/ventas/<?php echo $datos['datosUsuario']->id_usuario ?>" class="text-decoration-none text-dark"> <div class="mt-3"> <h4> Ventas </h4> </div> </a>
            </div>
        </div>
        <div class="col-9 col-md-10">
            <div class="row row-cols-1 row-cols-md-2 g-4" id="contenedor">
                <?php foreach ($datos['productos'] as $producto): ?>
                    <div class="col-6 col-md-4" id="producto_<?php echo $producto->id_producto ?>">
                        <div class="card-container h-100" style="position: relative;">
                            <div class="card h-100">
                                <a href="<?php echo RUTA_URL?>/productos/producto/<?php echo $producto->id_producto?>" class="text-decoration-none text-dark">
                                    <img src="<?php echo RUTA_URL_STATIC ?>/imgbase/<?php echo $producto->ruta ?>" class="card-img-top imgcard" id="imagenes" alt="...">
                                </a>
                                <?php if($datos['usuarioSesion']->id_usuario == $datos['datosUsuario']->id_usuario || $datos['usuarioSesion']->id_rol === 1): ?>
                                    <a href="#" class="btn-light rounded text-decoration-none text-dark p-1" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" data-toggle="tooltip" data-placement="top" title="Editar" aria-expanded="false" style="position: absolute; top: 10px; right: 10px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                        </svg>
                                    </a>
                                    <ul class="dropdown-menu" style="position: absolute; top: 100%; right: 0;" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item editar" href="#" id="<?php echo $producto->id_producto ?>" onclick="openModal(this)">Editar</a></li>
                                        <li><a class="dropdown-item text-danger borrar" href="#" id="<?php echo $producto->id_producto ?>" onclick="openModal(this)">Borrar</a></li>
                                    </ul>
                                <?php endif ?>
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
        </div>  

    </div>
</div>
<?php if (!empty($datos['productos'])): ?>
    <nav class="mt-3" aria-label="...">
        <ul class="pagination justify-content-center">
            <?php if ($datos['pagina_actual'] > 1): ?>
                <li class="page-item">
                    <a class="page-link text-decoration-none text-dark" 
                    href="<?php echo RUTA_URL ?>/productos/<?php echo $datos['datosUsuario']->id_usuario ?>/<?php echo $datos['pagina_actual'] - 1; ?>" aria-label="Previous">
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
                        href="<?php echo RUTA_URL ?>/productos/<?php echo $datos['datosUsuario']->id_usuario ?>/<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php endfor; ?>
            <?php if ($datos['pagina_actual'] < $datos['total_paginas']): ?>
                <li class="page-item">
                    <a class="page-link text-decoration-none text-dark" 
                    href="<?php echo RUTA_URL ?>/productos/<?php echo $datos['datosUsuario']->id_usuario ?>/<?php echo $datos['pagina_actual'] + 1; ?>" aria-label="Next">
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

<div id="modalAnadir" class="modal-container">
    <div class="modal-contenido">
        <i onclick="closeModal()" class="fa-solid fa-xmark cerrar"></i>
            <form method="post" 
            enctype="multipart/form-data"
            action="javascript:addDatos(event)"
            id="formAnadir"
            data-rutafija="<?php echo htmlspecialchars(RUTA_URL.'/Productos')?>"
            data-ruta="<?php echo htmlspecialchars(RUTA_URL.'/Productos/addproducto')?>"
            data-tipo="producto">
                <div class="modal-header">
                    <h2>Añadir Producto</h2>
                </div>
                <div class="modal-body d-flex flex-wrap">
                    <div class="col-12 col-md-7 border-md-end pe-md-4">
                        <input type="hidden" name="id_usuario" value="<?php echo $datos['usuarioSesion']->id_usuario ?>"></input>

                        <label for="anadir_id_categoria">Categoria</label>
                        <select class="form-select" name="id_categoria" id="anadir_id_categoria">
                            <option selected>Selecciona una categoria</option>
                        </select>
                        <label for="anadir_nombre_producto">Nombre del producto</label>
                        <div class="input-group mb-3">
                            <input type="text" name="nombre_producto" id="anadir_nombre_producto" class="form-control" maxlength="20">
                        </div> 

                        <label for="anadir_descripcion">Descripcion</label>
                        <div class="input-group mb-3">
                            <textarea name="descripcion" id="anadir_descripcion" class="form-control" maxlength="250"> </textarea>
                        </div> 

                        <label for="anadir_precio">Precio</label>
                        <div class="col-12 col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">€</span>
                                <input type="text" name="precio" id="anadir_precio" class="form-control">
                            </div>
                        </div>
                        
                        <!-- <input type="text" name="negociable"></input> -->
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="col-12 col-md-10 offset-md-1">
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Subir Fotos</label>
                                <input class="form-control" name="imagenes[]" type="file" id="formFile" multiple max="10">
                            </div>
                        </div>
                    </div>
                    

                </div>
                <div class="modal-footer d-flex">
                    <button type="button" class="btn btn-outline-secondary col-12 col-md-3 col-lg-2" onclick="closeModal()">Cancelar</button>
                    <button type="submit" class="btn btn-outline-light participar col-12 col-md-4 col-lg-3" style="background-color: #A898D5;">Subir</button>
                </div>
            </form>
    </div>
</div>

<div id="modalEditar" class="modal-container">
    <div class="modal-contenido">
        <i onclick="closeModal()" class="fa-solid fa-xmark cerrar"></i>
            <form method="post" 
            action="javascript:editarDatos(event)" 
            id="formEditar"
            data-rutafija="<?php echo htmlspecialchars(RUTA_URL.'/Productos')?>"
            data-rutarellenar="<?php echo htmlspecialchars(RUTA_URL.'/Productos/get_datosproducto')?>"
            data-ruta="<?php echo htmlspecialchars(RUTA_URL.'/Productos/editproducto')?>"
            data-rutastatic="<?php echo htmlspecialchars(RUTA_URL_STATIC)?>"
            data-tipo="producto">
                <div class="modal-header">
                    <h2>Editar Producto</h2>
                </div>
                <div class="modal-body d-flex flex-wrap">
                    <div class="col-12 col-md-7 border-md-end pe-4">
                        <input type="hidden" name="id_producto" id="id_producto" class="id_producto" value=""></input>

                        <label for="nombre_producto">Categoria</label>
                        <select class="form-select" name="id_categoria" id="editar_id_categoria" aria-label="Default select example">
                            <option selected>Selecciona una categoria</option>
                        </select>
                        <label for="nombre_producto">Nombre del producto</label>
                        <div class="input-group mb-3">
                            <input type="text" name="nombre_producto" id="editar_nombre_producto" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="" maxlength="20">
                        </div> 

                        <label for="nombre_producto">Descripcion</label>
                        <div class="input-group mb-3">
                            <input type="text" name="descripcion" id="editar_descripcion" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="" maxlength="250">
                        </div> 

                        <label for="nombre_producto">Precio</label>
                        <div class="col-12 col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text">€</span>
                                <input type="text" name="precio" id="editar_precio" class="form-control" aria-label="Amount (to the nearest dollar)" value="">
                            </div>
                        </div>
                        
                        <!-- <input type="text" name="negociable"></input> -->
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="col-11 col-md-10 offset-md-1">
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Subir Fotos</label>
                                <input class="form-control" name="imagenes[]" type="file" id="formFile" multiple max="10">
                            </div>
                        </div>
                    </div>
                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary col-12 col-md-3 col-lg-2" onclick="closeModal()">Cancelar</button>
                    <button type="submit" class="btn btn-outline-light participar col-12 col-md-4 col-lg-3" style="background-color: #A898D5;">Editar</button>
                </div>
            </form>
    </div>
</div>

<div id="modalBorrar" class="modal-container">
    <div class="modal-contenido">
        <i onclick="closeModal()" class="fa-solid fa-xmark cerrar"></i>
            <form method="post" 
            action="javascript:borrarDatos()" 
            id="formBorrar"
            data-ruta="<?php echo htmlspecialchars(RUTA_URL.'/Productos/delproducto')?>"
            data-tipo="producto">
                <input type="hidden" name="id_producto" id="id_producto_borrar" value=""></input>
                <div class="modal-header">
                    <h2>Borrar Producto</h2>
                </div>
                <div class="modal-body d-flex">
                    ¿Está seguro de que quiere eliminar el producto?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" onclick="closeModal()">Cancelar</button>
                    <button type="submit" class="btn btn-outline-light participar" style="background-color: #A898D5;">Borrar</button>
                </div>
            </form>
    </div>
</div>



<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>



