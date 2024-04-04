<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

<div class="container">
<h1 class="text-center">Lista de Productos</h1>

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

      <div class="row g-3 my-4">
        <div class="col-lg-1">
            <a class="btn color-logo mb-3 w-100" href="<?php echo RUTA_URL?>/Producto/anadirProducto">Añadir</a>
        </div>
        <!-- Buscador -->
        <div class="col-sm-12 col-lg-9">
          <input type="text" class="form-control" onkeyup="buscador()" id="buscador" placeholder="Buscar...">   
        </div>
        <div class="col-lg-2 text-center">
            <a class="color-logo btn w-100" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Filtrar por Tipo
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <!-- Filtro -->
              <?php foreach ($datos['categorias'] as $categoria ): ?>    
                <li><a class="dropdown-item" href="#" id="<?php echo $categoria -> id_tipo?>" onclick="filtrar(this, 'id_tipo')"><?php echo $categoria -> nombre?></a></li>
              <?php endforeach; ?>
                <li><a class="dropdown-item" href="#" id="todos" onclick="filtrar(this)">Todos</a></li>
            </ul>
        </div>
      </div>



<table class="table">
  <thead>
    <tr>
        <th scope="col">Producto</th>
        <th scope="col">Tipo</th>
        <th scope="col">Fecha Cosecha <i id="nombre" onclick="paginar(this)" class="fa-solid fa-arrow-up-wide-short ordenar"></i></th>
        <th scope="col">Fecha Envasado <i id="nombre" onclick="paginar(this)" class="fa-solid fa-arrow-up-wide-short ordenar"></i></th>
        <th scope="col">Peso Neto (gramos) <i id="nombre" onclick="paginar(this)" class="fa-solid fa-arrow-up-wide-short ordenar"></i></th></th>
        <th scope="col">Precio € <i id="nombre" onclick="paginar(this)" class="fa-solid fa-arrow-up-wide-short ordenar"></i></th></th>
        <th scope="col">Stock <i id="nombre" onclick="paginar(this)" class="fa-solid fa-arrow-up-wide-short ordenar"></i></th></th>
        <th></th>

    </tr>
  </thead>


</table>

</div>

