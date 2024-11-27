<div class="container">
    <div class="row">
        <div class="col">

            <h2>Agregar Direccion del Doctor</h2>
            <?= validation_list_errors() ?>

            <form action="<?= base_url('doctor/insert'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                <div class="mb-3">
                    <label for="calle">Calle</label>
                    <input type="text" class="form-control" name="calle" required placeholder="Direccion" value="<?= set_value('direccion') ?>">

                </div>

                <div class="mb-3">
                    <label for="numero">Numero</label>
                    <input type="text" class="form-control" name="numero" required>
                </div>

                <div class="mb-3">
                    <label for="codigoPostal">Codigo Postal</label>
                    <input type="text" class="form-control" name="codigoPostal" required>
                </div>

                <div class="mb-3">
                    <label for="municipio">Municipio</label>
                    <input type="text" class="form-control" name="municipio" required>
                </div>

                <div class="mb-3">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" name="estado" required>
                </div>

                <h2>Agregar Datos del Doctor</h2>

                <div class="mb-3">
                    <label for="nombreD">Nombre</label>
                    <input type="text" class="form-control" name="nombreD" required placeholder="Doctor" value="<?= set_value('doctor') ?>">

                </div>
                <div class="mb-3">
                    <label for="apellidoPD">Apellido Paterno</label>
                    <input type="text" class="form-control" name="apellidoPD" required>
                </div>
                <div class="mb-3">
                    <label for="apellidoMD">Apellido Materno</label>
                    <input type="text" class="form-control" name="apellidoMD" required>
                </div>
                <div class="mb-3">
                    <label for="curp">CURP</label>
                    <input type="text" class="form-control" name="curp" required>
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
                    <label for="especialidad">Especialidad</label>
                    <input type="text" class="form-control" name="especialidad" required>
                </div>
                <div class="mb-3">
                    <label for="cedulaProfecional">Cedula Profecional</label>
                    <input type="text" class="form-control" name="cedulaProfecional" required>
                </div>
                <input type="submit" class="btn btn-success mt-3" value="Guardar">
            </form>

        </div>
    </div>
</div>