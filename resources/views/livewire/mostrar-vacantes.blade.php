<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> 
        @forelse ($vacantes as $vacante)
            <div class="p-6 bg-white border-b border-gray-200 text-gray-900 md:flex md:justify-between md:items-center">
                <div class="space-y-3">
                    <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold">
                        {{$vacante->titulo}}
                    </a>
                    <p class="text-sm text-gray-600">{{$vacante->empresa}}</p>
                    <p class="text-sm text-gray-500">Último día: {{$vacante->ultimo_dia->format('d/m/Y')}}</p>
                </div>
    
                <div class="flex flex-col md:flex-row gap-3 items-stretch mt-5 md:mt-0">
                    <a href="{{route("candidatos.index", $vacante)}}" class="bg-slate-800 py-2 px-4 rounded-lg text-center text-white text-xs font-bold uppercase">{{$vacante->candidatos->count()}} @choice('Candidato|Candidatos', $vacante->candidatos->count())</a>
                    <a href="{{ route('vacantes.edit', $vacante->id) }}" class="bg-blue-800 py-2 px-4 rounded-lg text-center text-white text-xs font-bold uppercase">Editar</a>
                    <button wire:click="$emit('prueba', {{$vacante->id}})" class="bg-red-600 py-2 px-4 rounded-lg text-center text-white text-xs font-bold uppercase">Eliminar</button>
                </div>
            </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600">No hay vacantes que mostrar</p>
        @endforelse
    
    </div>
    
    <div class="mt-10">
        {{$vacantes->links()}}
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('prueba', vacanteId => {
            Swal.fire({
                title: "¿Eliminar Vacante?",
                text: "Una vacante elminada no se puede recuperar",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "¡Sí, Eliminar!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
            if (result.isConfirmed) {
                //Eliminar vacante
                Livewire.emit('eliminarVacante', vacanteId);

                Swal.fire({
                title: "¡Vacante Eliminada!",
                text: "La vacante ha sido eliminada correctamente.",
                icon: "success"
                });
            }
            });
        } )
    </script>
@endpush