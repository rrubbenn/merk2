<?php require_once RUTA_APP.'/vistas/inc/header.php'?>


    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
              <h1 class="mb-3">Contacte con nosotros</h1>
                <!-- <div class="bg-white shadow rounded"> -->
                    <div class="row">
                        <div class="col-md-7 pe-0">
                            <div class="form-left h-100 py-5 px-5">
                                <form action="" class="row g-4">
                                        <div class="col-6">
                                            <!-- <label>Nombre<span class="text-danger">*</span></label> -->
                                            <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Nombre *">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <!-- <label>email<span class="text-danger">*</span></label> -->
                                            <div class="input-group">
                                                <input type="mail" class="form-control" placeholder="Email *">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <!-- <label>email<span class="text-danger">*</span></label> -->
                                            <div class="input-group">
                                                <textarea name="mensaje" placeholder="Mensaje *" class="form-control" id="mensaje" cols="60" rows="5"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn color-logo px-4 float-end">Enviar</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 ps-0 d-none d-md-block">
                            <div class="form-right h-100 bg-dark text-white text-center pt-5">
                            <img src="<?php echo RUTA_URL_STATIC ?>/img/logo-mediano.png" alt="logo casa yus">
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
        </div>
        <div class="container">
            <div class="row p-5">
                <div class="col-4 text-center">
                    <h4>Direccion</h4>
                    <p>c/Mayor nº49 44780 Muniesa</p>
                    <p>(Teruel-España)</p>
                </div>
                <div class="col-4 text-center">
                    <h4>Horario</h4>
                    <p>De Lunes a domingo</p>
                    <p>09:00 - 19:00</p>
                </div>
                <div class="col-4 text-center">
                    <h4>Contacto</h4>
                    <p>info@casayus.es</p>
                    <p>644 54 12 72</p>
                </div>
            </div>
        </div>

        <div class="color-logo p-5 mb-5">
            <div class="row">
                <div class="col-8">
                    <h3>Solicita aquí nuestros productos</h3>
                </div>
                <div class="col-4">
                    <a href="<?php echo  RUTA_URL?>/Categoria/" class=" btn bg-dark color-letra p-4 float-end">Realizar pedido</a>
                </div>
            </div>
        </div>
    </div>



<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
