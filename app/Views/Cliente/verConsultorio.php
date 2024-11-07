<h1 class="texto-formal"><?=$cliente[0]->nombreConsultorio ?></h1>
<div class="conatiner">
    <div class="row">
        <div class="col-6">
            
      <img src="<?=base_url('consultorio.png'); ?>" class="d-block w-100" alt="">
    </div>

    </div>
        <div class="col-6">
            <h3>Telefono: <?=$cliente[0]->telefono; ?></h3>
            <h3>Correo Electronico: <?=$cliente[0] ->correoElectronico;?></h3>
                <iframe src="<?=$cliente[0]->maps; ?>"
                width="400" height="300"> </iframe>
    </div>
</div> 
</div> 
</body>
</html>