<div class="container">

    <div class="row">
        <div class="col">
            <h1>Direccion</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>idDireccion</th>
                    <th>Calle</th>
                    <th>Numero</th>
                    <th>Codigo Postal</th>
                    <th>Municipio</th>
                    <th>Estado</th>
                </thead>
                <tbody>
                    <?php foreach ($direccion as $key) : ?>
                        <tr>
                            <td><?= $key->idDireccion ?></td>
                            <td><?= $key->calle ?></td>
                            <td><?= $key->numero ?></td>
                            <td><?= $key->codigoPostal ?></td>
                            <td><?= $key->municipio ?></td>
                            <td><?= $key->estado ?></td>

                            <td>
                                <a href="<?= base_url('direccion/delete/' . $key->idDireccion); ?> " class="btn btn-danger">Borrar</a>
                                <a href="<?= base_url('direccion/edit/' . $key->idDireccion); ?> " class="btn btn-warning">Modificar</a>

                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>