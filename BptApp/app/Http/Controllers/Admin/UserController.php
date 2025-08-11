<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    /**
     * Affiche la liste des utilisateurs.
     */
    public function index()
    {
        $users = User::paginate(10); // Modifié pour paginer 2 utilisateurs par page
        return view('admin.users.index', compact('users'));
    }

    public function stats()
    {
 $users = User::withCount(['ads', 'ratings'])
                     ->withAvg('ratings', 'score')
                     ->paginate(15);

        return view('admin.users.stats', compact('users'));
    }

    /**
     * Affiche le formulaire pour créer un nouvel utilisateur.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
    /**
     * Affiche le formulaire pour modifier un utilisateur.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Met à jour un utilisateur.
     */

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|string|in:admin,entreprise,visiteur',
        'is_active' => 'nullable|boolean',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'coordonnees' => 'nullable|string|max:255',
        'description' => 'nullable|string',
    ]);
    
    $logoPath = null;
    if ($request->hasFile('logo')) {
        $logoPath = $request->file('logo')->store('logos', 'public');
    }

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
        'is_active' => $request->has('is_active'),
        'logo' => $logoPath,
        'coordonnees' => $request->coordonnees,
        'description' => $request->description,
    ]);

    return redirect()->route('admin.users.index')->with('success', 'Utilisateur créé avec succès.');
}
   /*  public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|in:admin,entreprise,visiteur',
            'is_active' => 'required|boolean',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'coordonnees' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);
        
        $logoPath = $user->logo;
        
        if ($request->hasFile('logo')) {
            if ($user->logo && Storage::disk('public')->exists($user->logo)) {
                Storage::disk('public')->delete($user->logo);
            }
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'is_active' => $request->is_active,
            'logo' => $logoPath,
            'coordonnees' => $request->coordonnees,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    } */
   public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'role' => 'required|string|in:admin,entreprise,visiteur',
        'is_active' => 'nullable|boolean',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'coordonnees' => 'nullable|string|max:255',
        'description' => 'nullable|string',
    ]);
    
    $logoPath = $user->logo;
    
    if ($request->hasFile('logo')) {
        if ($user->logo && Storage::disk('public')->exists($user->logo)) {
            Storage::disk('public')->delete($user->logo);
        }
        $logoPath = $request->file('logo')->store('logos', 'public');
    }

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'is_active' => $request->has('is_active'),
        'logo' => $logoPath,
        'coordonnees' => $request->coordonnees,
        'description' => $request->description,
    ]);

    return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour avec succès.');
}

    /**
     * Supprime un utilisateur.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}