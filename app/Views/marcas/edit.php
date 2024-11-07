<div class="container">
    <div class="row">
        <div class="col">
<?php print_r($marca); ?>
        <h2>Actualizar Marca</h2>
    <form action="<?=base_url('marcas/update/'); ?>" method="POST">
        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input name="marca" type="text" value="<?=$marca[0]->marca; ?>"
                 class="form-control" id="marca" placeholder="Marca">
           <input type="hidden" name="idmarca" value="<?=$marca[0]->idmarca;?>" >
        </div>
        <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">
        </form>
    
    </div>
    </div>
</div>