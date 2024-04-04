<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<div class="container">

    <h1 class="text-center">Carrito</h1>

    <?php if($datos['usuarioSesion']->id_usuario == $datos["carrito"][0]->id_cliente):?>

      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" onclick="paginar(this)">Anterior</a>
            </li>

            <li class="page-item disabled"><a class="page-link" href="#" onclick="paginar(this)">1</a></li>
            <li class="page-item"><a class="page-link" href="#" onclick="paginar(this)">2</a></li>
            <li class="page-item"><a class="page-link" href="#" onclick="paginar(this)">3</a></li>

            <li class="page-item">
            <a class="page-link" href="#" onclick="paginar(this)">Siguiente</a>
            </li>
        </ul>
      </nav>

      <table class="table border">
        <thead class="border">
          <tr>
            <th scope="col">Producto</th>
            <th scope="col">Precio €</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Subtotal €</th>
            <th></th>
          </tr>
        </thead>

      </table>

      <div class="row mt-5 ">
        <div class="col-6">

        </div>
        <div class="col-6 text-center">
            <a class="btn color-logo w-75 p-3" href="<?php echo RUTA_URL?>/Carrito/FinalizarCompra"><h4>Finalizar compra</h4></a>
        </div>
      </div>
      <?php else: ?>

        <div class="text-center">
          <h2>No hay productos</h2>
          <a class="btn color-logo" href="<?php echo RUTA_URL?>/Categoria/">Volver a la tienda</a>
        </div>
      
      <?php endif ?>
</div>

      <div id="modal1" class="modal-container">
        <div class="modal-contenido">
          <i onclick="closeModal()" class="fa-solid fa-xmark cerrar"></i>
          <div class="modal-header">
              <h2>ELIMINAR PRODUCTO</h2>
          </div>
          <div class="modal-body">
            ¿Estás seguro de que quieres eliminar este producto del carrito?
          </div>
          <div class="modal-footer">
              <button class="btn btn-outline-secondary" onclick="closeModal()">Cancelar</button>
              <a id="modalBorrar" href="">
                <button class="btn btn-outline-danger">Eliminar</button>
              </a>
          </div>
        </div><!-- Fin modal-contenido -->
      </div><!-- Fin modal-container -->


    <script type="text/javascript">
        
        // obtenemos el array de valores mediante la conversion a json del array de php        
        let arrayPHP = <?php echo json_encode($datos['carrito']);?>;
        let arrayJS = arrayPHP.slice();
        let tableName = "Carrito";

        console.log(arrayJS);


        /* Colocamos los atributos de la tabla */ 
        let atributos = [
        "nombre_producto",
        "precio",
        "cantidad",
        "subtotal",
        "id_carrito" /* Clave siempre al final */
        ];

          /* Funciones Edit y Borrar */
          let funciones = [
            <?php echo json_encode(RUTA_URL);?>, /* Directorio root */
            "carrito", /* controlador */
            "EliminarCarrito", /* función borrar */
            "id_carrito", /* idUser */
        ];


    </script>


    

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>