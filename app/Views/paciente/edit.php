<div class="container">
    <div class="row">
        <div class="col">
            <?= validation_list_errors() ?>
            <h2>Actualizar Paciente</h2>
            <form action="<?= base_url('paciente/update/'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="mb-3">
                    <label for="nombreP" class="form-label">Nombre</label>
                    <input name="nombreP" type="text" value="<?= $paciente[0]->nombreP; ?>"
                        class="form-control" id="paciente" placeholder="Paciente">
                    <input type="hidden" name="idPaciente" value="<?= $paciente[0]->idPaciente; ?>">
                </div>
                <div class="mb-3">
                    <label for="apellidoPP" class="form-label">Apellido Paterno</label>
                    <input name="apellidoPP" type="text" value="<?= $paciente[0]->apellidoPP; ?>"
                        class="form-control" id="paciente" placeholder="Paciente">
                    <input type="hidden" name="idPaciente" value="<?= $paciente[0]->idPaciente; ?>">
                </div>
                <div class="mb-3">
                    <label for="apellidoMP" class="form-label">Apellido Materno</label>
                    <input name="apellidoMP" type="text" value="<?= $paciente[0]->apellidoMP; ?>"
                        class="form-control" id="paciente" placeholder="Paciente">
                    <input type="hidden" name="idPaciente" value="<?= $paciente[0]->idPaciente; ?>">
                </div>
                <div class="mb-3">
                    <label for="curp" class="form-label">Curp</label>
                    <input name="curp" type="text" value="<?= $paciente[0]->curp; ?>"
                        class="form-control" id="paciente" placeholder="Paciente">
                    <input type="hidden" name="idPaciente" value="<?= $paciente[0]->idPaciente; ?>">
                </div>
                <div class="mb-3">
                    <label for="numeroDeSeguridadSocial" class="form-label">Numero de seguro social</label>
                    <input name="numeroDeSeguridadSocial" type="text" value="<?= $paciente[0]->numeroDeSeguridadSocial; ?>"
                        class="form-control" id="paciente" placeholder="Paciente">
                    <input type="hidden" name="idPaciente" value="<?= $paciente[0]->idPaciente; ?>">
                </div>
                <div class="mb-3">
                    <label for="fechaDeNacimiento" class="form-label">Fecha de nacimiento</label>
                    <input name="fechaDeNacimiento" type="text" value="<?= $paciente[0]->fechaDeNacimiento; ?>"
                        class="form-control" id="paciente" placeholder="Paciente">
                    <input type="hidden" name="idPaciente" value="<?= $paciente[0]->idPaciente; ?>">
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input name="telefono" type="text" value="<?= $paciente[0]->telefono; ?>"
                        class="form-control" id="paciente" placeholder="Paciente">
                    <input type="hidden" name="idPaciente" value="<?= $paciente[0]->idPaciente; ?>">
                </div>
                <div class="mb-3">
                    <label for="genero" class="form-label">Genero</label>
                    <input name="genero" type="text" value="<?= $paciente[0]->genero; ?>"
                        class="form-control" id="paciente" placeholder="Paciente">
                    <input type="hidden" name="idPaciente" value="<?= $paciente[0]->idPaciente; ?>">
                </div>

                <div class="mb-3">
                    <label for="alergias" class="form-label">Alergias</label>
                    <input name="" type="text" value="<?= $paciente[0]->alergias; ?>"
                        class="form-control" id="paciente" placeholder="Paciente">
                    <input type="hidden" name="idPaciente" value="<?= $paciente[0]->idPaciente; ?>">
                </div>
                <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">
            </form>

        </div>
    </div>
</div>