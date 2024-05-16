<?php require_once RUTA_APP.'/vistas/inc/header.php'?>


<div class="container">
    <div class="row mt-4 d-flex align-items-center">
        <div class="col-6 d-flex align-items-center">
            <div class="col-4 text-center">
                <img src="<?php echo RUTA_URL_STATIC ?>/imgbase/<?php echo $datos["datosUsuario"]->imagen_perfil ?>" class="card-img-top" id="imagenes" alt="...">
            </div>
            <div class="col-8 ms-2">
                <h5 class="mb-0"> <?php echo $datos["datosUsuario"]->nombre." ".$datos["datosUsuario"]->apellidos ?> </h5>
            </div>
        </div>
        <div class="col-6 col-md-3 offset-md-3 mt-2">
            <a href="<?php echo RUTA_URL?>/valoraciones/<?php echo $datos["datosUsuario"]->id_usuario ?>" class="text-decoration-none">
                <div class="text-center text-decoration-none text-dark text-alignment-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                    </svg>
                    <p class="m-0"> Valoraciones </p>
                </div>
            </a>
        </div>
    </div>
    <div class="row mt-2">
    <hr>
    </div>
    <div class="row d-flex mt-4 mb-5">
        <div class="col-4 col-md-2">
            <a href="#" class="text-decoration-none text-dark">
                <div class="p-2" id="pestanaEnVenta" onclick="mostrarEnVenta();">
                    <h5 class="mb-0"> Productos en venta </h5>
                </div>
            </a>
        </div>
        <div class="col-4 col-md-2">
            <a href="#" class="text-decoration-none text-dark">
                <div class="p-2" id="pestanaVendidos" onclick="mostrarVendidos();">
                    <h5 class="mb-0"> Productos vendidos </h5>
                </div>
            </a>
        </div>
        <div class="col-4 col-md-2">
            <a href="#" class="text-decoration-none text-dark">
                <div class="p-2" id="pestanaInformacion" onclick="mostrarInformacion();" style="background-color: rgb(168, 152, 213)">
                    <h5 class="mb-0"> Informacion Pública</h5>
                </div>
            </a>
        </div>
    </div>
    <div class="row ms-3 Informacion" id="Informacion">
        <div class="row mt-1">
            <div class="col-3">
                <div>
                    <h5> Email </h5>
                </div>
            </div>
            <div class="col-4 offset-1">
                <div>
                    <h5> <?php echo $datos["datosUsuario"]->email ?> </h5>
                </div>
            </div>
        </div>
        <hr>
        <div class="row mt-1">
            <div class="col-3">
                <div>
                    <h5> Telefono </h5>
                </div>
            </div>
            <div class="col-4 offset-1">
                <div>
                    <h5> <?php echo $datos["datosUsuario"]->telefono ?> </h5>
                </div>
            </div>
        </div>
        <hr>
        <div class="row mt-1">
            <div class="col-3">
                <div>
                    <h5> Ciudad </h5>
                </div>
            </div>
            <div class="col-4 offset-1">
                <div>
                    <h5> <?php echo $datos["datosUsuario"]->ciudad ?> </h5>
                </div>
            </div>
        </div>
        <hr>
        <div class="row mt-1">
            <div class="col-3">
                <div>
                    <h5> Direccion </h5>
                </div>
            </div>
            <div class="col-4 offset-1">
                <div>
                    <h5> <?php echo $datos["datosUsuario"]->direccion ?> </h5>
                </div>
            </div>
        </div>
        <hr>
        <?php if(!empty($datos['usuarioSesion'])): ?>
            <?php if($datos['usuarioSesion']->id_usuario == $datos['datosUsuario']->id_usuario): ?>
                <div class="row my-5">
                    <div class="col-12 col-md-3">
                        <div>
                            <a class="text-dark" href="<?php echo RUTA_URL?>/perfil/editarPerfil"> <h5> Editar información </h5> </a>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        <?php endif ?>
    </div>

    <div class="row mt-2 enVenta d-none" id="enVenta">
        <div class="col-12">
            <?php foreach ($datos['enVenta'] as $producto): ?>
                <a href="<?php echo RUTA_URL?>/productos/producto/<?php echo $producto->id_producto?>" class="row text-decoration-none text-dark mt-1">
                    <div class="col-3 col-md-2">
                        <img src="<?php echo RUTA_URL_STATIC ?>/imgbase/<?php echo $producto->ruta ?>" class="card-img-top imgproductoperfil" id="imagenes" alt="...">
                    </div>
                    <div class="col-4 col-md-2 pt-2 pt-sm-0 d-flex align-items-center">
                        <p class="p-0 mb-0"> <?php echo $producto->nombre_producto ?> </p>
                    </div>
                    <div class="col-2 col-md-2 pt-2 pt-sm-0 d-flex align-items-center">
                    <p class="p-0 mb-0"> <?php echo $producto->precio ?> € </p>
                    </div>
                    <div class="col-md-4 pt-2 pt-sm-0 d-none d-md-flex align-items-center">
                        <p class="p-0 mb-0"> <?php echo $producto->descripcion ?> </p>
                    </div>
                    <div class="col-3 col-md-1 pt-2 pt-sm-0 d-flex align-items-center">
                        <p class="p-0 mb-0"> <u> Mas Información... </u> </p>
                    </div>
                </a>
            <?php endforeach ?>
            <?php if(!empty($datos['usuarioSesion'])): ?>
                <?php if($datos['usuarioSesion']->id_rol === 1): ?>
                    <a href="<?php echo RUTA_URL?>/productos/<?php echo $producto->id_usuario?>" 
                    class="row d-flex justify-content-center btn text-decoration-none text-dark my-3"
                    style="background-color: #A898D5">
                        Ver los productos del usuario
                    </a>
                <?php endif ?>
            <?php endif ?>
        </div>
    </div>

    <div class="row mt-2 Vendidos d-none" id="Vendidos">
        <div class="col-12">
            <?php foreach ($datos['Vendidos'] as $producto): ?>
                <a href="<?php echo RUTA_URL?>/productos/producto/<?php echo $producto->id_producto?>" class="row text-decoration-none text-dark mt-1">
                    <div class="col-1 col-md-1">
                        <img src="<?php echo RUTA_URL_STATIC ?>/imgbase/<?php echo $producto->ruta ?>" class="imgproductoperfil"> </img>
                    </div>
                    <div class="col-2 col-md-2 pt-2 pt-sm-0 d-flex align-items-center">
                        <p class="p-0 mb-0"> <?php echo $producto->nombre_producto ?> </p>
                    </div>
                    <div class="col-1 col-md-2 pt-2 pt-sm-0 d-flex align-items-center">
                        <p class="p-0 mb-0"> <?php echo $producto->precio ?> € </p>
                    </div>
                    <div class="col-md-4 pt-2 pt-sm-0 d-none d-md-flex align-items-center">
                        <p class="p-0 mb-0"> <?php echo $producto->descripcion ?> </p>
                    </div>
                    <div class="col-3 col-md-3 pt-2 pt-sm-0 d-flex align-items-center">
                        <p class="p-0 mb-0"> <u> Mas Información... </u> </p>
                    </div>
                </a>
            <?php endforeach ?>
        </div>
    </div>


