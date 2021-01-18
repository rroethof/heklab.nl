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
  <div class="items-start mt-8 max-w-7xl mx-auto">

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Hostname
              </th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Captured
              </th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Available
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Level
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Status
              </th>
              <th scope="col" class="relative px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                <span>Action</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">

@foreach($instances as $instance)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img class="h-10 w-10 rounded-full" src="/images/distributions/{{ $instance->osdistribution }}.png" alt="{{ ucfirst($instance->osdistribution) }}" title="{{ ucfirst($instance->osdistribution) }}">
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900 font-bold">
                    {{ ucfirst($instance->name) }}
                    </div>
                    <div class="text-sm text-gray-600">
                    {{ $instance->ipaddress }}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
@if( $instance->capturedflags == '0' )
                <div class="text-sm text-center text-red-500 font-bold">
@else
                <div class="text-sm text-center text-gray-900">
@endif                
                {{ $instance->capturedflags }}
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
@if( $instance->availableflags == '0' )
                <div class="text-sm text-center text-green-500 font-bold">
@else
                <div class="text-sm text-center text-gray-500">
@endif
                {{ $instance->availableflags }}          
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ ucfirst($instance->level) }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
@if($instance->status == 'running' )
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                  Active
                </span>
              </td>
@else
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                  Stopped
                </span>
              </td>
@endif
              <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              <div x-data="{ show: false }">
@if($instance->status == 'running' )
                <a href="/instances/{{ $instance->vmid }}/shutdown" title="stop">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                        Stop
                    </span>
                </a>
@else
                <a href="/instances/{{ $instance->vmid }}/boot" title="start">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        Start
                    </span>
                </a>
@endif
                <a href="/instances/{{ $instance->vmid }}/revert" title="revert">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                        Revert
                    </span>
                </a>


                    <a href="#" @click={show=true}  title="info">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                            Info
                        </span>
                    </a>
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

              </td>
            </tr>
@endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>



    </div>
</div>
@endif

</x-app-layout>