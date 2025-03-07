<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'role' => ['required', 'in:admin,chauffeur,passager'],
            'photo' => ['required', 'file', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'], // Max 2MB
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Vérifier si un fichier a bien été téléchargé avant de stocker
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        } else {
            return back()->withErrors(['photo' => 'Le téléchargement de la photo a échoué.']);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'photo' => $photoPath,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        Auth::login($user);

        return match ($user->role) {
            'admin' => redirect()->route('listeTrajet'),
            'chauffeur' => redirect()->route('chauffeur.reservations'),
            'passager' => redirect()->route('passager.index'),
            default => redirect()->route('/'), // Redirection par défaut si aucun rôle ne correspond
        };
    }
}
