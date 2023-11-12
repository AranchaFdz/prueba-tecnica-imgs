<div class="p-6 lg:p-8 bg-white border-b border-gray-200 flex items-center justify-center h-full">
    <form method="POST" action="{{ $route }}" enctype="multipart/form-data">
        @csrf

        @if ($editing)
            @method('PUT')

            <x-input id="id" type="text" name="id" :value='$image->id' hidden/>
        @endif

        <div>
            <x-label for="file" :value="__('Imagen')" />

            <div style="min-width: 450px;">
                <x-input id="file" type="file" name="file" required/>
            </div>
        </div>

        <div class="mt-4">
            <x-label for="title" :value="__('Título')" />

            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$image->title ?? ''" required autofocus />
        </div>

        <div class="mt-4">
            <x-label for="description" :value="__('Descripción')" />

            <x-input id="description" class="block mt-1 w-full" name="description" :value="$image->description ?? ''" :value="$image->description ?? ''" required></x-input>
        </div>

        <div class="flex items-center justify-center mt-4">
            <x-button class="ml-4">
                {{ __('Guardar') }}
            </x-button>
        </div>
    </form>
</div>