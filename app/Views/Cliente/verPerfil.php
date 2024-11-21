<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Información del cliente</h1>
            </div>
        </div>

        <?php $session = session(); ?>

        <?php if ($session->get('logged_in') !== null): ?>
            <div class="row mt-4">
                <!-- Columna izquierda -->
                <div class="col-6">
                    <h3>Datos del Usuario</h3>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>nombre:</strong> <?= $session->get('nombre') ?: 'No disponible'; ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Apellido Paterno:</strong> <?= $session->get('apellidoPaterno') ?: 'No disponible'; ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Apellido Materno:</strong> <?= $session->get('apellidoMaterno') ?: 'No disponible'; ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Correo Electrónico:</strong> <?= $session->get('correoElectronico') ?: 'No disponible'; ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Curp:</strong> <?= $session->get('curp') ?: 'No disponible'; ?>
                        </li>
                        <li class="list-group-item">
                            <strong>NSS:</strong> <?= $session->get('numeroDeSeguridadSocial') ?: 'No disponible'; ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Fecha de nacimiento:</strong> <?= $session->get('fechaDeNacimiento') ?: 'No disponible'; ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Telefono:</strong> <?= $session->get('telefono') ?: 'No disponible'; ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Genero:</strong> <?= $session->get('genero') ?: 'No disponible'; ?>
                        </li>
                        <li class="list-group-item">
                            <strong>Alergias:</strong> <?= $session->get('alergias') ?: 'No disponible'; ?>
                        </li>
                        
                        
                    </ul>
                </div>

                <!-- Columna derecha -->
                <div class="col-6">
                    <h3>Opciones</h3>
                    <div class="d-flex flex-column">
                        <a href="<?= base_url('/usuario/salir'); ?>" class="btn btn-info mb-2">
                            Cerrar Sesión
                        </a>
                        <a href="<?= base_url('pagina/configuracion') ?>" class="btn btn-warning">
                            Editar
                        </a>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p>No has iniciado sesión. Por favor, <a href="<?= base_url('/usuario') ?>">inicia sesión</a>.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
</body>

</html>