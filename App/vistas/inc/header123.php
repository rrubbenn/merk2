<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Casa Yus</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link rel="shortcut icon" href="<?php echo RUTA_URL_STATIC ?>/img/logo-casa-yus.png">

   <!-- Google Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Braah+One&family=Tangerine&display=swap" rel="stylesheet">

  <!-- bootstrap -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  
  <link rel="stylesheet" href="<?php echo RUTA_URL_STATIC ?>/css/estilos.css">



</head>

<body>

<div class="bg-dark">
  <div class="container">
    <div class="row px-5">
      <div class="col-6">
        <img src="<?php echo RUTA_URL_STATIC ?>/img/logo con texto casayus.png" alt="logo-casa-yus" class="icono" id="icono">
      </div>
      <div class="col-6 abs-center">
      <!-- <form class=""> -->
              <?php if (empty($datos["usuarioSesion"])):?>
          
              <a type="button" class="btn color-logo px-5 py-2" href="<?php echo RUTA_URL?>/Login/">Acceder</a>
              
               <?php else : ?>
              <h1 class="color-letra"><a href="<?php echo RUTA_URL?>/Perfil" class="color-letra"><?php echo $datos["usuarioSesion"]->usuario ?></a></h1>
        
              <?php endif?> 
          <!-- </form> -->
      </div>
    </div>
  </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-light color-logo mb-5">
    <div class="container-fluid">
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span id="MenuBurguer"><i class="bi bi-list mobile-nav-toggle"></i></span>
        <span class="navbar-toggler-icon" ></span>

      </button>
      <div class="container px-5">
        <div class="collapse navbar-collapse color-logo" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link text-dark ps-lg-5 ps-md-2 px-2 font-weight-bold" aria-current="page" href="<?php echo RUTA_URL?>/inicio/">COQUINO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark px-2 font-weight-bold" href="<?php echo RUTA_URL?>/QuienesSomos/">CANCER</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark px-2 font-weight-bold" href="<?php echo RUTA_URL?>/Contacto/">MUERTOS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark px-2 font-weight-bold" href="<?php echo RUTA_URL?>/Categoria/">ZORRA</a>
            </li>
            <?php if (empty($datos["usuarioSesion"]) || $datos["usuarioSesion"]->id_rol==2 ):?>
          <?php else : ?>
            <li class="nav-item dropdown px-2">
              <a class="nav-link dropdown-toggle text-dark font-weight-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Gestión
              </a>
              <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item text-white" href="<?php echo RUTA_URL?>/Usuario/">Usuarios</a></li>
                <li><a class="dropdown-item text-white" href="<?php echo RUTA_URL?>/Producto/listarProductos">Productos</a></li>
                <li><a class="dropdown-item text-white" href="<?php echo RUTA_URL?>/Categoria/listarCategorias">Categorías</a></li>

              </ul>
            </li>
            <?php endif?> 

            <!-- <li class="nav-item ml-auto w-100">

            </li> -->
          </ul>
          <?php if (empty($datos["usuarioSesion"])):?>
          <?php else : ?>
            <a class="nav-link text-dark px-2 font-weight-bold" href="<?php echo RUTA_URL?>/Carrito/"><i class="fa-solid fa-cart-shopping"></i></a>

          <?php endif?> 
        </div>
        </div>
    </div>
  </nav>
