@extends('layouts.plateforme.master')

@section('content')
<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-4">Donnez votre avis</h1>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{ route('ratings.store') }}" method="POST">
            @csrf
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label my-3">Entreprise<sup>*</sup></label>
                            <select class="form-select" id="company_select" name="user_id" required>
                                <option value="" selected disabled>Sélectionnez une entreprise</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-3" id="ad-selection" style="display: none;">
                            <label class="form-label my-3">Annonce<sup>*</sup></label>
                            <select class="form-select" id="ad_select" name="ad_id" required>
                                <option value="" selected disabled>Sélectionnez une annonce</option>
                            </select>
                        </div>
                    </div>
                    
                    <hr class="my-4">

                    <h4 class="mb-3">Vos informations</h4>
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Votre nom<sup>*</sup></label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Votre e-mail</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Votre contact</label>
                        <input type="text" class="form-control" name="contact">
                    </div>
                </div>

                <div class="col-md-12 col-lg-6 col-xl-5">
                    <div class="bg-light rounded p-4">
                        <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                            <h4 class="mb-3">Votre note<sup>*</sup></h4>
                            <div class="rating-stars" data-rating="0">
                                <i class="far fa-star text-warning" data-score="1"></i>
                                <i class="far fa-star text-warning" data-score="2"></i>
                                <i class="far fa-star text-warning" data-score="3"></i>
                                <i class="far fa-star text-warning" data-score="4"></i>
                                <i class="far fa-star text-warning" data-score="5"></i>
                            </div>
                            <input type="hidden" name="score" id="score-input" value="0" required>
                        </div>
                        <hr class="my-4">
                        <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                            <h4 class="mb-3">Votre avis<sup>*</sup></h4>
                            <div class="form-item">
                                <textarea name="comment" class="form-control" spellcheck="false" cols="30" rows="10" placeholder="Laissez votre commentaire..." required></textarea>
                            </div>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                            <button type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Envoyer l'avis</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const companySelect = document.getElementById('company_select');
        const adSelect = document.getElementById('ad_select');
        const adSelectionDiv = document.getElementById('ad-selection');
        const scoreInput = document.getElementById('score-input');
        const starIcons = document.querySelectorAll('.rating-stars i');

        companySelect.addEventListener('change', function() {
            const userId = this.value;
            if (userId) {
                fetch(`/api/entreprises/${userId}/annonces`)
                    .then(response => response.json())
                    .then(ads => {
                        adSelect.innerHTML = '<option value="" selected disabled>Sélectionnez une annonce</option>';
                        ads.forEach(ad => {
                            const option = document.createElement('option');
                            option.value = ad.id;
                            option.textContent = ad.title;
                            adSelect.appendChild(option);
                        });
                        adSelectionDiv.style.display = 'block';
                    });
            } else {
                adSelectionDiv.style.display = 'none';
            }
        });

        starIcons.forEach(star => {
            star.addEventListener('click', function() {
                const score = this.getAttribute('data-score');
                scoreInput.value = score;
                
                starIcons.forEach(s => {
                    if (s.getAttribute('data-score') <= score) {
                        s.classList.remove('far');
                        s.classList.add('fas');
                    } else {
                        s.classList.remove('fas');
                        s.classList.add('far');
                    }
                });
            });
        });
    });
</script>
@endsection