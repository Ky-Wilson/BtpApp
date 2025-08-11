@extends('layouts.plateforme.master')
@section('content')
<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
            <div class="row g-4">
                <div class="col-12">
                    <div class="text-center mx-auto" style="max-width: 700px;">
                        <h1 class="text-primary">Contactez-nous</h1>
                        <p class="mb-4">N'hésitez pas à nous contacter pour toute question, demande d'information ou pour discuter de votre projet immobilier. Notre équipe d'experts est là pour vous accompagner.</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="h-100 rounded">
                        <iframe class="rounded w-100"
                            style="height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3106.650893116035!2d-4.008272984646738!3d5.333036496225573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1d2d3e1d6c8b9%3A0x6b1c2b5b3e21b27!2sAbidjan%2C%20C%C3%B4te%20d'Ivoire!5e0!3m2!1sfr!2s!4v1625055047463!5m2!1sfr!2s"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-7">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Votre nom" name="name" value="{{ old('name') }}">
                        <input type="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Votre email" name="email" value="{{ old('email') }}">
                        <textarea class="w-100 form-control border-0 mb-4" rows="5" cols="10" placeholder="Votre message" name="message">{{ old('message') }}</textarea>
                        <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary" type="submit">Envoyer</button>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Adresse</h4>
                            <p class="mb-2">Abidjan, Côte d'Ivoire</p>
                        </div>
                    </div>
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Envoyez-nous un mail</h4>
                            <p class="mb-2">info@exemple.com</p>
                        </div>
                    </div>
                    <div class="d-flex p-4 rounded bg-white">
                        <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Téléphone</h4>
                            <p class="mb-2">+225 01 23 45 67 89</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection