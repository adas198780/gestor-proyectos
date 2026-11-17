<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar proyecto</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('projects.update', $project) }}"
                  class="bg-white p-6 shadow sm:rounded-lg space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="title" value="Título" />
                    <x-text-input id="title" name="title" class="block mt-1 w-full"
                                  :value="old('title', $project->title)" required />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="description" value="Descripción" />
                    <textarea id="description" name="description" rows="4"
                              class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $project->description) }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="deadline" value="Fecha límite" />
                    <x-text-input id="deadline" type="date" name="deadline" class="block mt-1"
                                  :value="old('deadline', $project->deadline)" />
                    <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="status" value="Estado" />
                    <select id="status" name="status" class="block mt-1 border-gray-300 rounded-md shadow-sm">
                        @foreach (['pendiente', 'en curso', 'completado'] as $status)
                            <option value="{{ $status }}" @selected(old('status', $project->status) === $status)>
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <x-primary-button>Guardar cambios</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>