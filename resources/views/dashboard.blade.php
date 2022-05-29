<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-gray-900 font-bold text-xl mb-2">Practice list</div>
                    <div class="grid gap-4 grid-cols-3 mt-6">
                        @foreach($practices as $practice)
                            <div class="max-w-sm rounded overflow-hidden shadow-lg">
                                <a href="{{ route('practice.show', ["practice" => $practice->id]) }}">
                                    <img class="w-full h-48" src="{{ $practice->image }}" alt="Logo">
                                </a>
                                <div class="px-6 py-4">
                                    <a href="{{ route('practice.show', ["practice" => $practice->id]) }}">
                                        <div class="font-bold text-xl mb-2">{{$practice->name}}</div>
                                    </a>
                                    <p class="text-gray-700 text-base">Email: {{ $practice->email ?? null }}</p>
                                    @if ($practice->website_url)
                                        <p class="text-gray-700 text-base py-2"><a href="{{$practice->website_url}}"
                                                                                   target="_blank">{{$practice->website_url}}</a>
                                        </p>
                                    @endif
                                    <p class="text-gray-700 text-base"># of
                                        Employees: {{ $practice->employees_count }}</p>
                                </div>
                                <div class="px-6 pt-4 pb-2">
                                    @foreach($practice->fields as $field)
                                        <span
                                            class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{$field->tag}}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
