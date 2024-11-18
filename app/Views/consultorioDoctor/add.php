<div class="container">
    <div class="row">
        <div class="col">

            <h2>Agregar Doctor que esta en el consultorio</h2>
            <?= validation_list_errors() ?>

            <form action="<?= base_url('consultorioDoctor/insert'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                

                <div class="mb-3">
                    <label for="idConsultorio">  Consultorio</label>
                    <select name="idConsultorio" class="form-control" name="idConsultorio" required>>
                        <?php foreach ($consultorio as $key) : ?>
                            <option value="<?= $key->idConsultorio ?>">
                                <?= $key->nombreConsultorio . ' ' . $key->telefono . ' ' . $key->correoElectronico ?>
                            </option>
                        <?php endforeach ?>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="idDoctor">Doctor</label>
                    <select name="idDoctor" class="form-control" name="idDoctor" required>>
                        <?php foreach ($doctor as $key) : ?>
                            <option value="<?= $key->idDoctor ?>">
                                <?= $key->nombreD . ' ' . $key->apellidoPD . ' ' . $key->apellidoMD ?>
                            </option>
                        <?php endforeach ?>

                    </select>
                </div>

                <div class="mb-3">
                    <label for="horaDeEntrada">Hora de entrada</label>
                    <input type="text" class="form-control" name="horaDeEntrada" required>
                </div>

                <div class="mb-3">
                    <label for="horaDeSalida">Hora de salida</label>
                    <input type="text" class="form-control" name="horaDeSalida" required>
                </div>


                <input type="submit" class="btn btn-success mt-3" value="Guardar">
            </form>

        </div>
    </div>
</div>