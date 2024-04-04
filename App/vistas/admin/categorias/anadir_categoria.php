<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<div class="container">
<h1 class="text-center">Añadir Categoría</h1>

    <form method="post" enctype="multipart/form-data">
        <div class="row">

            <div class="col-12 mb-3">
                <label class="form-label" for="nombre">Nombre de Categoría:</label>
                <input class="form-control" type="text" id="nombre" name="nombre" required >
            </div>
            <div class="col-12 mb-3">
                <label class="form-label" for="fileToUpload">Imágen de Categoría</label>
                <input class="form-control" type="file" id="fileToUpload" name="fileToUpload" >
            </div>
            <div class="row col-12 g-2 mb-5" >
                <div class="col-6">
                    <a class="btn btn-dark mb-5 w-100" href="<?php echo RUTA_URL?>/Categoria/listarCategorias">Volver</a>

                </div>
                <div class="col-6">
                    <input class="btn color-logo mb-5 w-100" type="submit" value="Añadir" >
                </div>
            </div>
        </div>

        

    </form>

</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
