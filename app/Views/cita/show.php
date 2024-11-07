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
                    <th>idDireccion</th>
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
                            <td>
                                <a href="<?= base_url('cita/delete/' . $key->idDireccion); ?> " class="btn btn-danger">Borrar</a>
                                <a href="<?= base_url('cita/edit/' . $key->idDireccion); ?> " class="btn btn-warning">Modificar</a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>