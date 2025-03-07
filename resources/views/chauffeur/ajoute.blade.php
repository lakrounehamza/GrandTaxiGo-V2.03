<script src="https://cdn.tailwindcss.com"></script>
@extends('layouts.navChauffeur')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="text-2xl py-4 px-6 bg-gray-900 text-white text-center font-bold uppercase">
       Ajoute une  trajet
    </div><form class="py-4 px-6" action="{{ route('chauffeur.store') }}" method="POST">
    @csrf
    <input type="hidden" name="id_chauffeur" value="{{ $id }}" />
    <input type="hidden" name="statut" value="en attente" />

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="depart">
            Départ
        </label>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="depart" name="depart" type="text" placeholder="Entrez votre départ"
            value="{{ old('depart') }}" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="arrive">
            Arrivée
        </label>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="arrive" name="arrive" type="text" placeholder="Entrez votre arrivée"
            value="{{ old('arrive') }}" required>
    </div>

    <div class="flex items-center justify-center mb-4">
        <button
            class="bg-gray-900 text-white py-2 px-4 rounded hover:bg-gray-800 focus:outline-none focus:shadow-outline"
            type="submit">
            Enregistrer
        </button>
    </div>
</form>
>
</div>
@endsection