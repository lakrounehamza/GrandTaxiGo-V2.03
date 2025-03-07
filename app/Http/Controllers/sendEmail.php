<?php
namespace App\Http\Controllers;


use App\Mail\UserInfoQRMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;



class sendEmail extends Controller
{
    public function sendEmail()
    {
        // R´ecup´erer l’utilisateur (exemple)
        $user = User::find(1); // Remplacez par l’utilisateur r´eel
        // Envoyer l’email
        Mail::to($user->email)->send(new UserInfoQRMail($user));
    }
}
