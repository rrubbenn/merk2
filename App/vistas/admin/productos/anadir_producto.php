<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<div class="container">
<h1 class="text-center mt-5">Añadir Usuario</h1>

    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 mb-3">
                <label class="form-label" for="nombre">Nombre de Producto:</label>
                <input class="form-control" type="text" id="nombre" name="nombre" required >
            </div>
            <div class="col-12 mb-3">
                <label class="form-label" for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required ></textarea>
            </div>
            
            <div class="col-12 mb-3">
                <label class="form-label" for="fecha_cosecha">Fecha Cosecha:</label>
                <input class="form-control" type="date" id="fecha_cosecha" name="fecha_cosecha" required>
            </div>
            <div class="col-12 mb-3">

                <label class="form-label" for="id_tipo">Tipo:</label>

                    <select class="form-control" aria-label=".form-select-sm example" id="id_tipo" name="id_tipo">
                    <?php foreach ($datos['tipos'] as $tipo): ?> 
                        
                        <option value="<?php echo $tipo->id_tipo;?>"><?php echo $tipo->nombre; ?></option>
                    <?php endforeach;?>
                    </select>

            </div>
            <div class="col-12 mb-3">
                <label class="form-label" for="fecha_envasado">Fecha Envasado:</label>
                <input class="form-control" type="date" id="fecha_envasado" name="fecha_envasado" >
            </div>
            <div class="col-12 mb-3">
                <label class="form-label" for="peso_neto">Peso Neto:</label>
                <input class="form-control" type="text" id="peso_neto" name="peso_neto"  required>
            </div>
            <div class="col-12 mb-3">
                <label class="form-label" for="precio">Precio:</label>
                <input class="form-control" type="text" id="precio" name="precio"  required>
            </div>
           
            <div class="col-12 mb-3">
                <label class="form-label" for="stock">Stock:</label>
                <input class="form-control" type="text" id="stock" name="stock" required>
            </div>
            <div class="col-12 mb-3">
                <label class="form-label" for="fileToUpload">Imágen de Producto</label>
                <input class="form-control" type="file" id="fileToUpload" name="fileToUpload" required >
            </div>
            <div class="row col-12 g-2 mb-5" >
                <div class="col-6">
                    <a class="btn btn-dark mb-5 w-100" href="<?php echo RUTA_URL?>/Producto/listarProductos">Volver</a>

                </div>
                <div class="col-6">
                    <input class="btn color-logo mb-5 w-100" type="submit" value="Añadir" >
                </div>
            </div>
        </div>
        
        <!-- <div class="row">
            
        </div> -->
    </form>

</div>


<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
