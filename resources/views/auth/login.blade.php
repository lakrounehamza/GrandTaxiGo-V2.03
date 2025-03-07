@php
    use App\Enums\Provider;
@endphp
<script src="https://cdn.tailwindcss.com"></script>
<div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
    <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
        <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
            <div class="mt-12 flex flex-col items-center">
                <h1 class="text-2xl xl:text-3xl font-extrabold">
                    {{ __('Log in') }}
                </h1>
                <div class="w-full flex-1 mt-8">
                    <div class="flex flex-col items-center">
                        @foreach(Provider::values() as $provider)
                            <a href="{{ route('oauth.redirect', ['provider' => $provider]) }}"
                               class="w-full max-w-xs font-bold shadow-sm rounded-lg py-3 bg-indigo-100 text-gray-800 flex items-center justify-center transition-all duration-300 ease-in-out focus:outline-none hover:shadow focus:shadow-sm focus:shadow-outline mt-5">
                                <div class="bg-white p-2 rounded-full">
                                    <img src="/images/{{ strtolower($provider) }}.svg" class="w-6" alt="{{ $provider }}">
                                </div>
                                <span class="ml-4">
                                    {{ __('Log in with') }} {{ ucfirst($provider) }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                    <div class="my-12 border-b text-center">
                        <div class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                            {{ __('Or log in with email') }}
                        </div>
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="mx-auto max-w-xs">
                        @csrf
                        <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                               type="email" name="email" placeholder="{{ __('Email') }}" required autofocus />
                        <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                               type="password" name="password" placeholder="{{ __('Password') }}" required />
                        <div class="block mt-4">
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                        <button class="mt-5 tracking-wide font-semibold bg-indigo-500 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                            <span class="ml-3">
                                {{ __('Log in') }}
                            </span>
                        </button>
                        @if (Route::has('password.request'))
                            <p class="mt-6 text-xs text-gray-600 text-center">
                                <a href="{{ route('password.request') }}" class="border-b border-gray-500 border-dotted">
                                    {{ __('Forgot your password?') }}
                                </a>
                            </p>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="flex-1 bg-indigo-100 text-center hidden lg:flex">
            <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
                 style="background-image: url('https://storage.googleapis.com/devitary-image-host.appspot.com/15848031292911696601-undraw_designer_life_w96d.svg');">
            </div>
        </div>
    </div>
</div>
