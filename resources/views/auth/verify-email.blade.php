<x-guest-layout>
    <div class="alert alert-info mb-4">
        Gracias por registrarte. Antes de empezar, verifica tu dirección de correo haciendo clic en el enlace que te acabamos de enviar. Si no recibiste el correo, te enviaremos otro.
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success mb-4">
            Se ha enviado un nuevo enlace de verificación al correo que proporcionaste durante el registro.
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mt-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Reenviar correo de verificación</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-light btn-sm">Cerrar sesión</button>
        </form>
    </div>
</x-guest-layout>
