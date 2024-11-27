<div class="container">
    <div class="row">
        <div class="col">
            <?= validation_list_errors() ?>
            <h2>Actualizar Consultorio Doctor</h2>
            <form action="<?= base_url('consultorioDoctor/update/'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                <div class="mb-3">
                    <label for="idConsultorio" class="form-label">Consultorio</label>
                    <select name="idConsultorio" class="form-control" id="idConsultorio" required>
                        <?php foreach ($consultorios as $consultorio) : ?>
                            <option value="<?= $consultorio['idConsultorio'] ?>" 
                                <?= $consultorioDoctor['idConsultorio'] == $consultorio['idConsultorio'] ? 'selected' : '' ?>>
                                <?= $consultorio['nombreConsultorio'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="idConsultorioDoctor" value="<?= $consultorioDoctor['idConsultorioDoctor']; ?>">
                </div>

                <div class="mb-3">
                    <label for="idDoctor" class="form-label">Doctor</label>
                    <select name="idDoctor" class="form-control" id="idDoctor" required>
                        <?php foreach ($doctores as $doctor) : ?>
                            <option value="<?= $doctor['idDoctor'] ?>" 
                                <?= $consultorioDoctor['idDoctor'] == $doctor['idDoctor'] ? 'selected' : '' ?>>
                                <?= $doctor['nombreD'] . ' ' . $doctor['apellidoPD'] . ' ' . $doctor['apellidoMD'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="horaDeEntrada" class="form-label">Hora de Entrada</label>
                    <input name="horaDeEntrada" type="text" value="<?= $consultorioDoctor['horaDeEntrada']; ?>" 
                        class="form-control" id="horaDeEntrada" placeholder="Hora de Entrada" required>
                </div>

                <div class="mb-3">
                    <label for="horaDeSalida" class="form-label">Hora de Salida</label>
                    <input name="horaDeSalida" type="text" value="<?= $consultorioDoctor['horaDeSalida']; ?>" 
                        class="form-control" id="horaDeSalida" placeholder="Hora de Salida" required>
                </div>

                <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">
            </form>
        </div>
    </div>
</div>
