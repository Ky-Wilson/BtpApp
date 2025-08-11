<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Notifications\NewUserRegisteredNotification;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $this->create($request->all());

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath())->with('status', 'Votre compte a été créé. Veuillez attendre la validation de l\'administrateur.');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'coordonnees' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);
    }

    protected function create(array $data)
    {
        $logoPath = null;
        if (isset($data['logo'])) {
            $logoPath = $data['logo']->store('logos', 'public');
        }

        // Crée l'utilisateur et le stocke dans une variable
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'visiteur',
            'is_active' => false,
            'logo' => $logoPath,
            'coordonnees' => $data['coordonnees'] ?? null,
            'description' => $data['description'] ?? null,
        ]);

        // Récupérer l'administrateur
        $admin = User::where('role', 'admin')->first();

        // Si un administrateur est trouvé, on lui envoie la notification
        if ($admin) {
            $admin->notify(new NewUserRegisteredNotification($user));
        }
        
        // Retourne l'objet User créé
        return $user;
    }
}