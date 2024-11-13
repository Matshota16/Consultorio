<div class="container-fluid">
    <div class="row">
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
</body>

</html>