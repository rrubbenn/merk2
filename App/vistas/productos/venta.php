<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<div class="container">

    <div class="row">
        <div class="col-12 mt-3 mb-3 d-flex justify-content-center">
            <h3 class="text-center align-items-center"> Datos de pago </h3>
        </div>
        <form class="col-12" action="<?php echo RUTA_URL?>/productos/addventa/<?php echo $datos['producto']->id_producto ?>" method="post" id="formVenta">
            <div class="row">
                <div class="col-5">
                    <div class="mb-3 row d-flex">
                        <div class="col-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nombre">
                        </div>
                        <div class="col-6">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" aria-describedby="apellidos">
                        </div>
                    </div>
                    <div class="mb-3 row d-flex">
                        <div class="col-6">
                            <label for="provincia" class="form-label">Provincia</label>
                            <input type="text" class="form-control" id="provincia" name="provincia" aria-describedby="provincia">
                        </div>
                        <div class="col-6">
                            <label for="localidad" class="form-label">Localidad</label>
                            <input type="text" class="form-control" id="localidad" name="localidad" aria-describedby="localidad">
                        </div>
                    </div>
                    <div class="mb-3 row d-flex">
                        <div class="col-12">
                            <label for="calle" class="form-label">Calle</label>
                            <input type="text" class="form-control" id="calle" name="calle" aria-describedby="calle">
                        </div>
                    </div>
                    <div class="mb-3 row d-flex">
                        <div class="col-6">
                            <label for="numerocasa" class="form-label">Número</label>
                            <input type="text" class="form-control" id="numerocasa" name="numerocasa" aria-describedby="numerocasa">
                        </div>
                        <div class="col-6">
                            <label for="piso" class="form-label">Piso</label>
                            <input type="text" class="form-control" id="piso" name="piso" aria-describedby="piso">
                        </div>
                    </div>
                    <div class="mb-3 row d-flex">
                        <div class="col-6">
                            <label for="codigo_postal" class="form-label">Código Postal</label>
                            <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" aria-describedby="codigo_postal">
                        </div>
                    </div>
                </div>
                <div class="col-5 offset-2">
                    <div class="mb-3 row d-flex">
                        <div class="col-12">
                            <h4>Total a pagar: <?php echo $datos['producto']->precio?> €</h4>
                        </div>
                    </div>
                    <div class="mb-3 row d-flex">
                        <div class="col-12">
                            <label for="nombre_cuenta" class="form-label">Nombre del títular</label>
                            <input type="text" class="form-control" id="nombre_cuenta" name="nombre_cuenta" aria-describedby="nombre_cuenta">
                        </div>
                    </div>
                    <div class="mb-3 row d-flex">
                        <div class="col-12">
                            <label for="numero_cuenta" class="form-label">Número cuenta</label>
                            <input type="text" class="form-control" id="numero_cuenta" name="numero_cuenta" aria-describedby="numero_cuenta">
                        </div>
                    </div>
                    <div class="mb-3 row d-flex">
                        <div class="col-6">
                            <label for="fecha_cuenta" class="form-label">Fecha caducidad</label>
                            <input type="text" class="form-control" id="fecha_cuenta" name="fecha_cuenta" aria-describedby="fecha_cuenta">
                        </div>
                        <div class="col-6">
                            <label for="cvv_cuenta" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="cvv_cuenta" name="cvv_cuenta" aria-describedby="cvv_cuenta">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <button type="button" onclick="openModal(this)" class="cancelar btn col-2 btn-secondary row">Cancelar</button>
                <button type="button" onclick="openModal(this)" class="confirmar btn col-3 offset-1 btn btn-outline-light row " style="background-color: #A898D5;">Confirmar</button>
            </div>
        </form>
    </div>

</div>


<div id="modalCancelar" class="modal-container">
    <div class="modal-contenido">
        <i onclick="closeModal()" class="fa-solid fa-xmark cerrar"></i>
        <div class="modal-header border-0">
            <h2>¿Cancelar el pago?</h2>
        </div>
        <div class="modal-footer border-0">
            <button class="btn btn-outline-secondary" onclick="closeModal()">Seguir con la compra</button>
            <a href="<?php echo RUTA_URL?>/productos/producto/<?php echo $datos['producto']->id_producto ?>" class="btn btn-outline-light" style="background-color: #A898D5;">Volver atrás</a>
        </div>
    </div>
</div>

<div id="modalConfirmar" class="modal-container">
    <div class="modal-contenido">
        <i onclick="closeModal()" class="fa-solid fa-xmark cerrar"></i>
        <div class="modal-header border-0">
            <h2>¿Realizar la compra?</h2>
        </div>
        <div class="modal-footer border-0">
            <button type="button" class="btn btn-outline-secondary" onclick="closeModal()">Cancelar</button>
            <button type="button" class="btn participar" onclick="confirmarCompra()" style="background-color: #A898D5;">Finalizar compra</button>
        </div>
    </div>
</div>

</div>
</div>
<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
