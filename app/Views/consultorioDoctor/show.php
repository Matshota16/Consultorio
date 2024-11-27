<div class="container">

    <div class="row">
        <div class="col">
            <h1>Consultorios y sus Doctores</h1>
            <a href="<?= base_url('consultorioDoctor/add'); ?> " class="btn btn-success">Agregar</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>id</th>
                    <th>Consultorio</th>
                    <th>Doctor</th>
                    <th>Especialidad</th>
                    <th>Hora de entrada</th>
                    <th>Hora de salida</th>
                </thead>
                <tbody>
                    <?php foreach ($consultorioDoctor as $key) : ?>
                        <tr>
                            <td><?= $key->id ?></td>
                            <td><?= $key->nombreConsultorio ?></td>
                            <td><?= $key->nombreD . ' ' . $key->apellidoPD . ' ' . $key->apellidoMD ?></td>
                            <td><?= $key->especialidad ?></td>
                            <td><?= $key->horaDeEntrada ?></td>
                            <td><?= $key->horaDeSalida ?></td>
                            <td>
                                <a href="<?= base_url('consultorioDoctor/delete/' . $key->id); ?> " class="btn btn-danger">Borrar</a>
                                <a href="<?= base_url('consultorioDoctor/edit/' . $key->id); ?> " class="btn btn-warning">Modificar</a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>