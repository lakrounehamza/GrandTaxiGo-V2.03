<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | Ce contrôleur gère l'inscription des nouveaux utilisateurs ainsi que leur
    | validation et création. Par défaut, ce contrôleur utilise un trait pour
    | fournir cette fonctionnalité sans nécessiter de code supplémentaire.
    |
    */

    use RegistersUsers;

    /**
     * Où rediriger les utilisateurs après l'inscription.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Créer une nouvelle instance du contrôleur.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Obtenir un validateur pour une demande d'inscription entrante.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'photo' => ['required'], // Vérifie que la photo est une chaîne
        ]);
    }

    /**
     * Créer une nouvelle instance d'utilisateur après une inscription valide.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']), // Utilisation de Hash::make() pour plus de clarté
            'photo' => $data['photo'] ?? 'default.png', // Valeur par défaut si aucune photo n'est fournie
        ]);
    }
}
