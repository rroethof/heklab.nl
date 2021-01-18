<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage instances
        </h2>
    </x-slot>

@if(Session::has('message'))
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-red-400 border-t-4 border-red-600 rounded-b text-black px-4 py-3 shadow-md my-2 rounded" role="alert">
            <div class="flex">
                <svg class="h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
                <div>
                    <p class="text-lg font-bold">Hypervisor communication error</p>
                    <p>{{ Session::get('message') }}<br><br></p>
                    <p class="font-bold"><a href="/instances/refreshcache">Click here to refresh API config and cache</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@else

<div class="py-12" style="padding-top: 0px;">
    <div class="grid grid-cols-6 gap-4 items-start mt-8 max-w-7xl mx-auto">

@foreach($instances as $instance)

        <div class="col-span-6 sm:col-span-6 md:col-span-3 lg:col-span-2 xl:col-span-2">
          <div class="bg-white shadow-lg rounded-lg px-4 py-6 mx-4 my-4">
            <center>
                <img src="/images/serverimages/{{ $instance->name }}.jpg" width="352" height="160" class="mx-auto h-auto bg-gray-200 rounded-lg shadow-lg">
                <div class="font-bold py-2">
                    {{ ucfirst($instance->name) }} (
@if($instance->status == 'running' )
                    <span class="mt-2 text-green-600 dark:text-green-200 font-bold">{{ ucfirst($instance->status) }}</span>
@else
                    <span class="mt-2 text-red-600 dark:text-red-400 font-bold">{{ ucfirst($instance->status) }}</span>
@endif
                    )
                </div>
                <div class="h-2 mt-2 block mx-auto rounded-sm">
                    <table class="table-fixed">
                        <tr>
                            <td class="px-2 py-0">IP:</td>
                            <td class="px-2 py-0">{{ $instance->ipaddress }}</td>
                        </tr>
                        <tr>
                            <td class="px-2 py-0">Flags:</td>
                            <td class="px-2 py-0">Captured: {{ $instance->capturedflags }}, Available {{ $instance->availableflags }} </td>
                        </tr>
                    </table>
                </div>
                <div class="flex justify-center mt-12">
@if($instance->status == 'running' )
                    <a href="/instances/{{ $instance->vmid }}/shutdown" title="stop"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="32" height="32" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16"><g fill="#E53E3E"><path d="M5 3.5h6A1.5 1.5 0 0 1 12.5 5v6a1.5 1.5 0 0 1-1.5 1.5H5A1.5 1.5 0 0 1 3.5 11V5A1.5 1.5 0 0 1 5 3.5z"/></g></svg></a>
@else
                    <a href="/instances/{{ $instance->vmid }}/boot" title="start"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="32" height="32" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 16 16"><g fill="#48BB78"><path d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/></g></svg></a>                        
@endif
                    <a href="/instances/{{ $instance->vmid }}/revert" title="revert"><svg xmlns="http://www.w3.org/2000/svg" 
                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="32" height="32" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M12 16c1.671 0 3-1.331 3-3s-1.329-3-3-3s-3 1.331-3 3s1.329 3 3 3z" fill="#ED8936"/><path d="M20.817 11.186a8.94 8.94 0 0 0-1.355-3.219a9.053 9.053 0 0 0-2.43-2.43a8.95 8.95 0 0 0-3.219-1.355a9.028 9.028 0 0 0-1.838-.18V2L8 5l3.975 3V6.002c.484-.002.968.044 1.435.14a6.961 6.961 0 0 1 2.502 1.053a7.005 7.005 0 0 1 1.892 1.892A6.967 6.967 0 0 1 19 13a7.032 7.032 0 0 1-.55 2.725a7.11 7.11 0 0 1-.644 1.188a7.2 7.2 0 0 1-.858 1.039a7.028 7.028 0 0 1-3.536 1.907a7.13 7.13 0 0 1-2.822 0a6.961 6.961 0 0 1-2.503-1.054a7.002 7.002 0 0 1-1.89-1.89A6.996 6.996 0 0 1 5 13H3a9.02 9.02 0 0 0 1.539 5.034a9.096 9.096 0 0 0 2.428 2.428A8.95 8.95 0 0 0 12 22a9.09 9.09 0 0 0 1.814-.183a9.014 9.014 0 0 0 3.218-1.355a8.886 8.886 0 0 0 1.331-1.099a9.228 9.228 0 0 0 1.1-1.332A8.952 8.952 0 0 0 21 13a9.09 9.09 0 0 0-.183-1.814z" fill="#ED8936"/></svg></a>

                    <div x-data="{ show: false }">
                        <div class="flex justify-center">
                            <a href="#" @click={show=true}  title="info">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="32" height="32" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10s10-4.486 10-10S17.514 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z" fill="#626262"/></svg>
                            </a>
                        </div>
                        <div x-show="show" tabindex="0" class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
                            <div  @click.away="show = false" class="z-50 relative p-3 mx-auto my-0 max-w-full" style="width: 600px;">
                                <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden">
                                    <button @click={show=false} class="fill-current h-6 w-6 absolute right-0 top-0 m-6 font-3xl font-bold">&times;</button>
                                    <div class="px-6 py-3 text-xl border-b font-bold">Info for {{ $instance->name }}</div>
                                    <div class="p-6 flex-grow">
                                        <p>{!! nl2br(e($instance->description))!!}</p>
                                    </div>
                                    <div class="px-6 py-3 border-t">
                                        <div class="flex justify-end">
                                            <button @click={show=false} type="button" class="bg-gray-700 text-gray-100 rounded px-4 py-2 mr-1">Close</Button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50"></div>
                        </div>
                    </div>




                </div>
            </center>
          </div>
        </div>
@endforeach

    </div>
</div>
@endif

</x-app-layout>