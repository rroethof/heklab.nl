<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Sollution for {{ $title }}
        </h2>
    </x-slot>

    <div class="px-6 py-12">
        <div class="flex justify-between container mx-auto">
                    <div class="px-10 py-6 bg-white rounded-lg shadow-md">
                        <div class="mt-2"><a href="#" class="text-2xl text-gray-700 font-bold hover:underline">{{ $title }}</a>
                            <div class="mt-2 text-gray-600 markdown-body">
                                @markdown($content)
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>


</x-app-layout>