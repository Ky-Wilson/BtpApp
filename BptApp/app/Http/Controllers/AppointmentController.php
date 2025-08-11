<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    /**
     * Enregistre une nouvelle demande de rendez-vous.
     */
    public function store(Request $request)
    {
        // 1. Validation des données du formulaire
        $validatedData = $request->validate([
            'ad_id' => 'required|exists:ads,id',
            'visitor_name' => 'required|string|max:255',
            'visitor_email' => 'required|email|max:255',
            'visitor_phone' => 'required|string|max:255',
            'appointment_date' => 'required|date|after:now',
        ]);

        // 2. Création d'un nouveau rendez-vous dans la base de données
        Appointment::create($validatedData);

        // 3. Redirection avec un message de succès
        return back()->with('success', 'Votre demande de rendez-vous a été envoyée.');
    }
}