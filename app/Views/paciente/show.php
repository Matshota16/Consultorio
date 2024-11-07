<div class="container">

    <div class="row">
        <div class="col">
            <h1>Paciente</h1>
            <a href="<?= base_url('direccion/add/'); ?> " class="btn btn-success">Agregar</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>idPaciente</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Curp</th>
                    <th>Numero de seguro social</th>
                    <th>Fecha de Nacimiento</th>
                    <th>telefono</th>
                    <th>Genero</th>
                    <th>Calle</th>
                    <th>Codigo Postal</th>
                    <th>Municipio</th>
                    <th>Estado</th>
                    <th>Alergias</th>
                </thead>
                <tbody>
                    <?php foreach ($paciente as $key) : ?>
                        <tr>
                            <td><?= $key->idPaciente ?></td>
                            <td><?= $key->nombreP ?></td>
                            <td><?= $key->apellidoPP ?></td>
                            <td><?= $key->apellidoMP ?></td>
                            <td><?= $key->curp ?></td>
                            <td><?= $key->numeroDeSeguridadSocial ?></td>
                            <td><?= $key->fechaDeNacimiento ?></td>
                            <td><?= $key->telefono ?></td>
                            <td><?= $key->genero ?></td>
                            <td><?= $key->calle ?></td>
                            <td><?= $key->codigoPostal ?></td>
                            <td><?= $key->municipio ?></td>
                            <td><?= $key->estado ?></td>
                            <td><?= $key->alergias ?></td>

                            <td>
                                <a href="<?= base_url('paciente/delete/' . $key->idPaciente); ?> " class="btn btn-danger">Borrar</a>
                                <a href="<?= base_url('paciente/edit/' . $key->idPaciente); ?> " class="btn btn-warning">Modificar</a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>