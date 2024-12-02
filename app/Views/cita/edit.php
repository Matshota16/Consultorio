<div class="container">
    <div class="row">
        <div class="col">
            <?= validation_list_errors() ?>
            <h2>Actualizar Cita</h2>
            <form action="<?= base_url('cita/update/'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="mb-3">
                    <label for="motivo" class="form-label">Motivo</label>
                    <input name="motivo" type="text" value="<?= $cita[0]->motivo; ?>"
                        class="form-control" id="cita" placeholder="Cita">
                    <input type="hidden" name="idCita" value="<?= $cita[0]->idCita; ?>">
                </div>

                <div class="mb-3">
                    <label for="fechaCita" class="form-label">Fecha</label>
                    <input name="fechaCita" type="date" value="<?= $cita[0]->fechaCita; ?>"
                        class="form-control" id="cita" placeholder="Cita">
                    <input type="hidden" name="idCita" value="<?= $cita[0]->idCita; ?>">
                </div>

                <div class="mb-3">
                    <label for="horaCita" class="form-label">Hora</label>
                    <input name="horaCita" type="text" value="<?= $cita[0]->horaCita; ?>"
                        class="form-control" id="cita" placeholder="Cita">
                    <input type="hidden" name="idCita" value="<?= $cita[0]->idCita; ?>">
                </div>
                
                
                
                <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">
            </form>

        </div>
    </div>
</div>