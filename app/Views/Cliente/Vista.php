<div class="container-fluid">
    <div class="row">
        <?php foreach ($cliente as $key) :?>
            <div class="col-4 producto">

            <h3><?=$key->nombreConsultorio ?></h3>
            <div class="imgSecundaria"></div>
            <p>Abre: <?=$key->horaDeApertura?></p>
            <p>Cierra: <?=$key->horaDeCierre?></p>
            <a href="<?=base_url('Cliente/verConsultorio/').$key->idConsultorio ?>" class="btn btn-success"> Ver detalle</a>

            </div>
            <?php endforeach ?>
    </div>
</div>

</body>
</html>