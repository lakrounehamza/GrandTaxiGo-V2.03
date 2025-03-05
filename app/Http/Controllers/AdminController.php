<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trajet;
use  App\Models\Reservation;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }
    public function users(){
        $users = User::all(); 
        // dd($users);
        return view('admin.listeUser', ['users' => $users]);
    }
    public function trajets(){
        $trajets =  Trajet::all();
        return view('admin.listeTrajet', ['trajets' => $trajets]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function  accepter(string  $id){
        $trajet = Trajet::find($id);
        if (!$trajet) {
            return redirect()->back()->with('error', 'Trajet non trouvé.');
        }
    
        $trajet->update(['statut' => 'complet']);
    
        return redirect('dashboard/trajets');
    }
    public function  annule(string  $id){
        $trajet = Trajet::find($id);
        if (!$trajet) {
            return redirect()->back()->with('error', 'Trajet non trouvé.');
        }
    
        $trajet->update(['statut' => 'annule']);
    
        return redirect('dashboard/trajets');
    }
    public function create()
    {
        //
    }
    
    public function  banni(string $id){
        return redirect('dashboard/users');
    }
    public function detail(string $id){
        $user = User::find($id); 
        $trajets  = Trajet::where('id_chauffeur',"=",$id)->get();

        $reservations = Reservation::join('trajets', 'reservations.id_trajet', '=', 'trajets.id')
    ->join('users', 'reservations.id_passager', '=', 'users.id')
    ->where('trajets.id_chauffeur', $id)
    ->select('reservations.*', 'users.name','users.email','trajets.statut as disponibilite', 'trajets.depart', 'trajets.arrive')
    ->get();
                // dd($reservations);
        return  view('admin.detail',['user'=>$user,'trajets'=>$trajets,'reservations'=>$reservations]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trajet = Trajet::find($id);
        if (!$trajet) {
            return redirect()->back()->with('error', 'Trajet non trouvé.');
        }
        $trajet->delete();
        return redirect('dashboard/trajets');
    }
}
