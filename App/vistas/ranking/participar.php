<?php require_once RUTA_APP.'/vistas/inc/header.php'?>

    

<div class="container">

    <div class="mt-5">
        <h3> Participación en el Ranking </h3>
    </div>

    <div>
        <h5> ¿Qué implica participar? </h5> 
        <p>Al optar por participar, estarás permitiendo que la plataforma publique de manera pública cierta información sobre tu desempeño, incluyendo:</p>
        <ul>
            <li>Cantidad de compras realizadas</li>
            <li>Cantidad de ventas exitosas</li>
            <li>Promedio de valoraciones</li>
        </ul>
        <p>Además, también se mostrará una versión resumida de tu perfil, resaltando tus logros y contribuciones en nuestra comunidad.</p>

        <h5>¿Por qué participar? </h5>
        <p>Participar en los rankings te brinda la oportunidad de destacar y compartir tus éxitos, así como conectarte con otros usuarios que 
            comparten intereses similares. Puedes ganar reconocimiento, mejorar tu visibilidad y contribuir al ambiente positivo de nuestra plataforma.</p>

        <h5> ¿Cómo participar? </h5>
        <p>Para unirte a los rankings públicos, simplemente haz click en el botón de la parte inferior.</p>

        <h5> ¿Puedo cambiar mi configuración en el futuro?  </h5>
        <p>¡Por supuesto! Puedes ajustar tus preferencias en cualquier momento desde la sección de configuración de tu cuenta.</p>

        <h5>¿Y si prefiero mantener mi información privada? </h5>
        <p>Entendemos y respetamos tu privacidad. Si decides no participar, tu información seguirá siendo privada y no se incluirá en los rankings públicos.</p>
    </div>

    <?php if ($datos["usuarioSesion"]->ranking == "no"):?>

        <div class="mb-5">
            <button type="button" class="btn btn-outline-light" onclick="openModal(this)" style="background-color: #A898D5;">Participar</button>
        </div>

    <?php else: ?>

        <div class="mb-5">
            <button type="button" class="btn btn-outline-light" onclick="openModal(this)" style="background-color: #A898D5;">Dejar de participar</button>
        </div>

    <?php endif ?>

</div>

<div id="modal" class="modal-container">
    <div class="modal-contenido">
        <i onclick="closeModal()" class="fa-solid fa-xmark cerrar"></i>
        <?php if ($datos["usuarioSesion"]->ranking == "no"):?>
            <form method="post" action="<?php echo RUTA_URL?>/Ranking/askRanking">
                <div class="modal-header">
                    <h2>¿PARTICIPAR EN EL RANKING?</h2>
                </div>
                <div class="modal-body">
                    <p>Si aceptas participarás públicamente en el ranking.</p>
                    <input type="hidden" name="id_usuario" value="<?php echo $datos['usuarioSesion']->id_usuario ?>">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary w-100" onclick="closeModal()">Cancelar</button>
                    <button type="submit" value="si" name="ranking" class="btn participar w-100 mt-2" style="background-color: #A898D5;">Participar</button>
                </div>
            </form>
        <?php else: ?>
            <form method="post" action="<?php echo RUTA_URL?>/Ranking/askRanking">
                <div class="modal-header">
                    <h2>¿DEJAR DE PARTICIPAR EN EL RANKING?</h2>
                </div>
                <div class="modal-body">
                    <p>Si dejas de participar tus datos ya no serán públicos en el ranking.</p>
                    <input type="hidden" name="id_usuario" value="<?php echo $datos['usuarioSesion']->id_usuario ?>">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary w-100" onclick="closeModal()">Cancelar</button>
                    <button type="submit" value="no" name="ranking" class="btn dejar-participar w-100 mt-2" style="background-color: #A898D5;">Dejar de participar</button>
                </div>
            </form>
        <?php endif ?>
    </div>
</div>


<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
