<script src="https://cdn.tailwindcss.com"></script>
<div class="container my-12 mx-auto px-2 md:px-4">

    <section class="mb-32">

        <div class="flex justify-center">
            <div class="text-center md:max-w-xl lg:max-w-3xl">
                <h2 class="mb-12 px-6 text-3xl font-bold">
                    Contact us
                </h2>
            </div>
        </div>

        <div class="flex flex-wrap">

            <form class="mb-12 w-full shrink-0 grow-0 basis-auto md:px-3 lg:mb-0 lg:w-5/12 lg:px-6">

                <div class="mb-3 w-full">
                    <label class="block font-medium mb-[2px] text-teal-700" htmlFor="exampleInput90">
                            Name
                    </label>
                    <input type="text" class="px-2 py-2 border w-full outline-none rounded-md" id="exampleInput90" placeholder="Name" />
                </div>

                <div class="mb-3 w-full">
                    <label class="block font-medium mb-[2px] text-teal-700" htmlFor="exampleInput90">
                            Email
                    </label>
                    <input type="email" class="px-2 py-2 border w-full outline-none rounded-md" id="exampleInput90"
                            placeholder="Enter your email address" />
                </div>

                <div class="mb-3 w-full">
                    <label class="block font-medium mb-[2px] text-teal-700" htmlFor="exampleInput90">
                            Message
                    </label>
                    <textarea class="px-2 py-2 border rounded-[5px] w-full outline-none" name="" id=""></textarea>
                </div>

                <button type="button"
                        class="mb-6 inline-block w-full rounded bg-teal-400 px-6 py-2.5 font-medium uppercase leading-normal text-white hover:shadow-md hover:bg-teal-500">
                        Send
                </button>

            </form>

            <div class="w-full shrink-0 grow-0 basis-auto lg:w-7/12">
                <div class="flex flex-wrap">
                    <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:px-6">
                        <div class="flex items-start">
                            <div class="ml-6 grow">
                                <p class="mb-2 font-bold">
                                    email
                                </p>
                                <p class="text-neutral-500 ">
                                   {{$user->email}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:px-6">
                        <div class="flex items-start">
                            <div class="ml-6 grow">
                                <p class="mb-2 font-bold ">
                                    les trajets
                                </p>
                                @foreach($trajets  as $trajet)
                                <p class="text-neutral-500 ">
                                    {{$trajet->depart}} --> {{$trajet->arrive}}
                                    @if($trajet->statut == 'disponible' )
                                    disponible
                                    @else
                                    non disponible
                                    @endif 
                                    <a href="">edit</a>
                                </p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:px-6">
                        <div class="align-start flex">
                            
                            <div class="ml-6 grow">
                                <p class="mb-2 font-bold "> name</p> 
                                <p class="text-neutral-500 ">
                                    {{$user->name}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:w-6/12 md:px-3 lg:px-6">
                        <div class="align-start flex">
                            <div class="ml-6 grow">
                                <p class="mb-2 font-bold">
                                    Bug report
                                </p>
                                <p class="text-neutral-500 ">
                                    bugs@example.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<h1>liste les reservation </h1>
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