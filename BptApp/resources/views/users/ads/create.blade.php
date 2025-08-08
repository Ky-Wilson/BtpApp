@extends('layouts.users.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Créer une nouvelle annonce</h5>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('users.ads.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="title" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="category_id" class="form-label">Catégorie</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            <option value="" disabled selected>Sélectionner une catégorie</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                </div>
                
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="price" class="form-label">Prix</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="status" class="form-label">Statut</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="à vendre" {{ old('status') == 'à vendre' ? 'selected' : '' }}>À vendre</option>
                            <option value="à louer" {{ old('status') == 'à louer' ? 'selected' : '' }}>À louer</option>
                            <option value="vendu" {{ old('status') == 'vendu' ? 'selected' : '' }}>Vendu</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="location" class="form-label">Localisation</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}">
                    </div>
                </div>
                
                <hr class="my-4">
                <h6 class="mb-3">Caractéristiques</h6>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="surface" class="form-label">Surface</label>
                        <input type="text" class="form-control" id="surface" name="surface" value="{{ old('surface') }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="nombre_de_pieces" class="form-label">Nombre de pièces</label>
                        <input type="number" class="form-control" id="nombre_de_pieces" name="nombre_de_pieces" value="{{ old('nombre_de_pieces') }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="equipements" class="form-label">Équipements</label>
                        <input type="text" class="form-control" id="equipements" name="equipements" value="{{ old('equipements') }}" placeholder="Ex: Climatisation, Parking">
                    </div>
                </div>
                
                <hr class="my-4">
                <h6 class="mb-3">Médias et documents</h6>
                <div class="row">
                    @for ($i = 1; $i <= 4; $i++)
                        <div class="col-md-3 mb-3">
                            <label for="images_{{ $i }}" class="form-label">Image {{ $i }}</label>
                            <input class="form-control" type="file" id="images_{{ $i }}" name="images[]">
                        </div>
                    @endfor
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="videos" class="form-label">Vidéo (1 seule)</label>
                        <input class="form-control" type="file" id="videos" name="videos[]">
                    </div>
                </div>
                <div class="row">
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="col-md-4 mb-3">
                            <label for="documents_{{ $i }}" class="form-label">Document {{ $i }}</label>
                            <input class="form-control" type="file" id="documents_{{ $i }}" name="documents[]">
                        </div>
                    @endfor
                </div>

                <hr class="my-4">
                <h6 class="mb-3">Informations de contact</h6>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="whatsapp_link" class="form-label">Lien WhatsApp</label>
                        <input type="text" class="form-control" id="whatsapp_link" name="whatsapp_link" value="{{ old('whatsapp_link') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone_number" class="form-label">Numéro de téléphone</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary mt-3">Enregistrer l'annonce</button>
            </form>
        </div>
    </div>
</div>
@endsection