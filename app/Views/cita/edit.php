<div class="container">
    <div class="row">
        <div class="col">
            <?= validation_list_errors() ?>
            <h2>Actualizar Cita</h2>
            <form action="<?= base_url('cita/update/'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="mb-3">
                    <label for="motivo" class="form-label">Motivo</label>
                    <input name="motivo" type="text" value="<?= $cita[0]->motivo; ?>"
                        class="form-control" id="cita" placeholder="Cita">
                    <input type="hidden" name="idCita" value="<?= $cita[0]->idCita; ?>">
                </div>

                <div class="mb-3">
                    <label for="fechaCita" class="form-label">Fecha</label>
                    <input name="fechaCita" type="date" value="<?= $cita[0]->fechaCita; ?>"
                        class="form-control" id="cita" placeholder="Cita">
                    <input type="hidden" name="idCita" value="<?= $cita[0]->idCita; ?>">
                </div>

                <div class="mb-3">
                    <label for="horaCita" class="form-label">Hora</label>
                    <input name="horaCita" type="text" value="<?= $cita[0]->horaCita; ?>"
                        class="form-control" id="cita" placeholder="Cita">
                    <input type="hidden" name="idCita" value="<?= $cita[0]->idCita; ?>">
                </div>
                
                <div class="mb-3">
                    <label for="idDoctor" class="form-label">Doctor</label>
                    <select name="idDoctor" class="form-control" id="doctor" required>
                        <?php foreach ($doctor as $key): ?>
                            <option value="<?= $key->idDoctor ?>"
                                <?= $doctor[0]->idDoctor == $key->idDoctor ? 'selected' : '' ?>>
                                <?= $key->nombreD . ' ' . $key->apellidoPD . ' ' . $key->apellidoMD ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="idCita" value="<?= $cita[0]->idCita; ?>">
                </div>

                <div class="mb-3">
                    <label for="idPaciente" class="form-label">Paciente</label>
                    <select name="idPaciente" class="form-control" id="paciente" required>
                        <?php foreach ($paciente as $key): ?>
                            <option value="<?= $key->idPaciente ?>"
                                <?= $paciente[0]->idPaciente == $key->idPaciente ? 'selected' : '' ?>>
                                <?= $key->nombreP . ' ' . $key->apellidoPP . ' ' . $key->apellidoMP ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="idCita" value="<?= $cita[0]->idCita; ?>">
                </div>
                
                <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">
            </form>

        </div>
    </div>
</div>