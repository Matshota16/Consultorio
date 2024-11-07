<div class="container">
    <div class="row">
        <div class="col">

            <h2>Agregar Paciente</h2>
            <?= validation_list_errors() ?>

            <form action="<?= base_url('paciente/insert'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                <div class="mb-3">
                    <label for="nombreP">Nombre</label>
                    <input type="text" class="form-control" name="nombreP" required placeholder="Paciente" value="<?= set_value('paciente') ?>">

                </div>

                <div class="mb-3">
                    <label for="apellidoPP">Apellido Paterno</label>
                    <input type="text" class="form-control" name="apellidoPP" required>
                </div>

                <div class="mb-3">
                    <label for="apellidoMP">Apellido Materno</label>
                    <input type="text" class="form-control" name="apellidoMP" required>
                </div>

                <div class="mb-3">
                    <label for="curp">CURP</label>
                    <input type="text" class="form-control" name="curp" required>
                </div>

                <div class="mb-3">
                    <label for="numeroDeSeguridadSocial">Número de Seguridad Social</label>
                    <input type="text" class="form-control" name="numeroDeSeguridadSocial" required>
                </div>

                <div class="mb-3">
                    <label for="fechaDeNacimiento">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" name="fechaDeNacimiento" required>
                </div>

                <div class="mb-3">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" required>
                </div>

                <div class="mb-3">
                    <label for="genero">Genero</label>
                    <input type="text" class="form-control" name="genero" required>
                </div>

                <div class="mb-3">
                    <label for="idDireccion">ID Dirección</label>
                    <input type="hidden" name="idDireccion" class="form-control" value="<?= $lastDireccion ?>" readonly>
                    <input type="text" class="form-control" value="<?= $lastDireccion ?>" disabled>
                </div>

                <div class="mb-3">
                    <label for="alergias">Alergias</label>
                    <textarea class="form-control" name="alergias" rows="3"></textarea>
                </div>

                <input type="submit" class="btn btn-success mt-3" value="Guardar Paciente">
                <a href="<?= base_url('direccion'); ?>" class="btn btn-secondary mt-3">Regresar</a>
            </form>

        </div>
    </div>
</div>