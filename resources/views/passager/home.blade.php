<script src="https://cdn.tailwindcss.com"></script>
<div class="bg-gray-100 py-12">
  <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-wrap -mx-4">
        @foreach($trajets as $trajet)
      <!-- Pricing Table 1 -->
      <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <h2 class="text-2xl font-semibold text-gray-800">Basic Plan</h2>
          <div class="mt-4">
            <span class="text-5xl font-bold text-gray-900">$19</span>
            <span class="text-gray-600">/month</span>
          </div>
          <ul class="mt-6 space-y-2">
            <li class="flex items-center">
              <svg class="h-6 w-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
              Depart : {{$trajet->depart}}
            </li>
            <li class="flex items-center">
              <svg class="h-6 w-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
              Arrive : {{$trajet->arrive}}
            </li>
            <li class="flex items-center">
              <svg class="h-6 w-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
              Disponibilité :  @if($trajet->statut == 'annule') non disponible @else disponible @endif
            </li>
          </ul>
          <div class="mt-8">
            <a href="#" class="block w-full bg-indigo-500 hover:bg-indigo-400 text-white font-semibold text-center py-2 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">Get Started</a>
          </div>
        </div>
      </div>
      <!-- end Pricing Table 1 -->
        @endforeach

    </div>
  </div>
</div>
