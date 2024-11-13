<div class="container">
    <div class="row">
        <div class="col">
            <h1>Consultorio</h1>
            <a href="<?= base_url('direccion/add2'); ?>" class="btn btn-success">Agregar</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>idConsultorio</th>
                    <th>Nombre Consultorio</th>
                    <th>Telefono</th>
                    <th>Correo Electronico</th>
                    <th>Hora De Apertura</th>
                    <th>Hora De Cierre</th>
                    <th>Id Imagen</th>

                    <th>Imagen</th> <!-- Nueva columna para la imagen -->
                </thead>
                <tbody>
                    <?php foreach ($consultorio as $key) : ?>
                        <tr>
                            <td><?= $key->idConsultorio ?></td>
                            <td><?= $key->nombreConsultorio ?></td>
                            <td><?= $key->telefono ?></td>
                            <td><?= $key->correoElectronico ?></td>
                            <td><?= $key->horaDeApertura ?></td>
                            <td><?= $key->horaDeCierre ?></td>
                            <td><?= $key->idImagen ?></td>

                            <td>
                                <?php if (!empty($key->idImagen)) : ?>
                                    <a href="<?= site_url('Imagen/getFile/' . $key->idImagen) ?>" target="_blank">
                                        <img src="<?= site_url('Imagen/getFile/' . $key->idImagen) ?>" alt="<?= esc($key->nombreDelArchivo) ?>" class="img-fluid">
                                    </a>
                                <?php else: ?>
                                    <p>No image available</p>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('consultorio/delete/' . $key->idConsultorio); ?>" class="btn btn-danger">Borrar</a>
                                <a href="<?= base_url('consultorio/edit/' . $key->idConsultorio); ?>" class="btn btn-warning">Modificar</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>