<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coment;
class comentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $comments = Coment::select('coments.content', 'users.name', 'trajets.depart', 'trajets.destination')
        ->join('users', 'users.id', '=', 'coments.user_id')
        ->join('trajets', 'trajets.id', '=', 'coments.trajet_id')
        ->where('coments.trajet_id',$id)
        ->get();
    
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
