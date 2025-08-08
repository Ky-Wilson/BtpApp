<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Redirection des utilisateurs après la connexion.
     *
     * @return string
     */
    protected function redirectTo()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return route('admin.dashboard');
        }
        
        if ($user->role === 'entreprise') {
            return route('users.dashboard');
        }
        
        return '/home';
    }

    /**
     * Crée une nouvelle instance de contrôleur.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Valide la requête de connexion de l'utilisateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        // On applique la validation par défaut de Laravel
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
        
        // On récupère l'utilisateur pour vérifier son statut et son rôle
        $user = User::where($this->username(), $request->{$this->username()})->first();

        if ($user) {
            if (!$user->is_active) {
                throw ValidationException::withMessages([
                    $this->username() => ['Votre compte n\'est pas encore actif. Veuillez patienter pour la validation de l\'administrateur.'],
                ]);
            }

            if ($user->role === 'visiteur') {
                throw ValidationException::withMessages([
                    $this->username() => ['Le rôle de visiteur n\'est pas autorisé à se connecter.'],
                ]);
            }
        }
    }
}