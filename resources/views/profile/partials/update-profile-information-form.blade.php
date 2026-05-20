<section>
    <h4 class="text-danger">Información del perfil</h4>
    <p class="text-white-50">Actualiza la información de tu cuenta.</p>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label text-white-50">Nombre</label>
            <input id="name" name="name" type="text" class="form-control bg-dark text-white border-secondary" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label text-white-50">Email</label>
            <input id="email" name="email" type="email" class="form-control bg-dark text-white border-secondary" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="small text-white-50">
                        Tu dirección de email no está verificada.
                        <button form="send-verification" class="btn btn-link btn-sm p-0 text-danger">Haz clic aquí para reenviar el email de verificación.</button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="text-success small mt-1">Se ha enviado un nuevo enlace de verificación a tu email.</p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-danger">Guardar</button>
            @if (session('status') === 'profile-updated')
                <span class="text-success small">Guardado.</span>
            @endif
        </div>
    </form>
</section>
