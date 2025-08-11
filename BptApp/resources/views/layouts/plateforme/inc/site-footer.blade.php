<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
    <div class="container py-5">
        <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5);">
            <div class="row g-4">
                <div class="col-lg-3">
                    <a href="{{-- {{ route('home') }} --}}">
                        <h1 class="text-primary mb-0">GestImmo</h1>
                        <p class="text-secondary mb-0">Votre partenaire immobilier</p>
                    </a>
                </div>
                
                <div class="col-lg-3">
                    <div class="d-flex justify-content-end pt-3">
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="text-light mb-3">À propos de nous</h4>
                    <p class="mb-4">GestImmo est votre plateforme dédiée pour trouver, vendre ou louer des biens immobiliers. Nous connectons acheteurs, vendeurs et locataires de manière simple et efficace.</p>
                    <a href="#" class="btn border-secondary py-2 px-4 rounded-pill text-primary">En savoir plus</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column text-start footer-item">
                    <h4 class="text-light mb-3">Liens rapides</h4>
                    <a class="btn-link" href="{{ route('maisons.index') }}">Maisons</a>
                    <a class="btn-link" href="{{ route('appartements.index') }}">Appartements</a>
                    <a class="btn-link" href="{{ route('immeubles.index') }}">Immeubles</a>
                    <a class="btn-link" href="{{ route('bureaux.index') }}">Bureaux</a>
                    <a class="btn-link" href="{{ route('terrains.index') }}">Terrains</a>
                    <a class="btn-link" href="#">Besoin d'assistance</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="d-flex flex-column text-start footer-item">
                    <h4 class="text-light mb-3">Mon compte</h4>
                    <a class="btn-link" href="{{ route('login') }}">Mon compte</a>
                    <a class="btn-link" href="{{ route('login') }}">Mes annonces</a>
                    <a class="btn-link" href="#">Politique de confidentialité</a>
                    <a class="btn-link" href="#">Conditions d'utilisation</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-item">
                    <h4 class="text-light mb-3">Contact</h4>
                    <p>Adresse: 123 Street, New York</p>
                    <p>Email: Email@Example.com</p>
                    <p>Téléphone: +0123 4567 8910</p>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid copyright bg-dark py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>GestImmo</a>, Tous droits réservés.</span>
            </div>
            <div class="col-md-6 my-auto text-center text-md-end text-white">
                Créé par <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
            </div>
        </div>
    </div>
</div>
<a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>