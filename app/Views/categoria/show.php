<div class="container">
    <div class="row">
        <div class="col">
            <?php print_r($categorias);?>
            <table class="table table-striped">
                <thead>
                    <th>
                        Categoría
                    </th>
                    <th>
                        Abreviatura
                    </th>
                </thead>
                <tbody>
                <?php foreach($categorias as $key) :?>
                    <tr>
                        
                        <td><?=$key->categoria; ?></td>
                        <td><?=$key->abreviatura; ?></td>
                        <td><a href="<?=base_url('categoria/delete/'.$key->idCategoria); ?>">Borrar</a></td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>