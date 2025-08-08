@extends('layouts.admin.master')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Créer une catégorie</h5>
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom de la catégorie</label>
                            <select class="form-select" id="name" name="name" required>
                                <option value="" disabled selected>Sélectionner un type de bien</option>
                                <option value="terrain" {{ old('name') == 'terrain' ? 'selected' : '' }}>Terrain</option>
                                <option value="maison" {{ old('name') == 'maison' ? 'selected' : '' }}>Maison</option>
                                <option value="immeuble" {{ old('name') == 'immeuble' ? 'selected' : '' }}>Immeuble</option>
                                <option value="bureau" {{ old('name') == 'bureau' ? 'selected' : '' }}>Bureau</option>
                                <option value="appartement" {{ old('name') == 'appartement' ? 'selected' : '' }}>Appartement</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection