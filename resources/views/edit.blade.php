<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('tareas.update', $tarea) }}">
            @csrf
            @method('patch')

            <input 
            type="text"  
            name="titulo" 
            class=" mb-2 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            value="{{old('titulo', $tarea->titulo)}}"
            >

            <x-input-error :messages="$errors->get('titulo')" class="mt-2" />

            <textarea
                name="descripcion"
                placeholder="{{ __('Descripción') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('descripcion', $tarea->descripcion) }}</textarea>

            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />

            <select 
            class=" mt-2 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" 
            name="prioridad" >
                <option value="Importante" @if (old('prioridad') == "Importante") {{ 'selected' }} @endif>Importante</option>
                <option value="No tan importante" @if (old('prioridad') == "No tan importante") {{ 'selected' }} @endif>No tan importante</option>
                <option value="Nada importante" @if (old('prioridad') == "Nada importante") {{ 'selected' }} @endif>Nada importante</option>
            </select>

            <x-input-error :messages="$errors->get('prioridad')" class="mt-2" />

                <label for="tags" class="inline-block text-lg mb-1 mt-2">
                    Hashtags
                </label>
                <input
                    type="text"
                    class=" mt-1 mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    name="tags"
                    placeholder="Ejemplo: deporte, limpieza, estudio,etc"
                    value="{{old('tags', $tarea->tags)}}"
                />
                <x-input-error :messages="$errors->get('tags')" class="mt-2" />


            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Guardar') }}</x-primary-button>
                <a href="{{ route('index') }}">{{ __('Cancelar') }}</a>
            </div>

        </form>
        @if(session()->has('message'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="bg-blue-100 border border-blue-400 text-blue-700 px-8 py-3 rounded relative m-4" role="alert">
            <span class="block sm:inline">{{ session()->get('message') }}</span>
        </div>
        @endif
    </div>
</x-app-layout>