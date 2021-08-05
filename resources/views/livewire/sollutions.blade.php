<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Sollutions
        </h2>
    </x-slot>
    
    <div class="py-12" style="padding-top: 0px;">
        <div class="items-start mt-8 max-w-7xl mx-auto">

            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">#</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Hostname</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Writeup</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">

@foreach($files as $node)
                                <!-- More rows... -->
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="leading-5 text-gray-900">{{ $loop->iteration }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="leading-5 text-gray-900">{{ $node }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="leading-5 text-gray-900"><a href="/sollutions/{{ $node }}">{{ $node }}/readme.md</a></div>
                                    </td>
                                </tr>
                                <!-- More rows... -->
@endforeach
                            </tbody>
                            </table>
                        </div>
                        <br>
                        To add writeups, see <a href="https://github.com/hvanderlaan/heklab-writeups" target="_blank">https://github.com/hvanderlaan/heklab-writeups</a>
    </div>
</x-app-layout>