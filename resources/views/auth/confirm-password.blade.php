<x-guest-layout>
    <div class="alert alert-warning mb-4">
        Esta es un área segura de la aplicación. Por favor confirma tu contraseña antes de continuar.
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-3">
            <x-input-label for="password" value="Contraseña" />
            <x-text-input id="password" class="form-control mt-1" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-danger">Confirmar</button>
        </div>
    </form>
</x-guest-layout>
