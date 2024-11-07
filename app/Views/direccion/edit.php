<div class="container">
    <div class="row">
        <div class="col">
            <?= validation_list_errors() ?>
            <h2>Actualizar direccion</h2>
            <form action="<?= base_url('direccion/update/'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="mb-3">
                    <label for="calle" class="form-label">Nombre</label>
                    <input name="calle" type="text" value="<?= $direccion[0]->calle; ?>"
                        class="form-control" id="direccion" placeholder="Direccion">
                    <input type="hidden" name="idDireccion" value="<?= $direccion[0]->idDireccion; ?>">
                </div>
                <div class="mb-3">
                    <label for="numero" class="form-label">Numero</label>
                    <input name="numero" type="text" value="<?= $direccion[0]->numero; ?>"
                        class="form-control" id="direccion" placeholder="Direccion">
                    <input type="hidden" name="idDireccion" value="<?= $direccion[0]->idDireccion; ?>">
                </div>
                <div class="mb-3">
                    <label for="codigoPostal" class="form-label">Codigo Postal</label>
                    <input name="codigoPostal" type="text" value="<?= $direccion[0]->codigoPostal; ?>"
                        class="form-control" id="direccion" placeholder="Direccion">
                    <input type="hidden" name="idDireccion" value="<?= $direccion[0]->idDireccion; ?>">
                </div>
                <div class="mb-3">
                    <label for="municipio" class="form-label">Municipio</label>
                    <input name="municipio" type="text" value="<?= $direccion[0]->municipio; ?>"
                        class="form-control" id="direccion" placeholder="Direccion">
                    <input type="hidden" name="idDireccion" value="<?= $direccion[0]->idDireccion; ?>">
                </div>
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <input name="estado" type="text" value="<?= $direccion[0]->estado; ?>"
                        class="form-control" id="direccion" placeholder="Direccion">
                    <input type="hidden" name="idDireccion" value="<?= $direccion[0]->idDireccion; ?>">
                </div>

                
                <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">
            </form>

        </div>
    </div>
</div>