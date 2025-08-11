@extends('layouts.admin.master')

@section('content')
<div class="container-fluid">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Liste des rendez-vous</h5>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Annonce</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Visiteur</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Date du rendez-vous</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Contact</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($appointments as $appointment)
                            <tr>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">
                                        <a href="{{ route('admin.ads.show', $appointment->ad->id) }}">{{ $appointment->ad->title }}</a>
                                    </h6>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $appointment->visitor_name }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $appointment->appointment_date }}</p>
                                </td>
                                <td class="border-bottom-0">
                                    <p class="mb-0 fw-normal">{{ $appointment->visitor_email }}</p>
                                    <p class="mb-0 fw-normal">{{ $appointment->visitor_phone }}</p>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Aucun rendez-vous n'est programmé.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $appointments->links() }}
            </div>
        </div>
    </div>
</div>
@endsection