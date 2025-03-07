<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Afficher la page de connexion.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Gérer l'authentification de l'utilisateur.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate(); 
        $request->session()->regenerate();  
         $user = Auth::user();
        return match ($user->role) {
            'admin' => redirect()->route('listeTrajet'),
            'chauffeur' => redirect()->route('chauffeur.reservations'),
            'passager' => redirect()->route('passager.index'),
            default => redirect()->route('/'),
        };
    }

    /**
     * Déconnecter l'utilisateur.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
