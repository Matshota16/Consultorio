<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="row">
        <div class="col-1000">
            <form action="<?=base_url('usuario/acceder'); ?>" method="POST" class="border p-4 rounded bg-light shadow">
                <h2 class="text-center">Acceso</h2>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre de usuario</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Contraseña</label>
                    <input type="password" name="pass" class="form-control" id="pass" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Acceder</button>
            </form>
        </div>
    </div>
</div>
