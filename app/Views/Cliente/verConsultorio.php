<h1 class="texto-formal"><?= esc($cliente->nombreConsultorio) ?></h1>
<div class="container">
    <div class="row">
        <div class="col-6">
            <?php if (!empty($cliente->idImagen)) : ?>
                <img src="<?= site_url('Imagen/getFile/' . $cliente->idImagen) ?>" class="d-block w-100" alt="<?= esc($cliente->nombreConsultorio) ?>">
            <?php else : ?>
                <p>No image available</p>
            <?php endif; ?>
        </div>

        <div class="col-6">
            <h3>Teléfono: <?= esc($cliente->telefono) ?></h3>
            <h3>Correo Electrónico: <?= esc($cliente->correoElectronico) ?></h3>
            <iframe src="<?= esc($cliente->maps) ?>" width="400" height="300"></iframe>
        </div>
    </div> 
</div>

</body>
</html>