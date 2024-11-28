<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12">
                
            </div>
            <div class="col-6">
                <?php if (!empty($cliente->idImagen)) : ?>
                    <img src="<?= site_url('Imagen/getFile/' . $cliente->idImagen) ?>" class="d-block w-100" alt="<?= esc($cliente->nombreConsultorio) ?>">
                <?php else : ?>
                    <p>No image available</p>
                <?php endif; ?>
                <iframe src="<?= esc($cliente->maps) ?>" class="d-block w-100 mt-3" style="height: auto;" frameborder="0"></iframe>
            </div>

            <div class="col-6 d-flex flex-column justify-content-between">
                <div>
                <h3 class="titulo"><?= esc($cliente->nombreConsultorio) ?></h3>
                    <h3 class="texto-datoConsultorio">Teléfono: <?= esc($cliente->telefono) ?></h3>
                    <h3 class="texto-datoConsultorio">Correo Electrónico: <?= esc($cliente->correoElectronico) ?></h3>
                    <h3 class="texto-datoConsultorio">Hora de apertura: <?= esc($cliente->horaDeApertura) ?></h3>
                    <h3 class="texto-datoConsultorio">Hora de cierre: <?= esc($cliente->horaDeCierre) ?></h3>
                    <div class="text-center mt-4">
                    <a href="<?= base_url('Cita/formulario/' . esc($cliente->idConsultorio)) ?>" class="btn btn-warning">Agendar</a>
                </div>
                </div>
                
            </div>
        </div>
    </div>

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