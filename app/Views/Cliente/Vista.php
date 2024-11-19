<div class="container-fluid">
    <div class="container">
    <div class="row">
        <div class="col-12 text-center"> <!-- Añadido text-center para centrar contenido -->
            <img class="logo-centered-large" src="<?= base_url('logo.jpeg') ?>" alt="Logo">
            <h1 class="texto">El objetivo de SimiMaps es ofrecer a los pacientes una herramienta fácil y accesible para programar sus consultas de manera rápida y sin complicaciones. A través de esta plataforma,
                los usuarios pueden seleccionar el consultorio de su preferencia,
                elegir el tipo de servicio que necesitan, y reservar una fecha y hora que se ajuste a sus horarios.</h1>
        </div>
        <?php foreach ($cliente as $key) : ?>
            <div class="col-4 producto">
                <h3><?= esc($key->nombreConsultorio) ?></h3>

                <div class="imgSecundaria">
                    <?php if (!empty($key->idImagen)) : ?>
                        <a href="<?= site_url('Imagen/getFile/' . $key->idImagen) ?>" target="_blank">
                            <img src="<?= site_url('Imagen/getFile/' . $key->idImagen) ?>" alt="<?= esc($key->nombreDelArchivo) ?>" class="img-fluid">
                        </a>
                    <?php else: ?>
                        <p>No image available</p>
                    <?php endif; ?>
                </div>

                <p>Abre: <?= esc($key->horaDeApertura) ?></p>
                <p>Cierra: <?= esc($key->horaDeCierre) ?></p>
                <a href="<?= base_url('Cliente/verConsultorio/' . $key->idConsultorio) ?>" class="btn btn-success">Ver detalle</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>

</body>

</html>