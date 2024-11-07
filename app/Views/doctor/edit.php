<div class="container">
    <div class="row">
        <div class="col">
            <?= validation_list_errors() ?>
            <h2>Actualizar Doctor</h2>
            <form action="<?= base_url('doctor/update/'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="mb-3">
                    <label for="nombreD" class="form-label">Nombre</label>
                    <input name="nombreD" type="text" value="<?=$doctor[0]->nombreD; ?>"
                        class="form-control" id="doctor" placeholder="Doctor">
                    <input type="hidden" name="idDoctor" value="<?=$doctor[0]->idDoctor; ?>">
                </div>
                <div class="mb-3">
                    <label for="apellidoPD" class="form-label">Apellido Paterno</label>
                    <input name="apellidoPD" type="text" value="<?= $doctor[0]->apellidoPD; ?>"
                        class="form-control" id="doctor" placeholder="Doctor">
                    <input type="hidden" name="idDoctor" value="<?= $doctor[0]->idDoctor; ?>">
                </div>
                <div class="mb-3">
                    <label for="apellidoMD" class="form-label">Apellido Materno</label>
                    <input name="apellidoMD" type="text" value="<?= $doctor[0]->apellidoMD; ?>"
                        class="form-control" id="doctor" placeholder="Doctor">
                    <input type="hidden" name="idDoctor" value="<?= $doctor[0]->idDoctor; ?>">
                </div>
                <div class="mb-3">
                    <label for="curp" class="form-label">Curp</label>
                    <input name="curp" type="text" value="<?= $doctor[0]->curp; ?>"
                        class="form-control" id="doctor" placeholder="Doctor">
                    <input type="hidden" name="idDoctor" value="<?= $doctor[0]->idDoctor; ?>">
                </div>

                <div class="mb-3">
                    <label for="fechaDeNacimiento" class="form-label">Fecha de nacimiento</label>
                    <input name="fechaDeNacimiento" type="date" value="<?= $doctor[0]->fechaDeNacimiento; ?>"
                        class="form-control" id="doctor" placeholder="Doctor">
                    <input type="hidden" name="idDoctor" value="<?= $doctor[0]->idDoctor; ?>">
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input name="telefono" type="text" value="<?= $doctor[0]->telefono; ?>"
                        class="form-control" id="doctor" placeholder="Doctor">
                    <input type="hidden" name="idDoctor" value="<?= $doctor[0]->idDoctor; ?>">
                </div>
                <div class="mb-3">
                    <label for="genero" class="form-label">Genero</label>
                    <input name="genero" type="text" value="<?= $doctor[0]->genero; ?>"
                        class="form-control" id="doctor" placeholder="Doctor">
                    <input type="hidden" name="idDoctor" value="<?= $doctor[0]->idDoctor; ?>">
                </div>
                <div class="mb-3">
                    <label for="especialidad" class="form-label">Especialidad</label>
                    <input name="especialidad" type="text" value="<?= $doctor[0]->especialidad; ?>"
                        class="form-control" id="doctor" placeholder="Doctor">
                    <input type="hidden" name="idDoctor" value="<?= $doctor[0]->idDoctor; ?>">
                </div>
                <div class="mb-3">
                    <label for="cedulaProfecional" class="form-label">Cedula Profecional</label>
                    <input name="cedulaProfecional" type="text" value="<?= $doctor[0]->cedulaProfecional; ?>"
                        class="form-control" id="doctor" placeholder="Doctor">
                    <input type="hidden" name="idDoctor" value="<?= $doctor[0]->idDoctor; ?>">
                </div>
                <div class="mb-3">
                    <label for="idDireccion" class="form-label">Dirección</label>
                    <select name="idDireccion" class="form-control" id="doctor" required>
                        <?php foreach ($direccion as $key): ?>
                            <option value="<?= $key->idDireccion ?>"
                                <?= $doctor[0]->idDireccion == $key->idDireccion ? 'selected' : '' ?>>
                                <?= $key->estado ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="idDoctor" value="<?= $doctor[0]->idDoctor; ?>">
                </div>

                <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">
            </form>

        </div>
    </div>
</div>