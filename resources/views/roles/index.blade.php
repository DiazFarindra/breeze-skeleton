<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div>
                <form action="{{ route('roles.store') }}" method="post">
                    @csrf

                    <x-label for="create roles" class="text-xl" :value="__('create roles')" />
                    <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" placeholder="name" autofocus />

                    <x-button class="my-2" type="submit">create</x-button>
                </form>
            </div>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 overflow-hidden overflow-x-auto bg-white border-b border-gray-200">
                    <div class="min-w-full align-middle">
                        <table class="min-w-full border divide-y divide-gray-200">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 text-left bg-gray-50">
                                    <span class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">Name</span>
                                </th>
                                <th class="px-6 py-3 text-left bg-gray-50">
                                    <span class="text-xs font-medium leading-4 tracking-wider text-gray-500 uppercase">Actions</span>
                                </th>
                            </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                            @foreach($roles as $role)
                                <tr class="bg-white">
                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        {{ $role->name }}
                                    </td>

                                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                        <a class="px-2 py-1 text-white bg-blue-500 rounded" href="{{ route('roles.edit', $role->id) }}">
                                            edit
                                        </a>

                                        <form method="post" class="inline-block ml-2" action="{{ route('roles.destroy', $role->id) }}">
                                            @csrf
                                            @method('delete')

                                            <button class="px-2 py-1 text-white bg-red-500 rounded" type="submit">
                                                delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
