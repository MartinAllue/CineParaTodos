<section>
    <h4 class="text-danger">Actualizar contraseña</h4>
    <p class="text-white-50">Asegúrate de usar una contraseña larga y segura.</p>

    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label text-white-50">Contraseña actual</label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-control bg-dark text-white border-secondary" autocomplete="current-password">
            @error('current_password', 'updatePassword') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label text-white-50">Nueva contraseña</label>
            <input id="update_password_password" name="password" type="password" class="form-control bg-dark text-white border-secondary" autocomplete="new-password">
            @error('password', 'updatePassword') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label text-white-50">Confirmar contraseña</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control bg-dark text-white border-secondary" autocomplete="new-password">
            @error('password_confirmation', 'updatePassword') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-danger">Guardar</button>
            @if (session('status') === 'password-updated')
                <span class="text-success small">Guardado.</span>
            @endif
        </div>
    </form>
</section>
