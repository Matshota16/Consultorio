<div class="container-fluid">
    <!-- Banner Superior -->
    <div class="row banner-superior text-white text-center d-flex align-items-center" style="height: 300px; position: relative;">
        <!-- Imagen de fondo -->
        <div style="background-image: url('<?= base_url('log.jpeg') ?>'); 
                    background-size: cover; 
                    background-position: center; 
                    filter: grayscale(70%) brightness(60%);
                    position: absolute; 
                    top: 0; 
                    left: 0; 
                    right: 0; 
                    bottom: 0; 
                    z-index: -1;">
        </div>

        <!-- Contenido -->
        <div class="col-12">
            <h1 class="texto">
                El objetivo de SimiMaps es ofrecer a los pacientes una herramienta fácil y accesible para programar sus consultas de manera rápida y sin complicaciones.
                A través de esta plataforma, los usuarios pueden seleccionar el consultorio de su preferencia,
                elegir el tipo de servicio que necesitan, y reservar una fecha y hora que se ajuste a sus horarios.
            </h1>
        </div>
    </div>

    <!-- Tarjetas de Consultorios -->
    <div class="container my-5">
        <div class="row g-4">
            <?php foreach ($cliente as $key) : ?>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <!-- Contenedor de la imagen -->
                        <div class="imgSecundaria text-center" style="overflow: hidden; max-height: 200px;">
                            <?php if (!empty($key->idImagen)) : ?>
                                <img src="<?= site_url('Imagen/getFile/' . $key->idImagen) ?>" 
                                     class="card-img-top img-fluid" 
                                     alt="<?= esc($key->nombreDelArchivo) ?>" 
                                     style="object-fit: cover; height: 100%; width: 100%;">
                            <?php else : ?>
                                <img src="<?= base_url('placeholder.jpg') ?>" 
                                     class="card-img-top img-fluid" 
                                     alt="No image available" 
                                     style="object-fit: cover; height: 100%; width: 100%;">
                            <?php endif; ?>
                        </div>
                        
                        <!-- Contenido del consultorio -->
                        <div class="card-body">
                            <h5 class="card-title text-center"><?= esc($key->nombreConsultorio) ?></h5>
                            <p class="card-text">
                                <strong>Abre:</strong> <?= esc($key->horaDeApertura) ?><br>
                                <strong>Cierra:</strong> <?= esc($key->horaDeCierre) ?>
                            </p>
                            <div class="text-center">
                                <a href="<?= base_url('Cliente/verConsultorio/' . $key->idConsultorio) ?>" class="btn btn-primary">Ver detalle</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Banner Inferior -->
    <div class="row bg-dark text-white text-center py-5">
    <div class="col-12">
        <h3>Soporte Técnico</h3>
        <p>¿Necesitas ayuda? Contáctanos a través de los siguientes medios:</p>
        <ul class="list-unstyled">
            <li><strong>Correo Electrónico:</strong> soporte@citasmedicas.com</li>
            <li><strong>Teléfono:</strong> 800-123-4567</li>
            <li><strong>Horario de Atención:</strong> Lunes a Viernes, de 9:00 AM a 6:00 PM</li>
        </ul>
        <p>Estamos aquí para ayudarte a resolver cualquier problema o duda que tengas.</p>
    </div>
</div>
</div>

</body>
</html>
