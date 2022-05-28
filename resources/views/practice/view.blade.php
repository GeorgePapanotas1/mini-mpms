<x-app-layout>
    <x-slot name="header">
        <div class="flex align-middle justify-between">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $practice->name }}
            </h2>

            <div>
                <x-button>
                    <a href="{{ route('practice.edit', ['practice' => $practice->id]) }}"> {{ __('Edit') }} </a>
                </x-button>

                <x-button class="bg-red-600">
                    <a href="{{ route('practice.delete', ['practice' => $practice->id]) }}"> {{ __('Delete') }} </a>
                </x-button>
            </div>

        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between align-middle py-6">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-gray-900 font-bold text-xl mb-2">Basic info</div>
                    <div class="text-gray-500 font-bold text-m mb-2">Email: {{ $practice->email ?? '-'}}</div>
                    <div class="text-gray-500 font-bold text-m mb-2">Website: {{ $practice->website_url ?? '-' }}</div>
                    <div class="pt-4 pb-2">
                        @foreach($practice->fields as $field)
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$field->tag}}</span>
                        @endforeach
                    </div>
                </div>
                <div class="logo rounded-full mr-5">
                    <img class="rounded-full w-48 h-48" src="{{ $practice->image ? asset("storage/$practice->image") : asset("storage/image.png")}} ">
                </div>
            </div>
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-gray-900 font-bold text-xl mb-2">Employees</div>
                    <div class="grid gap-4 grid-cols-3 mt-6">
                        @foreach($practice->employees as $employee)
                            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl mb-2">{{ $employee->first_name }} {{ $employee->last_name }}</div>
                                    <p class="text-gray-700 text-base">Email: {{ $employee->email ?? '-' }}</p>
                                    <p class="text-gray-700 text-base">Phone: {{ $employee->phone ?? '-' }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
