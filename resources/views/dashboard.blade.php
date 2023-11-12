<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if (isset($userImages))
                    @foreach ($userImages as $userImage) 
                        <x-welcome :userImage="$userImage" :route="$route"/>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
