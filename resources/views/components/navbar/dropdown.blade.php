<div x-data="{ open: false }" class="relative items-center">
    <button @click="open = !open" class="text-white bg-lime-600 hover:bg-green-700 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
        Yo
        <svg class="w-2.5 h-2.5 ms-2 inline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg>
    </button>
    <div x-show="open" x-cloak class="absolute right-0 bg-green-500 text-gray-700 rounded-b-lg shadow-lg z-30 w-48 divide-y divide-gray-200 mt-1" @click.away="open = false">
        <div class="p-2">
            {{$slot}}
        </div>
    </div>
</div>
