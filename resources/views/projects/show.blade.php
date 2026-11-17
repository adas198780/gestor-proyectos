<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $project->title }}</h2>
            <a href="{{ route('projects.edit', $project) }}"
               class="px-4 py-2 bg-gray-800 text-white rounded-md text-sm">Editar</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white p-6 shadow sm:rounded-lg space-y-2">
                <p class="text-gray-700">{{ $project->description ?? 'Sin descripción.' }}</p>
                <p class="text-sm text-gray-500">Propietario: {{ $project->owner->name }}</p>
                <p class="text-sm text-gray-500">Estado: {{ $project->status }}</p>
                <p class="text-sm text-gray-500">Fecha límite: {{ $project->deadline ?? 'Sin fecha' }}</p>
            </div>

           
            <div class="bg-white p-6 shadow sm:rounded-lg">
                <h3 class="font-semibold text-lg mb-4">Participantes</h3>

                @forelse ($project->participants as $participant)
                    <div class="flex flex-wrap items-center gap-2 border-b py-3">
                        <span class="w-40 font-medium">{{ $participant->name }}</span>

                        <form method="POST"
                              action="{{ route('projects.participants.update', [$project, $participant]) }}"
                              class="flex items-center gap-2">
                            @csrf
                            @method('PUT')
                            <input type="text" name="role" value="{{ $participant->pivot->role }}"
                                   class="border-gray-300 rounded-md shadow-sm text-sm">
                            <input type="number" name="contribution_hours" min="0"
                                   value="{{ $participant->pivot->contribution_hours }}"
                                   class="w-24 border-gray-300 rounded-md shadow-sm text-sm">
                            <span class="text-sm text-gray-500">h</span>
                            <button class="px-3 py-1 bg-gray-800 text-white rounded-md text-sm">Guardar</button>
                        </form>

                        <form method="POST"
                              action="{{ route('projects.participants.destroy', [$project, $participant]) }}">
                            @csrf
                            @method('DELETE')
                            <button class="text-sm text-red-600 underline">Quitar</button>
                        </form>
                    </div>
                @empty
                    <p class="text-gray-500 text-sm">Aún no hay participantes.</p>
                @endforelse

                <form method="POST" action="{{ route('projects.participants.store', $project) }}"
                      class="mt-6 flex flex-wrap items-end gap-2">
                    @csrf
                    <div>
                        <x-input-label for="user_id" value="Usuario" />
                        <select id="user_id" name="user_id" class="block mt-1 border-gray-300 rounded-md shadow-sm">
                            @foreach ($availableUsers as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <x-input-label for="role" value="Rol" />
                        <x-text-input id="role" name="role" class="block mt-1" placeholder="Desarrollador" required />
                    </div>
                    <x-primary-button>Añadir</x-primary-button>
                </form>
                <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>

            <form method="POST" action="{{ route('projects.destroy', $project) }}"
                  onsubmit="return confirm('¿Eliminar este proyecto?')">
                @csrf
                @method('DELETE')
                <button class="px-4 py-2 bg-red-600 text-white rounded-md text-sm">Eliminar proyecto</button>
            </form>

            <a href="{{ route('projects.index') }}" class="text-sm text-gray-500 underline">Volver a la lista</a>
        </div>
    </div>
</x-app-layout>