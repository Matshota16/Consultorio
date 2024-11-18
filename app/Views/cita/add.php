<div class="container">
    <div class="row">
        <div class="col">

            <h2>Agregar Cita</h2>
            <?= validation_list_errors() ?>

            <form action="<?= base_url('cita/insert'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                <div class="mb-3">
                    <label for="motivo">motivo</label>
                    <input type="text" class="form-control" name="motivo" required placeholder="Cita" value="<?= set_value('cita') ?>">

                </div>

                <div class="mb-3">
                    <label for="fechaCita">Fecha</label>
                    <input type="date" class="form-control" name="fechaCita" required>
                </div>

                <div class="mb-3">
                    <label for="horaCita">Hora</label>
                    <input type="text" class="form-control" name="horaCita" required placeholder="Cita" value="<?= set_value('cita') ?>">

                </div>

                

                <div class="mb-3">
                    <label for="idPaciente">  Paciente</label>
                    <select name="idPaciente" class="form-control" name="idPaciente" required>>
                        <?php foreach ($paciente as $key) : ?>
                            <option value="<?= $key->idPaciente ?>">
                                <?= $key->nombreP . ' ' . $key->apellidoPP . ' ' . $key->apellidoMP ?>
                            </option>
                        <?php endforeach ?>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="id">Doctor</label>
                    <select name="id" class="form-control" name="id" required>>
                        <?php foreach ($consultorioDoctor as $key) : ?>
                            <option value="<?= $key->id ?>">
                                <?= 'Doctor: ' .$key->nombreD . ' ' . $key->apellidoPD . ' ' . $key->apellidoMD. ' Consultorio: ' . $key->nombreConsultorio . ' Hora De entrada: ' . $key->horaDeEntrada. ' Hora De Salida: ' . $key->horaDeSalida ?>
                            </option>
                        <?php endforeach ?>

                    </select>
                </div>


                <input type="submit" class="btn btn-success mt-3" value="Guardar">
            </form>

        </div>
    </div>
</div>