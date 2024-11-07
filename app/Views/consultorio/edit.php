<div class="container">
    <div class="row">
        <div class="col">
            <?= validation_list_errors() ?>
            <h2>Actualizar Consultorio</h2>
            <form action="<?= base_url('consultorio/update/'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="mb-3">
                    <label for="nombreConsultorio" class="form-label">Nombre</label>
                    <input name="nombreConsultorio" type="text" value="<?= $consultorio[0]->nombreConsultorio; ?>"
                        class="form-control" id="consultorio" placeholder="Consultorio">
                    <input type="hidden" name="idConsultorio" value="<?= $consultorio[0]->idConsultorio; ?>">
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">telefono</label>
                    <input name="telefono" type="number" value="<?= $consultorio[0]->telefono; ?>"
                        class="form-control" id="consultorio" placeholder="Consultorio">
                    <input type="hidden" name="idConsultorio" value="<?= $consultorio[0]->idConsultorio; ?>">
                </div>
                <div class="mb-3">
                    <label for="correoElectronico" class="form-label">Correo Electronico</label>
                    <input name="correoElectronico" type="text" value="<?= $consultorio[0]->correoElectronico; ?>"
                        class="form-control" id="consultorio" placeholder="Consultorio">
                    <input type="hidden" name="idConsultorio" value="<?= $consultorio[0]->idConsultorio; ?>">
                </div>
                <div class="mb-3">
                    <label for="horaDeApertura" class="form-label">Hora De Apertura</label>
                    <input name="horaDeApertura" type="time" value="<?= $consultorio[0]->horaDeApertura; ?>"
                        class="form-control" id="consultorio" placeholder="Consultorio">
                    <input type="hidden" name="idConsultorio" value="<?= $consultorio[0]->idConsultorio; ?>">
                </div>
                <div class="mb-3">
                    <label for="horaDeCierre" class="form-label">Hora De Cierre</label>
                    <input name="horaDeCierre" type="time" value="<?= $consultorio[0]->horaDeCierre; ?>"
                        class="form-control" id="consultorio" placeholder="Consultorio">
                    <input type="hidden" name="idConsultorio" value="<?= $consultorio[0]->idConsultorio; ?>">
                </div>

                <div class="mb-3">
                    <label for="idDireccion" class="form-label">Dirección</label>
                    <select name="idDireccion" class="form-control" id="doctor" required>
                        <?php foreach ($direccion as $key): ?>
                            <option value="<?= $key->idDireccion ?>"
                                <?= $direccion[0]->idDireccion == $key->idDireccion ? 'selected' : '' ?>>
                                <?= $key->estado ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="idConsultorio" value="<?= $consultorio[0]->idConsultorio; ?>">
                </div>


                <div class="mb-3">
                    <label for="maps" class="form-label">Maps</label>
                    <input name="maps" type="text" value="<?= $consultorio[0]->maps; ?>"
                        class="form-control" id="consultorio" placeholder="Consultorio">
                    <input type="hidden" name="idConsultorio" value="<?= $consultorio[0]->idConsultorio; ?>">
                </div>
                <input type="hidden" name="idConsultorio" value="<?= $consultorio[0]->idConsultorio; ?>">
        </div>



        <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">
        </form>

    </div>
</div>
</div>