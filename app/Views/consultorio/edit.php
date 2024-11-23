<div class="container">
    <div class="row">
        <div class="col">
            <?= validation_list_errors() ?>
            <h2>Actualizar Consultorio</h2>
            <form action="<?= base_url('consultorio/update/') ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                <!-- Nombre del consultorio -->
                <div class="mb-3">
                    <label for="nombreConsultorio" class="form-label">Nombre</label>
                    <input name="nombreConsultorio" type="text" value="<?= $consultorio[0]->nombreConsultorio; ?>"
                        class="form-control" placeholder="Consultorio">
                </div>

                <!-- Teléfono -->
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input name="telefono" type="number" value="<?= $consultorio[0]->telefono; ?>"
                        class="form-control" placeholder="Teléfono">
                </div>

                <!-- Correo Electrónico -->
                <div class="mb-3">
                    <label for="correoElectronico" class="form-label">Correo Electrónico</label>
                    <input name="correoElectronico" type="text" value="<?= $consultorio[0]->correoElectronico; ?>"
                        class="form-control" placeholder="Correo Electrónico">
                </div>

                <!-- Horario -->
                <div class="mb-3">
                    <label for="horaDeApertura" class="form-label">Hora de Apertura</label>
                    <input name="horaDeApertura" type="time" value="<?= $consultorio[0]->horaDeApertura; ?>"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label for="horaDeCierre" class="form-label">Hora de Cierre</label>
                    <input name="horaDeCierre" type="time" value="<?= $consultorio[0]->horaDeCierre; ?>"
                        class="form-control">
                </div>

                <!-- Dirección -->
                <div class="mb-3">
                    <label for="idDireccion" class="form-label">Dirección</label>
                    <select name="idDireccion" class="form-control" required>
                        <?php foreach ($direccion as $key): ?>
                            <option value="<?= $key->idDireccion ?>"
                                <?= $consultorio[0]->idDireccion == $key->idDireccion ? 'selected' : '' ?>>
                                <?= $key->estado ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Maps -->
                <div class="mb-3">
                    <label for="maps" class="form-label">Maps</label>
                    <input name="maps" type="text" value="<?= $consultorio[0]->maps; ?>"
                        class="form-control" placeholder="URL de Google Maps">
                </div>

                <!-- Imagen actual -->
                <div class="mb-3">
                    <label for="imagenActual" class="form-label">Imagen Actual</label>
                    <?php if (!empty($consultorio[0]->idImagen)): ?>
                        <img src="<?= site_url('Imagen/getFile/' . $consultorio[0]->idImagen) ?>" alt="Imagen del consultorio"
                            class="d-block mb-3" width="150">
                    <?php else: ?>
                        <p>No hay imagen asociada.</p>
                    <?php endif; ?>
                </div>

                <!-- Subir nueva imagen -->
                <div class="mb-3">
                    <label for="imagen" class="form-label">Nueva Imagen</label>
                    <input type="file" name="imagen" class="form-control" accept="image/*">
                </div>

                <input type="hidden" name="idConsultorio" value="<?= $consultorio[0]->idConsultorio ?>">
                <input type="hidden" name="idImagen" value="<?= $consultorio[0]->idImagen ?>">

                <input type="submit" class="btn btn-success" value="Modificar">
            </form>
        </div>
    </div>
</div>
