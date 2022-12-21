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

        @if(session()->has('message_delete'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="bg-red-100 border border-red-400 text-red-700 px-8 py-3 rounded relative m-4" role="alert">
            <span class="block sm:inline">{{ session()->get('message_delete') }}</span>
        </div>
        @endif

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($tareas as $tarea)
                <div class="p-6 flex space-x-2">
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="mt-4 text-lg text-gray-900 ">{{ Str::limit($tarea->tarea, 25, '...');}}</p>
                            </div>
                            @if ($tarea->user->is(auth()->user()))
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg> 
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('tareas.edit', $tarea)">
                                            {{ __('Editar') }}
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('tareas.destroy', $tarea) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('tareas.destroy', $tarea)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Borrar') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @endif

                        </div>
                        
                        
                    </div>
                </div>
            @endforeach
        </div>

    </div>



</x-app-layout>