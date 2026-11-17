<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nuevo proyecto</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('projects.store') }}"
                  class="bg-white p-6 shadow sm:rounded-lg space-y-4">
                @csrf

                <div>
                    <x-input-label for="title" value="Título" />
                    <x-text-input id="title" name="title" class="block mt-1 w-full" :value="old('title')" required />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="description" value="Descripción" />
                    <textarea id="description" name="description" rows="4"
                              class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('description') }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="deadline" value="Fecha límite" />
                    <x-text-input id="deadline" type="date" name="deadline" class="block mt-1" :value="old('deadline')" />
                    <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="status" value="Estado" />
                    <select id="status" name="status" class="block mt-1 border-gray-300 rounded-md shadow-sm">
                        <option value="pendiente">Pendiente</option>
                        <option value="en curso">En curso</option>
                        <option value="completado">Completado</option>
                    </select>
                </div>

                <x-primary-button>Guardar</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>