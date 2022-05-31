<x-app-layout>
    <x-slot name="header">
        <div class="flex align-middle justify-between">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @if(Request::is('*employee/create*'))
                    Create Employee
                @else
                    Edit {{$employee->first_name}} {{$employee->last_name}}
                @endif
            </h2>

            @if(Request::is('*employee/*/edit*'))
                <div>
                    <x-button class="bg-red-700">
                        <a href="{{ route('employees.destroy', ['employee' => $employee->id]) }}"> {{ __('Delete') }} </a>
                    </x-button>
                </div>
            @endif

        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>
            @if(Request::is('*employee/create*'))
                <form method="POST" action="{{ route('employees.store') }}"
            @else
                <form method="POST" action="{{ route('employees.update', ["employee"=>$employee]) }}"

                  @endif
                      enctype="multipart/form-data">
                    @csrf
                    <div
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between align-middle py-6">


                        <div class="p-6 bg-white border-b border-gray-200 w-6/12">


                            <div>
                                <x-label for="fname" :value="__('First Name')"/>

                                <x-input id="fname" class="block mt-1 w-full" type="text" name="fname"
                                         :value="$employee->first_name ?? null" required autofocus/>
                            </div>

                            <div class="pt-5">
                                <x-label for="lname" :value="__('Last Name')"/>

                                <x-input id="lname" class="block mt-1 w-full" type="text" name="lname"
                                         :value="$employee->last_name ?? null" required autofocus/>
                            </div>

                            <div class="pt-5">
                                <x-label for="email" :value="__('Email')"/>

                                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                         :value="$employee->email ?? null" autofocus/>
                            </div>

                            <div class="pt-5">
                                <x-label for="phone" :value="__('Phone')"/>

                                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                         :value="$employee->phone ?? null" autofocus/>
                            </div>

                            <div class="pt-5">
                                <x-label for="practice_id" :value="__('Practice')"/>
                                <select name="practice_id" id="practice_id" class="w-full">
                                    <option> Select Practice</option>
                                    @foreach($practices as $practice)
                                        <option value="{{$practice->id}}"
                                                @if (isset($employee) && $employee->practice_id === $practice->id ) selected @endif>{{$practice->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <x-button class="ml-3 bg-blue-600">
                            {{ __('Save') }}
                        </x-button>
                    </div>

                </form>

        </div>
    </div>
</x-app-layout>
