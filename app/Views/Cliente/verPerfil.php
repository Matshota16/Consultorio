
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
                                <strong>Correo Electrónico:</strong> <?= $session->get('correoElectronico') ?: 'No disponible'; ?>
                            </li>
                            <li class="list-group-item">
                                <strong>Tipo de Usuario:</strong> <?= $session->get('tipo') == 0 ? 'Administrador' : 'Cliente'; ?>
                            </li>
                        </ul>
                    </div>

                    <!-- Columna derecha -->
                    <div class="col-6">
                        <h3>Opciones</h3>
                        <div class="d-flex flex-column">
                            <a href="<?= base_url('pagina/salir') ?>" class="btn btn-danger mb-2">
                                Cerrar Sesión
                            </a>
                            <a href="<?= base_url('pagina/perfil') ?>" class="btn btn-info mb-2">
                                Ver Perfil
                            </a>
                            <a href="<?= base_url('pagina/configuracion') ?>" class="btn btn-warning">
                                Configuración
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
