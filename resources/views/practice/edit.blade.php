<x-app-layout>
    <x-slot name="header">
        <div class="flex align-middle justify-between">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Practice: {{ $practice->name }}
            </h2>

            <div>
                <x-button class="bg-red-600">
                    <a href="{{ route('practice.delete', ['practice' => $practice->id]) }}"> {{ __('Delete') }} </a>
                </x-button>
            </div>

        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('practice.update', ['practice' => $practice->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between align-middle py-6">


                    <div class="p-6 bg-white border-b border-gray-200 w-6/12">


                        <div>
                            <x-label for="name" :value="__('Name')"/>

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                     :value="$practice->name" required autofocus/>
                        </div>

                        <div class="pt-5">
                            <x-label for="email" :value="__('Email')"/>

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                     :value="$practice->email" autofocus/>
                        </div>

                        <div class="pt-5">
                            <x-label for="website" :value="__('Website')"/>

                            <x-input id="website" class="block mt-1 w-full" type="text" name="website"
                                     :value="$practice->website_url" autofocus/>
                        </div>
                    </div>
                    <div class="logo rounded-full mr-5">
                        <img class="rounded-full w-48 h-48" src="{{ $practice->image ? asset("storage/$practice->image") : asset("storage/image.png")}} ">
                        <div class="pt-5">
                            <x-label for="logo" :value="__('Logo')"/>
                            <x-input id="logo" class="block mt-1 w-full" type="file" name="logo" autofocus/>
                        </div>
                    </div>

                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-button class="ml-3 blue-500">
                        {{ __('Save') }}
                    </x-button>
                </div>

            </form>

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
                                    <div
                                        class="font-bold text-xl mb-2">{{ $employee->first_name }} {{ $employee->last_name }}</div>
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
