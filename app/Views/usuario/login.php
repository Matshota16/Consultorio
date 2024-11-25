<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="row">
        <div class="col-1000">
            <form action="<?= base_url('usuario/acceder'); ?>" method="POST" class="border p-4 rounded bg-light shadow">
                <h2 class="text-center">Acceder</h2>
                <div class="mb-3">
                    <label for="correoElectronico" class="form-label">Correo Electrónico</label>
                    <input type="email" name="correoElectronico" class="form-control" id="correoElectronico" required>
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Contraseña</label>
                    <input type="password" name="pass" class="form-control" id="pass" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Acceder</button>

                <div class="mb-3 text-center">
    <p>¿No tienes una cuenta? <a href="<?= base_url('usuario/registrar'); ?>" class="btn btn-link">Crear una cuenta</a></p>
</div>

            </form>
        </div>
    </div>
</div>