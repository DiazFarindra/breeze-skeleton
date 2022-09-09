<x-app-layout>
    @push('head')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 overflow-hidden overflow-x-auto bg-white border-b border-gray-200">
                    <div class="min-w-full align-middle">
                        <!-- Validation Errors -->
                        <x-validation-errors class="mb-4" :errors="$errors" />

                        <form action="{{ route('users.store') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <x-label for="name" :value="__('name')" />
                                <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" autofocus />
                            </div>
                            <div class="mb-3">
                                <x-label for="email" :value="__('email')" />
                                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" autofocus />
                            </div>
                            <div class="mb-3">
                                <x-label for="roles" :value="__('roles')" />
                                <select name="roles[]" id="select2" class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" multiple>
                                    @forelse ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @empty
                                        <option disabled>no data!</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="mb-3">
                                <x-label for="password" :value="__('password')" />
                                <x-input id="password" class="block w-full mt-1" type="password" name="password" :value="old('password')" autofocus />
                            </div>
                            <div class="mb-3">
                                <x-label for="password_confirmation" :value="__('confirm password')" />
                                <x-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" :value="old('password_confirmation')" autofocus />
                            </div>

                            <x-button type="submit">create</x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('foot')
        {{-- select2.org --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#select2').select2();
            });
        </script>
    @endpush
</x-app-layout>
