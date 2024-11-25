<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="row">
        <div class="col">
            <form action="<?= base_url('usuario/registrar'); ?>" method="POST" class="border p-4 rounded bg-light shadow">
                <h2 class="text-center">Crear Cuenta</h2>

                <?php if (isset($validation)): ?>
                    <div class="alert alert-danger">
                        <?= $validation->listErrors(); ?>
                    </div>
                <?php endif; ?>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="apellidoPaterno" class="form-label">Apellido Paterno</label>
                    <input type="text" name="apellidoPaterno" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="apellidoMaterno" class="form-label">Apellido Materno</label>
                    <input type="text" name="apellidoMaterno" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="correoElectronico" class="form-label">Correo Electrónico</label>
                    <input type="email" name="correoElectronico" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="curp" class="form-label">CURP</label>
                    <input type="text" name="curp" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="numeroDeSeguridadSocial" class="form-label">Número de Seguridad Social</label>
                    <input type="number" name="numeroDeSeguridadSocial" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="fechaDeNacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" name="fechaDeNacimiento" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="genero" class="form-label">Género</label>
                    <select name="genero" class="form-control" required>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alergias" class="form-label">Alergias (Opcional)</label>
                    <input type="text" name="alergias" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Contraseña</label>
                    <input type="password" name="pass" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success w-100">Registrar</button>
            </form>
        </div>
    </div>
</div>
