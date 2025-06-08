<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- modal-lg para mejor visual en pantallas grandes -->
        <div class="modal-content">
        
            <div class="modal-header">
                <h5 class="modal-title" id="miModalLabel">Editar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <form action="{{ route('usuarios.update',1) }}" method="POST">
                @csrf

                <div class="modal-body">
                    <input type="hidden" name="idUsuario" id="editarIdUsuario"> <!-- ID oculto -->

                    <div class="mb-3">
                        <label for="editarNombreUsuario" class="form-label">Nombre de Usuario</label>
                        <input type="text" class="form-control" name="nombreUsuario" id="editarNombreUsuario" required>
                    </div>

                    <div class="mb-3">
                        <label for="editarContrasena" class="form-label">Contraseña</label>
                        <input type="contrasena" class="form-control" name="contrasena" id="editarContrasena" required>
                    </div>

                    <div class="mb-3">
                        <label for="editarTipo" class="form-label">Tipo de Usuario</label>
                        <select class="form-select" name="tipo" id="editarTipo" required>
                            <option value="1">Administrador</option>
                            <option value="2">Profesor</option>
                            <option value="3">Estudiante</option>
                            <!-- Agregá más si tenés otros tipos -->
                        </select>
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>

            </form>
        </div>
    </div>
</div>
