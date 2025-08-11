<?php

namespace App\Http\Controllers\Users;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsAppointmentController extends Controller
{
    //
    /**
     * Affiche les demandes de rendez-vous pour les annonces de l'utilisateur.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $ads = $user->ads()->with('appointments')->get();

        return view('users.appointments.index', compact('ads'));
    }
}
