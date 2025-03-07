<script src="https://cdn.tailwindcss.com"></script>
@extends('layouts.navAdmin')

@section('content')

<div class="bg-gray-50 py-16 pt-32">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                The Blockchain-only hiring platform
            </h2>
            <p class="mt-3 text-xl text-gray-500 sm:mt-4">
                Organic, genuine conversations with higher response rates than
                LinkedIn or cold email.
            </p>
        </div>
    </div>
    <div class="mt-10 pb-1">
        <div class="relative">
            <div class="absolute inset-0 h-1/2 bg-gray-50"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-4xl mx-auto">
                    <dl class="rounded-lg bg-white shadow-lg sm:grid sm:grid-cols-3">
                        <div class="flex flex-col border-b border-gray-100 p-6 text-center sm:border-0 sm:border-r">
                            <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                les users

                            </dt>
                            <dd class="order-1 text-5xl font-extrabold text-gray-700">{{$nombreUser}}+</dd>
                        </div>
                        <div
                            class="flex flex-col border-t border-b border-gray-100 p-6 text-center sm:border-0 sm:border-l sm:border-r">
                            <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                les trajets
                            </dt>
                            <dd class="order-1 text-5xl font-extrabold text-gray-700">{{$nombreTrajet}}+</dd>
                        </div>
                        <div class="flex flex-col border-t border-gray-100 p-6 text-center sm:border-0 sm:border-l">
                            <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">
                                les reservations
                            </dt>
                            <dd class="order-1 text-5xl font-extrabold text-gray-700">{{$nombreReservation}}+</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection