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
                Edit Facility: {{ $facility->business_name }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <!-- Validation Errors -->
                        @if ($errors->any())
                            <div class="mb-4">
                                <ul class="list-disc list-inside text-sm text-red-600">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('facilities.update', $facility->id) }}">
                            @csrf
                            @method('PUT') <!-- IMPORTANT: Yeh line zaroori hai -->

                            <!-- Business Name -->
                            <div>
                                <label for="business_name" class="block font-medium text-sm text-gray-700">Business
                                    Name</label>
                                <input id="business_name"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    type="text" name="business_name"
                                    value="{{ old('business_name', $facility->business_name) }}" required autofocus />
                            </div>

                            <!-- Street Address -->
                            <div class="mt-4">
                                <label for="street_address" class="block font-medium text-sm text-gray-700">Street
                                    Address</label>
                                <input id="street_address"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    type="text" name="street_address"
                                    value="{{ old('street_address', $facility->street_address) }}" required />
                            </div>

                            <!-- Last Update Date -->
                            <div class="mt-4">
                                <label for="last_update_date" class="block font-medium text-sm text-gray-700">Last
                                    Update Date</label>
                                <input id="last_update_date"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    type="date" name="last_update_date"
                                    value="{{ old('last_update_date', $facility->last_update_date) }}" required />
                            </div>

                            <!-- Materials (Checkboxes) -->
                            <div class="mt-4">
                                <label class="block font-medium text-sm text-gray-700">Recyclable Materials</label>
                                <div class="mt-2 grid grid-cols-2 md:grid-cols-4 gap-4">
                                    @foreach ($materials as $material)
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="materials[]" value="{{ $material->id }}"
                                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50"
                                                @if (in_array($material->id, $facility->materials->pluck('id')->toArray())) checked @endif>
                                            <span class="ml-2 text-sm text-gray-600">{{ $material->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <a href="{{ route('facilities.index') }}"
                                    class="text-sm text-gray-600 hover:text-gray-900 mr-4">Cancel</a>
                                <button type="submit"
                                    class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Update Facility
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
