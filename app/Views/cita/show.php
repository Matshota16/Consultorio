<div class="container">

    <div class="row">
        <div class="col">
            <h1>Cita</h1>
            <a href="<?= base_url('cita/add'); ?> " class="btn btn-success">Agregar</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>idCita</th>
                    <th>Motivo</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Paciente</th>
                    <th>Doctor</th>
                </thead>
                <tbody>
                    <?php foreach ($cita as $key) : ?>
                        <tr>
                            <td><?= $key->idCita ?></td>
                            <td><?= $key->motivo ?></td>
                            <td><?= $key->fechaCita ?></td>
                            <td><?= $key->horaCita ?></td>
                            <td><?= $key->nombreP . ' ' . $key->apellidoPP . ' ' . $key->apellidoMP ?></td>
                            <?php endforeach ?>

                            <?php foreach ($cita1 as $key) : ?>
                            <td><?= 'Doctor: ' .$key->nombreD . ' ' . $key->apellidoPD . ' ' . $key->apellidoMD. ' Consultorio: ' . $key->nombreConsultorio . ' Hora De entrada: ' . $key->horaDeEntrada. ' Hora De Salida: ' . $key->horaDeSalida ?></td>
                            <td>
                            <?php endforeach ?>

                            <?php foreach ($cita as $key) : ?>
                                <a href="<?= base_url('cita/delete/' . $key->idCita); ?> " class="btn btn-danger">Borrar</a>
                                <a href="<?= base_url('cita/edit/' . $key->idCita); ?> " class="btn btn-warning">Modificar</a>

                            </td>
                            <?php endforeach ?>
                        </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>