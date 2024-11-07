<div class="container">
    <div class="row">
        <div class="col">
            <table class="table">
               <thead>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Calle</th>
                <th>No</th>
                <th>CP</th>
                <th>Estado</th>
                </thead>
                <?php foreach($proveedores as $key) :?>
                    <tr>
                        <td><?=$key->nombre; ?></td>
                        <td><?=$key->telefono; ?></td>
                        <td><?=$key->calle; ?></td>
                        <td><?=$key->numero; ?></td>
                        <td><?=$key->cp; ?></td>
                        <td><?=$key->estado; ?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>