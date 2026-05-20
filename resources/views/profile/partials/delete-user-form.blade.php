<section>
    <h4 class="text-danger">Eliminar cuenta</h4>
    <p class="text-white-50">Una vez eliminada tu cuenta, todos sus datos serán borrados permanentemente. Antes de eliminar, descarga cualquier información que quieras conservar.</p>

    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirm-user-deletion">
        Eliminar cuenta
    </button>

    <div class="modal fade" id="confirm-user-deletion" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-white border-danger">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <h5 class="text-danger">¿Estás seguro de que quieres eliminar tu cuenta?</h5>
                        <p class="text-white-50 small">Una vez eliminada tu cuenta, todos sus datos serán borrados permanentemente. Introduce tu contraseña para confirmar.</p>

                        <div class="mt-3">
                            <label for="password" class="form-label text-white-50">Contraseña</label>
                            <input id="password" name="password" type="password" class="form-control bg-dark text-white border-secondary" placeholder="Contraseña">
                            @error('password', 'userDeletion') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="modal-footer border-secondary">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar cuenta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
