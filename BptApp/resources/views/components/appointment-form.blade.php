
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title">Prendre un rendez-vous pour la visite</h5>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('appointments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="ad_id" value="{{ $ad->id }}">
            <div class="mb-3">
                <label for="visitor_name" class="form-label">Votre nom</label>
                <input type="text" class="form-control" id="visitor_name" name="visitor_name" required>
            </div>
            <div class="mb-3">
                <label for="visitor_email" class="form-label">Votre email</label>
                <input type="email" class="form-control" id="visitor_email" name="visitor_email" required>
            </div>
            <div class="mb-3">
                <label for="visitor_phone" class="form-label">Votre téléphone</label>
                <input type="tel" class="form-control" id="visitor_phone" name="visitor_phone" required>
            </div>
            <div class="mb-3">
                <label for="appointment_date" class="form-label">Date et heure du rendez-vous</label>
                <input type="datetime-local" class="form-control" id="appointment_date" name="appointment_date" required>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer la demande</button>
        </form>
    </div>
</div>