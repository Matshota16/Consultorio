<div class="container-fluid">
    <div class="container">
        <h1>Mis Citas</h1>
        
        <?php if (empty($citas)): ?>
            <p>No tienes citas registradas.</p>
        <?php else: ?>
            <!-- Separar en citas futuras y pasadas -->
            <h2>Citas Futuras</h2>
            <?php 
            $citasFuturas = array_filter($citas, function ($cita) {
                return strtotime($cita->fechaCita . ' ' . $cita->horaCita) >= time();
            });
            ?>
            <?php if (empty($citasFuturas)): ?>
                <p>No tienes citas futuras.</p>
            <?php else: ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Motivo</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Doctor</th>
                            <th>Especialidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($citasFuturas as $index => $cita): ?>
                            <tr>
                                <td><?= esc($cita->motivo) ?></td>
                                <td><?= esc($cita->fechaCita) ?></td>
                                <td><?= esc($cita->horaCita) ?></td>
                                <td><?= esc($cita->nombreDoctor . ' ' . $cita->apellidoPDoctor . ' ' . $cita->apellidoMDoctor) ?></td>
                                <td><?= esc($cita->especialidad) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

            <h2>Citas Pasadas</h2>
            <?php 
            $citasPasadas = array_filter($citas, function ($cita) {
                return strtotime($cita->fechaCita . ' ' . $cita->horaCita) < time();
            });
            ?>
            <?php if (empty($citasPasadas)): ?>
                <p>No tienes citas pasadas.</p>
            <?php else: ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Motivo</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Doctor</th>
                            <th>Especialidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($citasPasadas as $index => $cita): ?>
                            <tr>
                                <td><?= esc($cita->motivo) ?></td>
                                <td><?= esc($cita->fechaCita) ?></td>
                                <td><?= esc($cita->horaCita) ?></td>
                                <td><?= esc($cita->nombreDoctor . ' ' . $cita->apellidoPDoctor . ' ' . $cita->apellidoMDoctor) ?></td>
                                <td><?= esc($cita->especialidad) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        <?php endif; ?>
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
