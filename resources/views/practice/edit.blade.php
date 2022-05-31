<x-app-layout>
    <x-slot name="header">
        <div class="flex align-middle justify-between">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @if(Request::is('*practice/create*'))
                    Create Practice
                @else
                    Edit Practice: {{ $practice->name }}
                @endif
            </h2>

            @if(Request::is('*practice/*/edit*'))
                <div>
                    <x-button class="bg-red-700">
                        <a href="{{ route('practice.delete', ['practice' => $practice->id]) }}"> {{ __('Delete') }} </a>
                    </x-button>
                </div>
            @endif


        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>
            @if(Request::is('*practice/create*'))
                <form method="POST" action="{{ route('practice.store') }}"
            @else
                <form method="POST" action="{{ route('practice.update', ['practice' => $practice->id]) }}"
                      @endif
                      enctype="multipart/form-data">
                    @csrf
                    <div
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between align-middle py-6">


                        <div class="p-6 bg-white border-b border-gray-200 w-6/12">


                            <div>
                                <x-label for="name" :value="__('Name')"/>

                                <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                         :value="$practice->name ?? null" required autofocus/>
                            </div>

                            <div class="pt-5">
                                <x-label for="email" :value="__('Email')"/>

                                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                         :value="$practice->email ?? null" autofocus/>
                            </div>

                            <div class="pt-5">
                                <x-label for="website" :value="__('Website')"/>

                                <x-input id="website" class="block mt-1 w-full" type="text" name="website"
                                         :value="$practice->website_url ?? null" autofocus/>
                            </div>
                        </div>
                        <div class="logo rounded-full mr-5">
                            @if(!Request::is('*practice/create*'))
                                <img class="rounded-full w-48 h-48" src="{{ $practice->image }} ">
                            @endif
                            <div class="pt-5">
                                <x-label for="logo" :value="__('Logo')"/>
                                <x-input id="logo" class="block mt-1 w-full" type="file" name="logo" autofocus/>
                            </div>
                        </div>

                    </div>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="text-gray-900 font-bold text-xl mb-2">Practice Tags <small
                                    style="float:right"><a
                                        href="{{route('fields.index')}}">Manage
                                        Tags</a></small></div>
                            <div class="grid gap-4 grid-cols-3 mt-6">
                                @foreach($fields as $field)
                                    <div class="inline-flex">
                                        @if(!Request::is('*practice/create*'))
                                            <x-input name="field_of_practice[]" :id="$field->tag" type="checkbox"
                                                     :value="$field->id"
                                                     :checked="$practice->fields->pluck('id')->contains($field->id)"
                                            />
                                        @else
                                            <x-input name="field_of_practice[]" :id="$field->tag" type="checkbox"
                                                     :value="$field->id"
                                            />
                                        @endif

                                        <x-label class="ml-3" :for="$field->tag" :value="$field->tag"/>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <x-button class="ml-3 bg-blue-700">
                            {{ __('Save') }}
                        </x-button>
                    </div>

                </form>

        </div>
    </div>

    @if(!Request::is('*practice/create*'))
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="inline-flex justify-between w-full">
                            <div class="text-gray-900 font-bold text-xl mb-2">Employees</div>
                            <x-button class="ml-3 bg-blue-700 float-right">
                                <a href="{{route("employees.create")}}" target="_blank">{{ __('Create employee') }}</a>
                            </x-button>
                        </div>

                        <div class="grid gap-4 grid-cols-3 mt-6">
                            @foreach($employees as $employee)
                                <a href="{{route("employees.edit", ["employee" => $employee->id])}}" target="_blank">
                                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                        <div class="px-6 py-4">
                                            <div
                                                class="font-bold text-xl mb-2">{{ $employee->first_name }} {{ $employee->last_name }}</div>
                                            <p class="text-gray-700 text-base">Email: {{ $employee->email ?? '-' }}</p>
                                            <p class="text-gray-700 text-base">Phone: {{ $employee->phone ?? '-' }}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div class="mt-8">
                            {{ $employees->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</x-app-layout>
