@extends('layouts.users.master')

@section('content')
<div class="container-fluid">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Liste des rendez-vous</h5>
            @forelse($ads as $ad)
                @if ($ad->appointments->isNotEmpty())
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h6 class="fw-semibold mb-0">Annonce : <a href="{{ route('users.ads.show', $ad->id) }}" class="text-white">{{ $ad->title }}</a></h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($ad->appointments as $appointment)
                                <div class="col-lg-6 mb-4">
                                    <div class="card h-100 border-start border-secondary border-4">
                                        <div class="card-body">
                                            <p class="mb-1"><strong>Visiteur :</strong> {{ $appointment->visitor_name }}</p>
                                            <p class="mb-1"><strong>Date & Heure :</strong> {{ \Carbon\Carbon::parse($appointment->appointment_datetime)->format('d/m/Y H:i') }}</p>
                                            <p class="mb-1"><strong>Email :</strong> {{ $appointment->visitor_email }}</p>
                                            <p class="mb-0"><strong>Téléphone :</strong> {{ $appointment->visitor_phone }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="alert alert-info" role="alert">
                    Vous n'avez pas encore de rendez-vous programmé pour vos annonces.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection