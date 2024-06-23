<div class="bg-gray-100 p-5 mt-10 flex justfify-center flex-col items-center">
    <h3 class="text-center text-2xl font-bold my-4 ">Postularme a esta vacante</h3>

    @if(session()->has('mensaje'))
        
    <p class="rounded-lg uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5">
        {{session('mensaje')}}
    </p>

    @else
        <form action="" class="w-96 mt-5" wire:submit.prevent='postularme'>
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum o Hoja de Vida')" />
                <x-text-input 
                    id="cv" 
                    class="block mt-1 w-full" 
                    type="file"
                    accept=".pdf"
                    wire:model="cv"
                />
            </div>

            @error('cv')
                <livewire:mostrar-alerta :message="$message" />
            @enderror

            <x-primary-button class="my-5">
                {{__('Postularme')}}
            </x-primary-button>

        </form>
    @endif


</div>
