<div class="container">
    <div class="row">
        <div class="col">

            <h2>Agregar Imagen del consultorio</h2>
            <?= validation_list_errors() ?>

            <?= form_open_multipart('Imagen/upload') ?>
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

            <div class="mb-3">
                <label for="imagen">Imagen</label>
                <input type="file" class="form-control" name="imagen" required>
            </div>

            <input type="submit" class="btn btn-success mt-3" value="upload">

        </div>
    </div>
</div>