<div class="p-6 lg:p-8 bg-white border-b border-gray-200 flex relative">

    <div style='width: 275px; height: 300px;' class="flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
        <img src="{{ asset($userImage->file) }}" alt="{{ $userImage->title }}" class="h-full w-full object-cover object-center">
    </div>

    <div class="ml-4 flex flex-1 flex-col" style="margin-top: 75px;">
        <div>
            <div class="flex justify-between text-base font-medium text-gray-900">
                <div class="truncate-title line-clamp-2" style='width: 250px;'>
                    <h2 class='truncate-title'>{{ $userImage->title }}</h3>
                </div>
            </div>
        </div>
        <div class="flex flex-1 items-end justify-between text-sm mt-8">
            <div class="truncate-description" style='width: 200px;'>
                <p class="text-gray-500">{{ $userImage->description }}</p>
            </div>
        </div>
    </div>
    
    <div class="flex">
        <a href="{{ route('edit', ['id' => $userImage->id]) }}">
            <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">Editar</button>
        </a>
    </div>

    <div class="absolute top-0 left-5 p-2">
        <form action="{{ route('delete-image', ['id' => $userImage->id]) }}" method="post" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta imagen?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500">X</button>
        </form>
    </div>
</div>
