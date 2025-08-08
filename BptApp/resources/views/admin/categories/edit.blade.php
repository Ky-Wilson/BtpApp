@extends('layouts.admin.master')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Modifier la catégorie : {{ $category->name }}</h5>
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom de la catégorie</label>
                            <select class="form-select" id="name" name="name" required>
                                <option value="" disabled>Sélectionner un type de bien</option>
                                <option value="terrain" {{ old('name', $category->name) == 'terrain' ? 'selected' : '' }}>Terrain</option>
                                <option value="maison" {{ old('name', $category->name) == 'maison' ? 'selected' : '' }}>Maison</option>
                                <option value="immeuble" {{ old('name', $category->name) == 'immeuble' ? 'selected' : '' }}>Immeuble</option>
                                <option value="bureau" {{ old('name', $category->name) == 'bureau' ? 'selected' : '' }}>Bureau</option>
                                <option value="appartement" {{ old('name', $category->name) == 'appartement' ? 'selected' : '' }}>Appartement</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection