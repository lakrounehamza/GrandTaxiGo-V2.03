<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Reservation;
use App\Models\Trajet;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trajets = Trajet::all();
        return  view('passager.home',['trajets'=>$trajets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('passager.ajouteReservation');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valide = $request->validate([
            
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function accepte(string  $id){
        $reservation =  Reservation::find($id);
        if($reservation)
        $reservation->update(['statut'=>"confirmee"]);
        $query = Reservation::where('reservations.id', '=', $id)
        ->join('trajets', 'trajets.id', '=', 'reservations.id_trajet')
        ->select('trajets.id_chauffeur')
        ->first();

        
            return redirect('dashboard/users/detail/'.$query->id_chauffeur);        

    }
    public function  annule(string $id){
        $reservation =  Reservation::find($id);
        if($reservation)
        $reservation->update(['statut'=>"annule"]);
        $query = Reservation::where('reservations.id', '=', $id)
        ->join('trajets', 'trajets.id', '=', 'reservations.id_trajet')
        ->select('trajets.id_chauffeur')
        ->first();
            return redirect('dashboard/users/detail/'.$query->id_chauffeur);
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
        //
    }
}
