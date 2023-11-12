<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl min-h-7xl mx-auto sm:px-6 lg:px-8" style="min-height: 500px;">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <x-image-detail-form :editing="$editing" :image="$image" :route="$route" />
          </div>
        </div>
    </div>
</x-app-layout>
