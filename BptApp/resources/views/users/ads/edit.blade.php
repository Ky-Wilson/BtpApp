@extends('layouts.users.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Modifier une annonce</h5>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('users.ads.update', $ad) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="title" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $ad->title) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="category_id" class="form-label">Catégorie</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            <option value="" disabled>Sélectionner une catégorie</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $ad->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description', $ad->description) }}</textarea>
                </div>
                
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="price" class="form-label">Prix</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $ad->price) }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="status" class="form-label">Statut</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="à vendre" {{ old('status', $ad->status) == 'à vendre' ? 'selected' : '' }}>À vendre</option>
                            <option value="à louer" {{ old('status', $ad->status) == 'à louer' ? 'selected' : '' }}>À louer</option>
                            <option value="vendu" {{ old('status', $ad->status) == 'vendu' ? 'selected' : '' }}>Vendu</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="location" class="form-label">Localisation</label>
                        <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $ad->location) }}">
                    </div>
                </div>
                
                <hr class="my-4">
                <h6 class="mb-3">Caractéristiques</h6>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="surface" class="form-label">Surface</label>
                        <input type="text" class="form-control" id="surface" name="surface" value="{{ old('surface', $ad->surface) }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="nombre_de_pieces" class="form-label">Nombre de pièces</label>
                        <input type="number" class="form-control" id="nombre_de_pieces" name="nombre_de_pieces" value="{{ old('nombre_de_pieces', $ad->nombre_de_pieces) }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="equipements" class="form-label">Équipements</label>
                        <input type="text" class="form-control" id="equipements" name="equipements" value="{{ old('equipements', $ad->equipements) }}" placeholder="Ex: Climatisation, Parking">
                    </div>
                </div>
                
                <hr class="my-4">
                <h6 class="mb-3">Médias et documents</h6>
                
                <div class="row mb-3">
                    <p class="form-label fw-bold">Images existantes</p>
                    @if ($ad->images)
                        @foreach ($ad->images as $image)
                        <div class="col-md-3 position-relative">
                            <img src="{{ Storage::url($image) }}" class="img-fluid rounded mb-2" alt="Image de l'annonce">
                            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1" onclick="deleteFile('{{ $image }}', this)">Supprimer</button>
                        </div>
                        @endforeach
                    @endif
                </div>

                <div class="row mb-3">
                    <p class="form-label fw-bold">Ajouter de nouvelles images (4 max)</p>
                    @for ($i = 0; $i < 4; $i++)
                        <div class="col-md-3 mb-3">
                            <label for="images_{{ $i }}" class="form-label">Image {{ $i + 1 }}</label>
                            <input class="form-control" type="file" id="images_{{ $i }}" name="images[]">
                        </div>
                    @endfor
                </div>

                <div class="row mb-3">
                    <p class="form-label fw-bold">Vidéo existante</p>
                    @if ($ad->videos && count($ad->videos) > 0)
                        <div class="col-md-6 position-relative">
                            <video class="img-fluid rounded mb-2" controls>
                                <source src="{{ Storage::url($ad->videos[0]) }}" type="video/mp4">
                                Votre navigateur ne supporte pas l'élément vidéo.
                            </video>
                            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1" onclick="deleteFile('{{ $ad->videos[0] }}', this)">Supprimer</button>
                        </div>
                    @else
                        <div class="col-md-6">
                            <p class="text-muted">Aucune vidéo existante.</p>
                        </div>
                    @endif
                </div>
                
                <div class="row mb-3">
                    <p class="form-label fw-bold">Ajouter une nouvelle vidéo (1 seule)</p>
                    <div class="col-md-6 mb-3">
                        <input class="form-control" type="file" id="videos" name="videos[]">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <p class="form-label fw-bold">Documents existants</p>
                    @if ($ad->documents)
                        <div class="col-md-12">
                            @foreach ($ad->documents as $document)
                            <a href="{{ Storage::url($document) }}" class="btn btn-outline-secondary mb-2 me-2" target="_blank">
                                <i class="ti ti-file-text"></i> Document
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteFile('{{ $document }}', this)">Supprimer</button>
                            @endforeach
                        </div>
                    @endif
                </div>
                
                <div class="row mb-3">
                    <p class="form-label fw-bold">Ajouter de nouveaux documents (3 max)</p>
                    @for ($i = 0; $i < 3; $i++)
                        <div class="col-md-4 mb-3">
                            <label for="documents_{{ $i }}" class="form-label">Document {{ $i + 1 }}</label>
                            <input class="form-control" type="file" id="documents_{{ $i }}" name="documents[]">
                        </div>
                    @endfor
                </div>

                <hr class="my-4">
                <h6 class="mb-3">Informations de contact</h6>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="whatsapp_link" class="form-label">Lien WhatsApp</label>
                        <input type="text" class="form-control" id="whatsapp_link" name="whatsapp_link" value="{{ old('whatsapp_link', $ad->whatsapp_link) }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone_number" class="form-label">Numéro de téléphone</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $ad->phone_number) }}">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary mt-3">Mettre à jour l'annonce</button>
            </form>
        </div>
    </div>
</div>

<script>
function deleteFile(filePath, element) {
    if (confirm('Voulez-vous vraiment supprimer ce fichier ?')) {
        // Envoi d'une requête AJAX pour supprimer le fichier
        fetch('/ads/{{ $ad->id }}/delete-file', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ filePath: filePath })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Supprime l'élément du DOM si la suppression est réussie
                element.parentNode.remove();
            } else {
                alert('Erreur lors de la suppression du fichier.');
            }
        });
    }
}
</script>
@endsection