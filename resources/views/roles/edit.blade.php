<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Role') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 overflow-hidden overflow-x-auto bg-white border-b border-gray-200">
                    <div class="min-w-full align-middle">
                        <!-- Validation Errors -->
                        <x-validation-errors class="mb-4" :errors="$errors" />

                        <form action="{{ route('roles.update', $role->id) }}" method="post">
                            @csrf
                            @method('patch')

                            <div class="mb-3">
                                <x-label for="name" :value="__('name')" />
                                <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="$role->name ?? old('name')" placeholder="name" autofocus />
                            </div>

                            <x-button type="submit">update</x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
