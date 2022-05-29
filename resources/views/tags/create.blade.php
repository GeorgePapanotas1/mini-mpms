<x-app-layout>
    <x-slot name="header">
        <div class="flex align-middle justify-between">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Field
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-gray-900 font-bold text-xl mb-2">New Field of Practice</div>
                    <form method="POST" action="{{route('fields.store')}}">
                        @csrf
                        <div>
                            <x-label for="name" :value="__('Field Name')"/>

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                     :value="old('name')" required autofocus/>
                        </div>
                        <div class="p-6 bg-white border-b border-gray-200">
                            <x-button class="bg-blue-500">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