</div>
</div>

<script>

function mostrarEnVenta() {

    let divEnVenta = document.getElementById("enVenta");
    let divVendidos = document.getElementById("Vendidos");
    let divInformacion = document.getElementById("Informacion");

    let pestanaEnVenta = document.getElementById("pestanaEnVenta");
    let pestanaVendidos = document.getElementById("pestanaVendidos");
    let pestanaInformacion = document.getElementById("pestanaInformacion");

    divEnVenta.classList.remove("d-none");
    divVendidos.classList.add("d-none");
    divInformacion.classList.add("d-none");

    pestanaEnVenta.style.backgroundColor = "rgb(168, 152, 213)";
    pestanaVendidos.style.backgroundColor = "";
    pestanaInformacion.style.backgroundColor = "";

}

function mostrarVendidos() {

    let divEnVenta = document.getElementById("enVenta");
    let divVendidos = document.getElementById("Vendidos");
    let divInformacion = document.getElementById("Informacion");

    let pestanaEnVenta = document.getElementById("pestanaEnVenta");
    let pestanaVendidos = document.getElementById("pestanaVendidos");
    let pestanaInformacion = document.getElementById("pestanaInformacion");

    divVendidos.classList.remove("d-none");
    divEnVenta.classList.add("d-none");
    divInformacion.classList.add("d-none");

    pestanaVendidos.style.backgroundColor = "rgb(168, 152, 213)";
    pestanaEnVenta.style.backgroundColor = "";
    pestanaInformacion.style.backgroundColor = "";

}

function mostrarInformacion() {

    let divEnVenta = document.getElementById("enVenta");
    let divVendidos = document.getElementById("Vendidos");
    let divInformacion = document.getElementById("Informacion");

    let pestanaEnVenta = document.getElementById("pestanaEnVenta");
    let pestanaVendidos = document.getElementById("pestanaVendidos");
    let pestanaInformacion = document.getElementById("pestanaInformacion");

    divInformacion.classList.remove("d-none");
    divEnVenta.classList.add("d-none");
    divVendidos.classList.add("d-none");

    //pestanaInformacion.classList.add("bg-info");
    pestanaInformacion.style.backgroundColor = "rgb(168, 152, 213)";
    pestanaEnVenta.style.backgroundColor = "";
    pestanaVendidos.style.backgroundColor = "";

}


</script>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
