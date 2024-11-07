<div class="container">
    <div class="row">
        <div class="col">
            <h2>Agregar proveedor</h2>

            <form action="<?=base_url('proveedor/insert'); ?>" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre">

            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" name="telefono">

            <label for="calle">Calle</label>
            <input type="text" class="form-control" name="calle">

            <label for="numero">Número</label>
            <input type="text" class="form-control" name="numero">

            <label for="CP">CP</label>
            <input type="text" class="form-control" name="cp">

            <label for="idEstado">Estado</label>
            <select name="idEstado" class="form-control">
                <?php foreach ($estados as $key ) :?>
                   <option value="<?=$key->idEstado?>"><?=$key->estado?></option>
                <?php endforeach ?>

            </select>
            
            <input type="submit" class="btn btn-success mt-3" name="Guardar" value="Guardar">
            </form>
        </div>
    </div>
</div>