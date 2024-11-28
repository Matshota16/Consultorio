<div class="container">
    <div class="row">
        <div class="col">
            <?= validation_list_errors() ?>
            <h2>Actualizar Direccion de doctor</h2>
            <form action="<?= base_url('doctor/update/'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />


                <div class="mb-3">
                    <label for="calle" class="form-label">Nombre</label>
                    <input name="calle" type="text" value="<?= $direccion[0]->calle; ?>"
                        class="form-control" id="direccion" placeholder="Direccion">
                    <input type="hidden" name="idDireccion" value="<?= $direccion[0]->idDireccion; ?>">
                </div>
                <div class="mb-3">
                    <label for="numero" class="form-label">Numero</label>
                    <input name="numero" type="text" value="<?= $direccion[0]->numero; ?>"
                        class="form-control" id="direccion" placeholder="Direccion">
                    <input type="hidden" name="idDireccion" value="<?= $direccion[0]->idDireccion; ?>">
                </div>
                <div class="mb-3">
                    <label for="codigoPostal" class="form-label">Codigo Postal</label>
                    <input name="codigoPostal" type="text" value="<?= $direccion[0]->codigoPostal; ?>"
                        class="form-control" id="direccion" placeholder="Direccion">
                    <input type="hidden" name="idDireccion" value="<?= $direccion[0]->idDireccion; ?>">
                </div>
                <div class="mb-3">
                    <label for="municipio" class="form-label">Municipio</label>
                    <input name="municipio" type="text" value="<?= $direccion[0]->municipio; ?>"
                        class="form-control" id="direccion" placeholder="Direccion">
                    <input type="hidden" name="idDireccion" value="<?= $direccion[0]->idDireccion; ?>">
                </div>
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <input name="estado" type="text" value="<?= $direccion[0]->estado; ?>"
                        class="form-control" id="direccion" placeholder="Direccion">
                    <input type="hidden" name="idDireccion" value="<?= $direccion[0]->idDireccion; ?>">
                </div>

                <h2>Actualizar Datos del doctor</h2>

                <div class="mb-3">
                    <label for="nombreD" class="form-label">Nombre</label>
                    <input name="nombreD" type="text" value="<?=$doctor[0]->nombreD; ?>"
                        class="form-control" id="doctor" placeholder="Doctor">
                    <input type="hidden" name="idDoctor" value="<?=$doctor[0]->idDoctor; ?>">
                </div>
                <div class="mb-3">
                    <label for="apellidoPD" class="form-label">Apellido Paterno</label>
                    <input name="apellidoPD" type="text" value="<?= $doctor[0]->apellidoPD; ?>"
                        class="form-control" id="doctor" placeholder="Doctor">
                    <input type="hidden" name="idDoctor" value="<?= $doctor[0]->idDoctor; ?>">
                </div>
                <div class="mb-3">
                    <label for="apellidoMD" class="form-label">Apellido Materno</label>
                    <input name="apellidoMD" type="text" value="<?= $doctor[0]->apellidoMD; ?>"
                        class="form-control" id="doctor" placeholder="Doctor">
                    <input type="hidden" name="idDoctor" value="<?= $doctor[0]->idDoctor; ?>">
                </div>
                <div class="mb-3">
                    <label for="curp" class="form-label">Curp</label>
                    <input name="curp" type="text" value="<?= $doctor[0]->curp; ?>"
                        class="form-control" id="doctor" placeholder="Doctor">
                    <input type="hidden" name="idDoctor" value="<?= $doctor[0]->idDoctor; ?>">
                </div>

                <div class="mb-3">
                    <label for="fechaDeNacimiento" class="form-label">Fecha de nacimiento</label>
                    <input name="fechaDeNacimiento" type="date" value="<?= $doctor[0]->fechaDeNacimiento; ?>"
                        class="form-control" id="doctor" placeholder="Doctor">
                    <input type="hidden" name="idDoctor" value="<?= $doctor[0]->idDoctor; ?>">
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input name="telefono" type="text" value="<?= $doctor[0]->telefono; ?>"
                        class="form-control" id="doctor" placeholder="Doctor">
                    <input type="hidden" name="idDoctor" value="<?= $doctor[0]->idDoctor; ?>">
                </div>
                <div class="mb-3">
                    <label for="genero" class="form-label">Genero</label>
                    <input name="genero" type="text" value="<?= $doctor[0]->genero; ?>"
                        class="form-control" id="doctor" placeholder="Doctor">
                    <input type="hidden" name="idDoctor" value="<?= $doctor[0]->idDoctor; ?>">
                </div>
                <div class="mb-3">
                    <label for="especialidad" class="form-label">Especialidad</label>
                    <input name="especialidad" type="text" value="<?= $doctor[0]->especialidad; ?>"
                        class="form-control" id="doctor" placeholder="Doctor">
                    <input type="hidden" name="idDoctor" value="<?= $doctor[0]->idDoctor; ?>">
                </div>
                <div class="mb-3">
                    <label for="cedulaProfecional" class="form-label">Cedula Profecional</label>
                    <input name="cedulaProfecional" type="text" value="<?= $doctor[0]->cedulaProfecional; ?>"
                        class="form-control" id="doctor" placeholder="Doctor">
                    <input type="hidden" name="idDoctor" value="<?= $doctor[0]->idDoctor; ?>">
                </div>
                

                <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">
            </form>

        </div>
    </div>
</div>