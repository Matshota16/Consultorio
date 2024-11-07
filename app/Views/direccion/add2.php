<div class="container">
    <div class="row">
        <div class="col">

            <h2>Agregar Direccion Consultorio</h2>
            <?= validation_list_errors() ?>

            <form action="<?= base_url('direccion/insert2'); ?>" method="POST">
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

                <input type="submit" class="btn btn-success mt-3" value="Guardar">
            </form>

        </div>
    </div>
</div>