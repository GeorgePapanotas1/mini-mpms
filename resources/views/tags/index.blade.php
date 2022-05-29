<x-app-layout>
    <x-slot name="header">
        <div class="flex align-middle justify-between">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tag Management
            </h2>
        </div>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="inline-flex justify-between w-full pb-6">
                        <div class="text-gray-900 font-bold text-xl mb-2">Tags</div>
                        <x-button class="bg-green-600">
                            <a href=" {{ route('fields.create') }}"> {{ __('Create Tag') }} </a>
                        </x-button>
                    </div>

                    <table class="table-auto w-full align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tag Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($fields as $field)
                            <tr>
                                <td class="text-center">{{$field->id}}</td>
                                <td class="text-center">{{$field->tag}}</td>
                                <td class="text-center">
                                    <x-button class="bg-orange-400">
                                        <a href="{{ route('fields.edit', $field->id) }}"> {{ __('Edit') }} </a>
                                    </x-button>
                                    <x-button class="bg-red-700">
                                        <a href="{{ route('fields.destroy', $field->id) }}"> {{ __('Delete') }} </a>
                                    </x-button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
