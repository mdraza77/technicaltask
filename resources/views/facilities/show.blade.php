<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Facility Details
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <h3 class="text-2xl font-bold mb-2">{{ $facility->business_name }}</h3>

                        <p class="text-gray-600 mb-4">{{ $facility->street_address }}</p>

                        <p class="text-sm text-gray-500 mb-6">Last Updated:
                            {{ \Carbon\Carbon::parse($facility->last_update_date)->format('F j, Y') }}</p>

                        <div class="mb-6">
                            <h4 class="font-semibold text-lg mb-2">Accepted Materials:</h4>
                            <ul class="list-disc list-inside flex flex-wrap gap-4">
                                @forelse($facility->materials as $material)
                                    <li
                                        class="bg-gray-200 text-gray-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">
                                        {{ $material->name }}</li>
                                @empty
                                    <li>No materials listed for this facility.</li>
                                @endforelse
                            </ul>
                        </div>

                        <div>
                            <h4 class="font-semibold text-lg mb-2">Location:</h4>
                            {{-- <iframe
                                width="100%"
                                height="450"
                                style="border:0"
                                loading="lazy"
                                allowfullscreen
                                src="https://www.google.com/maps/embed/v1/place?key=YOUR_API_KEY&q={{ urlencode($facility->street_address) }}">
                             </iframe> --}}
                            <p>{{ $facility->street_address }}</p>
                        </div>
                        <div class="flex items-center justify-between mt-8 border-t pt-6">

                            <a href="{{ route('facilities.index') }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-md transition ease-in-out duration-150">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>

                                <span>Back to List</span>
                            </a>

                            <a href="{{ route('facilities.edit', $facility) }}"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd"
                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                        clip-rule="evenodd" />
                                </svg>

                                <span>Edit</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
