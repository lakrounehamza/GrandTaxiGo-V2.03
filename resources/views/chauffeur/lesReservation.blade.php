<script src="https://cdn.tailwindcss.com"></script>
<table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Title
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Status
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            disponibilite
            </th> 
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Actions
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($reservations as $reservation)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full" src="https://i.pravatar.cc/150?img=1" alt="">
                    </div>
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            {{$reservation->name}}
                        </div>
                        <div class="text-sm text-gray-500">
                            {{$reservation->email}}
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{$reservation->depart}} -> {{$reservation->arrive}}</div>
                <div class="text-sm text-gray-500">{{$reservation->date_reservation}}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                {{$reservation->statut}}
                </span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            @if($reservation->disponibilite=='disponible') 
            disponible
            @else
            non disponible
            @endif 
               
            </td> 
            @if($reservation->statut == "confirmee")
            <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                <a href="{{route('reservation.annule',$reservation->id)}}" class="ml-2 text-red-600 hover:text-red-900">annule</a>
            </td>
            @elseif($reservation->statut == "en attente")
            <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                <a href="{{route('resrvation.accepte',$reservation->id)}}" class="text-indigo-600 hover:text-indigo-900">accepte</a>
                <a href="{{route('reservation.annule',$reservation->id)}}" class="ml-2 text-red-600 hover:text-red-900">refuse</a>
            </td>
            @endif
        </tr>
        @endforeach

        <!-- More rows... -->

    </tbody>
</table>