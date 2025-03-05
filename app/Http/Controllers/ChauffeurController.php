<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Trajet;
class ChauffeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }
    public function reservations(){
        $id  = Auth::user()->id;
        $reservations = Reservation::join('trajets', 'reservations.id_trajet', '=', 'trajets.id')
        ->where('trajets.id_chauffeur', '=', $id)->join('users','users.id','=','reservations.id_passager')
        ->select('reservations.*','trajets.depart','trajets.arrive','users.name','users.email')
        ->get();
        return view('chauffeur.lesReservation',['reservations'=>$reservations]);
    }
    public function trajets(){
        $id =Auth::user()->id;
        $trajes = Trajet::where('id_chauffeur','=',$id)->get();
    
        return view('chauffeur.lesTrajets',['trajes'=>$trajes]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id = Auth::user()->id;
        return view('chauffeur.ajoute',['id'=>$id]);
    }
    public function disponible(string $id){
        $trajet   = Trajet::find($id);
        if($trajet)
            $trajet->update(['statut'=>'disponible']);
            return redirect('home/trajet');
    }
    public function annule(string $id){
        $trajet   = Trajet::find($id);
        if($trajet)
            $trajet->update(['statut' => 'annule']);
        return redirect('home/trajet');
    }

    public function accepte(string  $id){
        $reservation =  Reservation::find($id);
        if($reservation)
        $reservation->update(['statut'=>"confirmee"]);
        return redirect('home/reservation');

    }
    public function  annuleReservation(string $id){
        $reservation =  Reservation::find($id);
        if($reservation)
        $reservation->update(['statut'=>"annule"]);
            return redirect('home/reservation');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'statut' =>'required',
            'depart' => 'required|string|max:255', 
            'arrive' => 'required|string|max:255',
            'id_chauffeur' => 'required',
        ]);
        // dd($validated);
        Trajet::create($validated);
        
        return redirect('home/reservation');
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
        return redirect('home/trajet');
    }
}
