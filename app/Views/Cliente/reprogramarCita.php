<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <?= validation_list_errors() ?>
                <h2>Actualizar Cita</h2>
                <form action="<?= base_url('cita/updateCliente/'); ?>" method="POST">
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

                    <input type="submit" class="btn btn-success" name="Modificar" value="Reprogramar">
                </form>
            </div>
        </div>
    </div>
    <!-- Banner de soporte técnico -->
    <div class="row bg-dark text-white text-center py-5 mt-4">
        <div class="col-lg-8 offset-lg-2">
            <h3>Soporte Técnico</h3>
            <p class="mb-3">¿Necesitas ayuda? Contáctanos a través de los siguientes medios:</p>
            <ul class="list-unstyled mb-3">
                <li><strong>Correo Electrónico:</strong> soporte@citasmedicas.com</li>
                <li><strong>Teléfono:</strong> 800-123-4567</li>
                <li><strong>Horario de Atención:</strong> Lunes a Viernes, de 9:00 AM a 6:00 PM</li>
            </ul>
            <p>Estamos aquí para ayudarte a resolver cualquier problema o duda que tengas.</p>
        </div>
    </div>
</div>
