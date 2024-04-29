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

<body>

<div style="background-color: #A898D5">
  <div class="container">
    <div class="row">
      <div class="col-3">
        <a href="<?php echo RUTA_URL?>/">
          <img src="<?php echo RUTA_URL_STATIC ?>/img/logo.png" alt="logo-merk2" class="icono img-fluid mt-3" id="icono">
        </a>
      </div>
      <div class="col-9 d-flex align-items-center justify-content-end">

        <?php if (empty($datos["usuarioSesion"])):?>
          <div class="col-6 text-center p-1 mt-3">
            <form action="<?php echo RUTA_URL ?>/inicio/busqueda" method="post">
              <div class="mb-3 text-start col-11">
                  <input type="text" class="form-control" name="buscador" id="buscador" aria-describedby="buscador" style="width: 100%;">
              </div>
            </form>
          </div>

          <div class="col-1 text-center">
            <a href="<?php echo RUTA_URL?>/">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
              </svg>
            </a>
          </div>
          <div class="col-1 text-center" id="mostrarCategorias" onclick="mostrarCategorias()">
            <a href="javascript:void(0);">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-tag" viewBox="0 0 16 16">
                <path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0"/>
                <path d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1m0 5.586 7 7L13.586 9l-7-7H2z"/>
              </svg>
            </a>
          </div>
          <div class="col-1 text-center">
            <a href="<?php echo RUTA_URL?>/ranking">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-bar-chart-line" viewBox="0 0 16 16">
                <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1zm1 12h2V2h-2zm-3 0V7H7v7zm-5 0v-3H2v3z"/>
              </svg>
            </a>
          </div>
          <div class="col-1 text-center">
            <a href="<?php echo RUTA_URL?>/">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-universal-access-circle" viewBox="0 0 16 16">
                <path d="M8 4.143A1.071 1.071 0 1 0 8 2a1.071 1.071 0 0 0 0 2.143m-4.668 1.47 3.24.316v2.5l-.323 4.585A.383.383 0 0 0 7 13.14l.826-4.017c.045-.18.301-.18.346 0L9 13.139a.383.383 0 0 0 .752-.125L9.43 8.43v-2.5l3.239-.316a.38.38 0 0 0-.047-.756H3.379a.38.38 0 0 0-.047.756Z"/>
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M1 8a7 7 0 1 1 14 0A7 7 0 0 1 1 8"/>
              </svg>
            </a>
          </div>
          <div class="col-2 text-center mt-1">
            <a href="<?php echo RUTA_URL?>/Login/" class="text-white fs-5 text-decoration-none">
              <button type="button" class="btn btn-outline-light">Iniciar sesión</button>
            </a>
          </div>
          

        
        <?php else : ?>
        
          <div class="col-6 text-center p-1 mt-3">
            <form action="<?php echo RUTA_URL ?>/inicio/busqueda" method="post">
              <div class="mb-3 text-start col-11">
                  <input type="text" class="form-control" name="buscador" id="buscador" aria-describedby="buscador" style="width: 100%;">
              </div>
            </form>
          </div>

          <div class="col-1 text-center">
            <a href="<?php echo RUTA_URL?>/">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
              </svg>
            </a>
          </div>
          <div class="col-1 text-center" id="mostrarCategorias" onclick="mostrarCategorias()">
            <a href="javascript:void(0);">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-tag" viewBox="0 0 16 16">
                <path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0"/>
                <path d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1m0 5.586 7 7L13.586 9l-7-7H2z"/>
              </svg>
            </a>
          </div>
          <div class="col-1 text-center">
            <a href="<?php echo RUTA_URL?>/ranking">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-bar-chart-line" viewBox="0 0 16 16">
                <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1zm1 12h2V2h-2zm-3 0V7H7v7zm-5 0v-3H2v3z"/>
              </svg>
            </a>
          </div>
          <div class="col-1 text-center">
            <a href="<?php echo RUTA_URL?>/">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-universal-access-circle" viewBox="0 0 16 16">
                <path d="M8 4.143A1.071 1.071 0 1 0 8 2a1.071 1.071 0 0 0 0 2.143m-4.668 1.47 3.24.316v2.5l-.323 4.585A.383.383 0 0 0 7 13.14l.826-4.017c.045-.18.301-.18.346 0L9 13.139a.383.383 0 0 0 .752-.125L9.43 8.43v-2.5l3.239-.316a.38.38 0 0 0-.047-.756H3.379a.38.38 0 0 0-.047.756Z"/>
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M1 8a7 7 0 1 1 14 0A7 7 0 0 1 1 8"/>
              </svg>
            </a>
          </div>
          <div class="col-1 text-center">

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
  
        <?php endif?> 

      </div>
    </div>
  </div>
</div>


