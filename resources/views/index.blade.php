<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('tareas.store') }}">
            @csrf
            <textarea
                name="tarea"
                placeholder="{{ __('Insertar Tarea') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('tarea') }}</textarea>
            <x-input-error :messages="$errors->get('tarea')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Agregar Tarea') }}</x-primary-button>
        </form>
        
        @if(session()->has('message'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="bg-blue-100 border border-blue-400 text-blue-700 px-8 py-3 rounded relative m-4" role="alert">
            <span class="block sm:inline">{{ session()->get('message') }}</span>
        </div>
        @endif

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($tareas as $tarea)
                <div class="p-6 flex space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">{{ $tarea->user->name }}</span>
                                <small class="ml-2 text-sm text-gray-600">{{ $tarea->created_at->format('j M Y, g:i a') }}</small>
                                
                                @unless ($tarea->created_at->eq($tarea->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('Editado') }}</small>
                                @endunless

                            </div>

                            @if ($tarea->user->is(auth()->user()))
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('tareas.edit', $tarea)">
                                            {{ __('Editar') }}
                                        </x-dropdown-link>
                                    </x-slot>
                                </x-dropdown>
                            @endif

                        </div>
                        <p class="mt-4 text-lg text-gray-900">{{ $tarea->tarea }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>



</x-app-layout>