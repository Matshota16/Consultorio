<div class="container-fluid">
    <div class="container">
    <div class="row">
        <div class="col">
            <h2>Agregar Cita</h2>

            <form action="<?= base_url('cita/insert') ?>" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="idConsultorio" value="<?= esc($consultorioId) ?>" />

                <div class="mb-3">
                    <label for="motivo">Motivo</label>
                    <input type="text" class="form-control" name="motivo" required placeholder="Motivo de la cita">
                </div>

                <div class="mb-3">
                    <label for="fechaCita">Fecha</label>
                    <input type="date" class="form-control" name="fechaCita" required>
                </div>

                <div class="mb-3">
                    <label for="horaCita">Hora</label>
                    <input type="time" class="form-control" name="horaCita" required>
                </div>

                

                <div class="mb-3">
                    <label for="lastPaciente">ID Dirección</label>
                    <input type="hidden" name="idPaciente" class="form-control" value="<?= $lastPacienteId ?>" readonly>
                    <input type="text" class="form-control" value="<?= $lastPacienteId ?>" disabled>
                </div>

                <div class="mb-3">
                    <label for="id">Doctor</label>
                    <select name="id" class="form-control" required>
                        <?php foreach ($doctores as $doctor): ?>
                            <option value="<?= esc($doctor->idDoctor) ?>">
                                <?= 'Dr. ' . esc($doctor->nombreD . ' ' . $doctor->apellidoPD . ' ' . $doctor->apellidoMD) ?>
                                (Entrada: <?= esc($doctor->horaDeEntrada) ?>, Salida: <?= esc($doctor->horaDeSalida) ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <input type="submit" class="btn btn-success mt-3" value="Guardar">
            </form>
        </div>
    </div>
</div>
</div>