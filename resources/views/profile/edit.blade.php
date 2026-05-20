@extends('layouts.app')

@section('title', 'Configuración de perfil')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <h1 class="mb-4 text-white fw-bold">Configuración de perfil</h1>

        <div class="card bg-dark text-white border-danger shadow-sm mb-4">
            <div class="card-body">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="card bg-dark text-white border-danger shadow-sm mb-4">
            <div class="card-body">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="card bg-dark text-white border-danger shadow-sm mb-4">
            <div class="card-body">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>
@endsection