<!-- MODAL HTML -->
<div id="modal1" class="modal-container">
    <div class="modal-contenido">
        <i onclick="closeModal()" class="fa-solid fa-xmark cerrar"></i>
    

        <div class="modal-header">
            <h2>ELIMINAR PRODUCTO</h2>
        </div>

        <div class="modal-body">
          ¿Estás seguro de que quieres eliminar este producto?
        </div>

        <div class="modal-footer">
            <button class="btn btn-outline-secondary" onclick="closeModal()">Cancelar</button>
            <a id="modalBorrar" href="">
            <button class="btn btn-outline-danger">Eliminar</button>
            </a>
        </div>

        </div><!-- Fin modal-contenido -->
    </div><!-- Fin modal-container -->






        <!-- MODAL EDITAR HTML -->
        <div id="modalEdit" class="modal-container">
    <div class="modal-contenido">
        <i onclick="closeModal()" class="fa-solid fa-xmark cerrar"></i>


        <div class="modal-header">
            <h2>EDITAR REGISTRO</h2>
        </div>

        <div class="modal-body">
            <form method="post" id="editForm" enctype="multipart/form-data" action="javascript:editarDatos()">

            <input type="hidden" id="id_producto" name="id_producto">

              <div class="row">
                    <div class="col-12 mb-3 g-2">
                        <label class="form-label" for="nombre">Nombre de Producto:</label>
                        <input class="form-control" type="text" id="nombre" name="nombre" >
                    </div>
                    <div class="col-12 mb-3 g-2">

                        <label class="form-label" for="id_tipo">Tipo:</label>

                            <select class="form-control" aria-label=".form-select-sm example" id="id_tipo" name="id_tipo">
                            <?php foreach ($datos['categorias'] as $categoria): ?> 
                                
                                <option value="<?php echo $categoria->id_tipo;?>"><?php echo $categoria->nombre; ?></option>
                            <?php endforeach;?>
                            </select>

                    </div>
                    <div class="col-12 mb-3 g-2">
                        <label class="form-label" for="descripcion">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" ></textarea>
                    </div>
                    
                    <div class="row col-12 mb-3 g-2">
                      <div class="col-6">
                        <label class="form-label" for="fecha_cosecha">Fecha Cosecha:</label>
                        <input class="form-control" type="date" id="fecha_cosecha" name="fecha_cosecha">
                      </div>
                      <div class="col-6">
                        <label class="form-label" for="fecha_envasado">Fecha Envasado:</label>
                        <input class="form-control" type="date" id="fecha_envasado" name="fecha_envasado" >
                      </div>
                       
                    </div>
                    
                    
                    <div class="row col-12 mb-3 g-2">
                      <div class="col-4">
                        <label class="form-label" for="peso_neto">Peso Neto:</label>
                        <input class="form-control" type="text" id="peso_neto" name="peso_neto" >
                      </div>
                      <div class="col-4">
                        <label class="form-label" for="precio">Precio:</label>
                        <input class="form-control" type="text" id="precio" name="precio" >
                      </div>
                      <div class="col-4">
                        <label class="form-label" for="stock">Stock:</label>
                        <input class="form-control" type="text" id="stock" name="stock">
                      </div>
                    </div>
                    
                    <div class="col-12 g-2">
                        <label class="form-label col-12" for="imagen">Imágen de Producto</label>
                        <img src="" class="img-fluid rounded mb-4" style="width:200px" id="idFoto" alt="No hay imagen disponible">
                        <input class="form-control" type="file" id="imagen" name="imagen" >
                    </div>
                    <div class="modal-footer">
                      <div class="row col-12 g-2" >
                        <div class="col-6">
                            <button type="button" class="btn btn-dark w-100" onclick="closeModal()">Cancelar</button>
                        </div>
                        <div class="col-6">
                          <button type="submit" id="buttonEditar" class="btn color-logo w-100" onclick="closeModal()">Enviar</button>
                        </div>
                      </div>                        
                    </div>
              </div>
            </form>

            </div>
        </div><!-- Fin modal-contenido -->
    </div><!-- Fin modal-container -->

 


  <script type="text/javascript">
        // obtenemos el array de valores mediante la conversion a json del array de php        
        let arrayPHP = <?php echo json_encode($datos['productos']);?>;
        let arrayJS = arrayPHP.slice();
        let tableName = "Productos";
        // console.log(arrayJS);

        /* Colocamos los atributos de la tabla */ 
        let atributos = [
        "nombre_producto",
        "nombre_tipo",
        "fecha_cosecha",
        "fecha_envasado",
        "peso_neto",
        "precio",
        "stock",
        "id_producto" /* Clave siempre al final */
        ];

        

          /* Colocamos los atributos por los que se ordenará */
        let ordenar = [
          "fecha_cosecha",
          "fecha_envasado",
          "peso_neto",
          "precio",
          "stock"
        ]

          /* Funciones Edit y Borrar */
        let funciones = [
            <?php echo json_encode(RUTA_URL);?>, /* Directorio root */
            "producto", /* controlador */
            "EliminarProducto", /* función borrar */
            "EditarProducto", /* función editar */
            "id_producto", /* idUser */
        ];


        //  Funciones del Fetch 
        let arrayfetch = [
            "fetchVerDatos",
            "fetchEditarDatos",
        ];

        let formData =[
          "nombre",
          "id_tipo",
          "fecha_cosecha",
          "fecha_envasado",
          "peso_neto",
          "precio",
          "stock",
          "id_producto"
        ];

        console.log(formData[1]);

        let rutaFoto = [
            <?php echo json_encode(RUTA_URL_STATIC); ?>,
            "/img-bd/",
        ];

        

  </script>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>