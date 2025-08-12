@extends('layouts.register')

@section('content')
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf
    
    <div class="mb-3">
        <label for="name" class="form-label">{{ __('Nom de l\'entreprise') }}</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="email" class="form-label">{{ __('Addresse Email') }}</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="logo" class="form-label">Logo</label>
        <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo">
        @error('logo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="coordonnees" class="form-label">Coordonnées</label>
        <input id="coordonnees" type="text" class="form-control @error('coordonnees') is-invalid @enderror" name="coordonnees" value="{{ old('coordonnees') }}">
        @error('coordonnees')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    
    <div class="mb-4">
        <label for="password-confirm" class="form-label">{{ __('Confirmez votre mot de passe') }}</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
    
    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">{{ __('Register') }}</button>
    
    <div class="d-flex align-items-center justify-content-center">
        <p class="fs-4 mb-0 fw-bold">Vous avez deja un compte ?</p>
        <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Connectez-vous</a>
    </div>
</form>
@endsection
              