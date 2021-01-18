<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Instance Logs
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
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">User</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Instance</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
@foreach($logitems as $logitem)
                                <!-- More rows... -->
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="leading-5 text-gray-900">{{ $logitem->updated_at }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="leading-5 text-gray-900">{{ $logitem->user->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="leading-5 text-gray-900">{{ $logitem->instance->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm font-medium">
@if( $logitem->action == 'Start')
                                        <span class="text-sm font-semibold rounded bg-green-100 text-green-800">&nbsp;{{ $logitem->action }}&nbsp;</span>
@elseif( $logitem->action == 'Stop')
                                        <span class="text-sm font-semibold rounded bg-red-100 text-red-800">&nbsp;{{ $logitem->action }}&nbsp;</span>
@elseif( $logitem->action == 'Revert')
                                        <span class="text-sm font-semibold rounded bg-orange-100 text-orange-800">&nbsp;{{ $logitem->action }}&nbsp;</span>
@else
                                        <span class="text-sm font-semibold rounded bg-grey-100 text-grey-800">&nbsp;{{ $logitem->action }}&nbsp;</span>
@endif
                                    </td>
                                </tr>
                                <!-- More rows... -->
@endforeach
  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $logitems->links() }}
        </div>
    </div>
    
</x-app-layout>