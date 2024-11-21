<div class="container">
    <h1>Mis Citas</h1>
    <?php if (empty($citas)): ?>
        <p>No tienes citas registradas.</p>
    <?php else: ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Motivo</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Doctor</th>
                    <th>Paciente</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($citas as $index => $cita): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $cita->motivo ?></td>
                        <td><?= $cita->fechaCita ?></td>
                        <td><?= $cita->horaCita ?></td>
                        <td><?= $cita->doctorNombre ?></td>
                        <td><?= $cita->pacienteNombre ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
