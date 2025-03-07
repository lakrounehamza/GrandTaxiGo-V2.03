<script src="https://cdn.tailwindcss.com"></script>
@extends('layouts.navPassager')

@section('content')
<div class="bg-gray-100">
    <div class="container mx-auto py-12">
        <div class="max-w-lg mx-auto px-4">
            <h2 class="text-3xl font-semibold text-gray-900 mb-4">
                Reserve une ground taxi
            </h2>
            <p class="text-gray-700 mb-8">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sagittis velit
                eget nisi lobortis dignissim.
            </p>
            <form class="bg-white rounded-lg px-6 py-8 shadow-md">
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="depart">Depart</label>
                    <input
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="depart" type="text" placeholder="Enter your depart">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="arrive">arrive</label>
                    <input
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="arrive" type="text" placeholder="Enter your arrive">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="date_reservation">date_reservation</label>
                    <input
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="date_reservation" type="date" >
                </div>
                <div class="flex justify-end">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="button">
                        reserve
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection