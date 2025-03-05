<script  src="https://cdn.tailwindcss.com"></script>
<table class="min-w-full divide-y divide-gray-200">
    <thead>
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">depart</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">arrive</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">statut</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">numbre reservation</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        
        @foreach($trajes as $trajet)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">{{$trajet->depart}}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{$trajet->arrive}}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{$trajet->statut}}</td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ">Active</span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                @if($trajet->statut == 'annule')
                <a href="{{route('chauffeur.disponible',$trajet->id)}}" class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">disponible</a>
                @else 
                <a href="{{route('chauffeur.annule',$trajet->id)}}" class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">annule</a>
                @endif
                <a href="{{route('chauffeur.destroy',$trajet->id)}}" class="ml-2 px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>