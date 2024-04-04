<?php require_once RUTA_APP.'/vistas/inc/header.php'?>



<div class="container">
    <div class="row">
        <div class="col-6">
            <h1>Detalles de facturación</h1>
            <form action="">
                <div class="row g-3 mb-3">
                    <div class="col-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="col-6">
                        <label for="appellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="appellidos" name="appellidos">
                    </div>
                </div>
                <div class="col-12 g-3 mb-3">
                    <label for="pais" class="form-label">Pais</label>
                    <select name="pais" id="pais" class="form-control">
                        <?php foreach ($datos['paises'] as $pais): ?> 
                            
                            <option value="<?php echo $pais->id_pais;?>"><?php echo $pais->paisnombre; ?></option>
                        
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="col-12 g-3 mb-3">
                    <label for="estado" class="form-label">Estado / Provincia</label>
                    <select name="estado" id="estado" class="form-control">
                        <?php foreach ($datos['estados'] as $estado): ?> 
                            
                            <option value="<?php echo $estado->id_estado;?>"><?php echo $estado->estadonombre; ?></option>
                        
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="col-12 g-3 mb-3">
                    <label for="poblacion" class="form-label">Población</label>
                    <input type="text" class="form-control" id="poblacion" name="poblacion">
                </div>
                <div class="col-12 g-3 mb-3">
                    <label for="cp" class="form-label">Código postal</label>
                    <input type="text" class="form-control" id="cp" name="cp">
                </div>
                <div class="col-12 g-3 mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion">
                </div>
                <div class="col-12 g-3 mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono">
                </div>
                <div class="col-12 g-3 mb-3">
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="text" class="form-control" id="correo" name="correo">
                </div>
            </form>
        </div>
        <div class="col-6">

        </div>
    </div>
</div>

<script>

var select_box_element = document.querySelector('#pais');

dselect(select_box_element, {
search: true
});

</script>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>