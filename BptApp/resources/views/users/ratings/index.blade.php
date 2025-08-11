@extends('layouts.users.master')

@section('content')
<div class="container py-5">
    <div class="row">
        @forelse($ads as $ad)
        <div class="col-sm-6 col-xl-3 mb-4 d-flex">
            <div class="card overflow-hidden rounded-2 w-100">
                <div class="position-relative">
                    <a href="{{ route('users.ads.show', $ad->id) }}">
                        <img src="{{ !empty($ad->images) ? Storage::url($ad->images[0]) : asset('assets/images/products/placeholder.jpg') }}" 
                             class="card-img-top rounded-0" 
                             alt="{{ $ad->title }}"
                             style="object-fit: cover; height: 200px;">
                    </a>
                    <a href="{{ route('users.ads.ratings', ['adId' => $ad->id]) }}" class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute top-0 end-0 mt-3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Voir les notes">
                        <i class="ti ti-eye fs-4"></i>
                    </a>
                </div>
                <div class="card-body pt-3 p-4 d-flex flex-column">
                    <h6 class="fw-semibold fs-4">{{ $ad->title }}</h6>
                    <div class="d-flex align-items-center justify-content-between mt-auto">
                        <p class="fw-semibold fs-4 mb-0">{{ $ad->price }}</p>
                        <ul class="list-unstyled d-flex align-items-center mb-0">
                            @php
                                $averageRating = round($ad->ratings->avg('score'));
                                $emptyStars = 5 - $averageRating;
                            @endphp
                            @for ($i = 0; $i < $averageRating; $i++)
                                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                            @endfor
                            @for ($i = 0; $i < $emptyStars; $i++)
                                <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-muted"></i></a></li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info">
                Aucune annonce avec des notes n'a été trouvée.
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection