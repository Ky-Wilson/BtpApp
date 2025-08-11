@extends('layouts.users.master')

@section('content')
<div class="container py-5">
    <h1>Notes pour l'annonce : {{ $ad->title }}</h1>
    
    @if($ad->ratings->isEmpty())
        <div class="alert alert-info">
            Aucune note n'a encore été soumise pour cette annonce.
        </div>
    @else
        <ul class="list-group">
            @foreach($ad->ratings as $rating)
            <li class="list-group-item mb-3">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Note de : {{ $rating->name }}</h5>
                    <small class="text-muted">Soumis le : {{ $rating->created_at->format('d/m/Y') }}</small>
                </div>
                <p class="mb-1"><strong>Note :</strong> {{ $rating->score }} / 5</p>
                <p class="mb-1"><strong>Commentaire :</strong> {{ $rating->comment }}</p>
                <hr>
                <small class="text-muted">
                    <strong>Email :</strong> {{ $rating->email }} <br>
                    <strong>Contact :</strong> {{ $rating->contact }}
                </small>
            </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection