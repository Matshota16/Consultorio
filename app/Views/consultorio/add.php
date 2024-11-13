<div class="container">
    <div class="row">
        <div class="col">

            <h2>Agregar Consultorio</h2>
            <?= validation_list_errors() ?>

            <form action="<?= base_url('consultorio/insert'); ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                <div class="mb-3">
                    <label for="nombreConsultorio">Nombre</label>
                    <input type="text" class="form-control" name="nombreConsultorio" required placeholder="Consultorio" value="<?= set_value('consultorio') ?>">

                </div>

                <div class="mb-3">
                    <label for="telefono">Telefono</label>
                    <input type="text" class="form-control" name="telefono" required>
                </div>

                <div class="mb-3">
                    <label for="correoElectronico">Correo Electronico</label>
                    <input type="text" class="form-control" name="correoElectronico" required>
                </div>

                <div class="mb-3">
                    <label for="horaDeApertura">Hora de Apertura</label>
                    <input type="text" class="form-control" name="horaDeApertura" required>
                </div>

                <div class="mb-3">
                    <label for="horaDeCierre">Hora de Cierre</label>
                    <input type="text" class="form-control" name="horaDeCierre" required>
                </div>

                <div class="mb-3">
                    <label for="idDireccion">ID Dirección</label>
                    <input type="hidden" name="idDireccion" class="form-control" value="<?= $lastDireccion ?>" readonly>
                    <input type="text" class="form-control" value="<?= $lastDireccion ?>" disabled>
                </div>

                

                <div class="mb-3">
                    <label for="maps">Maps</label>
                    <input type="text" class="form-control" name="maps" required>
                </div>

                <div class="mb-3">
                    <label for="idImagen">ID Imagen</label>
                    <input type="hidden" name="idImagen" class="form-control" value="<?= $lastImagen ?>" readonly>
                    <input type="num" class="form-control" value="<?= $lastImagen ?>" disabled>
                </div>

                <input type="submit" class="btn btn-success mt-3" value="Guardar">

                <a href="<?= base_url('imagen/add'); ?>" class="btn btn-success mt-3">Agregar Imagen</a>
            </form>

        </div>
    </div>
</div>