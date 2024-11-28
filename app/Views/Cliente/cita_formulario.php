<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Agregar Cita</h2>
                <?php if (session()->has('error')): ?>
    <div class="alert alert-danger">
        <?= session('error') ?>
    </div>
<?php endif; ?>


                <form action="<?= base_url('citaUsuario/insert') ?>" method="POST">
                    <?= csrf_field() ?>
                    <input type="hidden" name="idConsultorio" value="<?= esc($consultorioId) ?>" />

                    <div class="mb-3">
                        <label for="motivo">Motivo</label>
                        <input type="text" class="form-control" name="motivo" required placeholder="Motivo de la cita">
                    </div>

                    <div class="mb-3">
                        <label for="fechaCita">Fecha</label>
                        <input type="date" class="form-control" name="fechaCita" required>
                    </div>

                    <div class="mb-3">
                        <label for="horaCita">Hora</label>
                        <select class="form-control" name="horaCita" required>
                            <?php
                            $startHour = 8; // Hora de inicio
                            $endHour = 22; // Hora de fin

                            for ($hour = $startHour; $hour <= $endHour; $hour++) {
                                $formattedHour = str_pad($hour, 2, '0', STR_PAD_LEFT) . ':00:00';
                                echo "<option value=\"$formattedHour\">$formattedHour</option>";
                            }
                            ?>
                        </select>
                    </div>





                    <div class="mb-3">
                        <label for="id">Doctor</label>
                        <select name="id" class="form-control" required>
                            <?php foreach ($doctores as $doctor): ?>
                                <option value="<?= esc($doctor->idDoctor) ?>">
                                    <?= 'Dr. ' . esc($doctor->nombreD . ' ' . $doctor->apellidoPD . ' ' . $doctor->apellidoMD) ?>
                                    (Entrada: <?= esc($doctor->horaDeEntrada) ?>, Salida: <?= esc($doctor->horaDeSalida) ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <input type="submit" class="btn btn-success mt-3" value="Guardar">
                </form>
            </div>
        </div>
    </div>

    <div class="row bg-dark text-white text-center py-5">
    <div class="col-12">
        <h3>Soporte Técnico</h3>
        <p>¿Necesitas ayuda? Contáctanos a través de los siguientes medios:</p>
        <ul class="list-unstyled">
            <li><strong>Correo Electrónico:</strong> soporte@citasmedicas.com</li>
            <li><strong>Teléfono:</strong> 800-123-4567</li>
            <li><strong>Horario de Atención:</strong> Lunes a Viernes, de 9:00 AM a 6:00 PM</li>
        </ul>
        <p>Estamos aquí para ayudarte a resolver cualquier problema o duda que tengas.</p>
    </div>
</div>
</div>