<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Merk2</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link rel="shortcut icon" href="<?php echo RUTA_URL_STATIC ?>/img/">

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Harmattan&family=Hind:wght@300&display=swap" rel="stylesheet">

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  
  <link rel="stylesheet" href="<?php echo RUTA_URL_STATIC ?>/css/estilos.css">

</head>

<div class="d-flex flex-column min-vh-100">

<body>

<div style="background-color: #A898D5">
  <div class="container py-2">
    <div class="d-flex flex-wrap">

      <div class="d-flex col-12 col-md-8">
        <div class="col-4 col-md-4 d-flex align-items-center">
          <a href="<?php echo RUTA_URL?>/">
            <img src="<?php echo RUTA_URL_STATIC ?>/img/logo.png" alt="logo-merk2" class="icono img-fluid" id="icono">
          </a>
        </div>

        <div class="<?php if (strpos($_SERVER['REQUEST_URI'], 'busqueda')): echo "col-6"; else : echo "col-8"; endif;?> text-center p-2 ms-0 mt-3 offset-1">
            <form action="<?php echo RUTA_URL ?>/inicio/busqueda" method="post">
              <div class="mb-3 text-start col-12">
                  <input type="text" class="form-control" name="buscador" id="buscador" aria-describedby="buscador" style="width: 100%;" value="<?php if(!empty($datos['busqueda'])): echo $datos['busqueda']; endif ?>"> 
              </div>
            </form>
          </div>

          <?php if (strpos($_SERVER['REQUEST_URI'], 'busqueda')): ?>
            <div class="col-2 col-md-1 text-center d-flex align-items-center">
                <a class="col-12 text-center" href="<?php echo RUTA_URL?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-x-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                  </svg>
                </a>
            </div>
          <?php endif?>
      </div>

      <div class="col-12 col-md-4 d-flex align-items-center">

          
          <div class="col-3 col-md-3 text-center" id="mostrarCategorias" onclick="mostrarCategorias()">
            <a class="text-decoration-none" href="javascript:void(0);">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-tag" viewBox="0 0 16 16">
                <path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0"/>
                <path d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1m0 5.586 7 7L13.586 9l-7-7H2z"/>
              </svg>
            </a>
            <?php if (strpos($_SERVER['REQUEST_URI'], 'categoria')): ?>
              <a class="col text-center" href="<?php echo RUTA_URL?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-x-circle" viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                </svg>
              </a>
            <?php endif?>
          </div>

          

          <div class="col-3 col-md-3 text-center">
            <a href="<?php echo RUTA_URL?>/ranking">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-bar-chart-line" viewBox="0 0 16 16">
                <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1zm1 12h2V2h-2zm-3 0V7H7v7zm-5 0v-3H2v3z"/>
              </svg>
            </a>
          </div>

          <div class="col-3 col-md-3 text-center">
            <div class="dropdown">
              <button class="btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #A898D5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-universal-access-circle" viewBox="0 0 16 16">
                  <path d="M8 4.143A1.071 1.071 0 1 0 8 2a1.071 1.071 0 0 0 0 2.143m-4.668 1.47 3.24.316v2.5l-.323 4.585A.383.383 0 0 0 7 13.14l.826-4.017c.045-.18.301-.18.346 0L9 13.139a.383.383 0 0 0 .752-.125L9.43 8.43v-2.5l3.239-.316a.38.38 0 0 0-.047-.756H3.379a.38.38 0 0 0-.047.756Z"/>
                  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M1 8a7 7 0 1 1 14 0A7 7 0 0 1 1 8"/>
                </svg>
              </button>
              <ul class="dropdown-menu dropdown-menu" aria-labelledby="dropdownMenuButton2">
                <li><a class="dropdown-item" href="javascript:void(0);" onclick="cambiarContraste();">Cambiar contraste</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="javascript:void(0);" onclick="restaurarEstilosOriginales();">Restablecer</a></li>
              </ul>
            </div>
          </div>

          <?php if (!empty($datos["usuarioSesion"])):?>
            <div class="col-3 col-md-3 text-center">
              <div class="btn-group">
                <button type="button" class="btn dropdown-toggle text-light" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #A898D5">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                  </svg>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="<?php echo RUTA_URL?>/perfil/<?php echo $datos['usuarioSesion']->id_usuario ?>">Perfil</a></li>
                  <li><a class="dropdown-item" href="<?php echo RUTA_URL?>/favorito">Favoritos</a></li>
                  <li><a class="dropdown-item" href="<?php echo RUTA_URL?>/productos/<?php echo $datos['usuarioSesion']->id_usuario ?>">Productos</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="<?php echo RUTA_URL?>/login/logout">Cerrar Sesión</a></li>
                </ul>
              </div>
            </div>
          <?php else: ?> 
            <div class="col-3 text-center mt-1">
              <a href="<?php echo RUTA_URL?>/Login/" class="text-white fs-5 text-decoration-none">
                <button type="button" class="btn btn-outline-light">Iniciar sesión</button>
              </a>
            </div>
          <?php endif?> 
      </div>
    </div>
  </div>
</div>



<div class="d-flex flex-wrap col-12 p-0 m-0 d-none" id="listacategorias" style="background-color: #d1cae3; border-bottom: solid 1px #A898D5; border-left: solid 1px #A898D5; border-right: solid 1px #A898D5">
  <?php foreach($datos['categorias'] as $categoria): ?>
    <a class="col-4 text-decoration-none text-dark d-flex align-items-center" href="<?php echo RUTA_URL?>/inicio/categoria/<?php echo $categoria->id_categoria ?>">
      <h5 class="mt-2 ms-4 me-4"> <?php echo $categoria->nombre_categoria ?> </h5>
    </a>
  <?php endforeach ?>
</div>


