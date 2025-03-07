<script src="https://cdn.tailwindcss.com"></script>

<nav x-data="{ open: false }" class="px-5 pt-5 flex  justify-between md:justify-around items-center relative shadow pb-4  bg-gray-800 text-white">

      <img class="w-10" src="https://upload.wikimedia.org/wikipedia/en/thumb/b/bd/Reddit_Logo_Icon.svg/220px-Reddit_Logo_Icon.svg.png" alt="Logo" />

      <button @click="open = !open" class="md:hidden focus:outline-none text-white">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
      </button>

      <div class="hidden md:flex space-x-6">
         </div>

      <div class="hidden md:flex space-x-4">
        <a  href="{{ route('login') }}" class="rounded-xl p-3 bg-bluegreen hover:bg-green hover:text-bluegreen" href="/started">login</a>
        <a  href="{{ route('register') }}" class="rounded-xl p-3 border-2 border-white hover:bg-white hover:text-black" href="/talk">regester</a>
      </div>

      <div x-cloak x-show="open" x-transition class="absolute top-full left-0 w-full bg-gray-800 lg:hidden flex flex-col items-center py-5 space-y-4 ">
        <a  href="{{ route('login') }}" class="rounded-xl p-3 bg-bluegreen hover:bg-white hover:text-bluegreen" href="/started">login</a>
        <a href="{{ route('register') }}" class="rounded-xl p-3 border-2 border-white hover:bg-white hover:text-black" href="/talk">regerter</a>
      </div>
    </nav>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    

<div class="relative h-screen w-full">
    <img src="https://images.unsplash.com/photo-1494783367193-149034c05e8f" alt="Background Image" class="absolute inset-0 w-full h-full object-cover filter blur-sm">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="absolute inset-0 flex flex-col items-center justify-center">
        <h1 class="text-4xl text-white font-bold">Hello, World!</h1>
        <p class="text-xl text-white mt-4">This is a sample text</p>
    </div>
</div>