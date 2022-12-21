<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-center leading-tight">
            Gestion de Tareas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                    <!-- componente de tareas -->
                    <div class="h-100 w-full flex items-center justify-center bg-teal-lightest font-sans ">
                        <div class="bg-white rounded shadow p-6 m-4 w-full lg:w-3/4 lg:max-w-lg">
                            <div class="mb-4">
                                <div class="flex mt-4">
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker" placeholder="Añadir Tarea">
                                    <button class=" bg-sky-500 text-white flex-no-shrink p-2 border-2 rounded-md text-teal border-teal hover:text-black hover:bg-sky-600">Añadir</button>
                                </div>
                            </div>
                            <div>
                                <div class="flex mb-4 items-center">
                                    <p class="w-full text-grey-darkest">Ir al Gym</p>
                                    <button class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded-md bg-red-500 text-white hover:text-black hover:bg-red-600">Terminar</button>
                                    <button class="flex-no-shrink p-2 ml-2 border-2 rounded-md text-white  bg-yellow-500 hover:text-black hover:bg-yellow-600">Editar</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
