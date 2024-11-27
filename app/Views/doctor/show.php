<div class="container">

    <div class="row">
        <div class="col">
            <h1>Doctores</h1>
            <a href="<?= base_url('doctor/add'); ?> " class="btn btn-success">Agregar</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>idDoctor</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Curp</th>
                    <th>Fecha de Nacimiento</th>
                    <th>telefono</th>
                    <th>Genero</th>
                    <th>Especialidad</th>
                    <th>Cedula Profecional</th>
                    <th>Calle</th>
                    <th>Codigo Postal</th>
                    <th>Municipio</th>
                    <th>Estado</th>
                </thead>
                <tbody>
                    <?php foreach ($doctor as $key) : ?>
                        <tr>
                            <td><?= $key->idDoctor ?></td>
                            <td><?= $key->nombreD ?></td>
                            <td><?= $key->apellidoPD ?></td>
                            <td><?= $key->apellidoMD ?></td>
                            <td><?= $key->curp ?></td>
                            <td><?= $key->fechaDeNacimiento ?></td>
                            <td><?= $key->telefono ?></td>
                            <td><?= $key->genero ?></td>
                            <td><?= $key->especialidad ?></td>
                            <td><?= $key->cedulaProfecional ?></td>
                            <td><?= $key->calle ?></td>
                            <td><?= $key->codigoPostal ?></td>
                            <td><?= $key->municipio ?></td>
                            <td><?= $key->estado ?></td>

                            <td>
                                <a href="<?= base_url('doctor/delete/' . $key->idDoctor); ?> " class="btn btn-danger">Borrar</a>
                                <a href="<?= base_url('doctor/edit/' . $key->idDoctor); ?> " class="btn btn-warning">Modificar</a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>