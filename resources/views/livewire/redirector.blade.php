<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage instances
        </h2>
    </x-slot>

@if(Session::has('timer'))
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-green-400 border-t-4 border-green-600 rounded-b text-black px-4 py-3 shadow-md my-2 rounded" role="alert">
                <div class="flex">
                    <svg class="h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg>
                    <div>
                        <p class="text-lg font-bold">Hypervisor running command</p>
                        <p>You will be redirected asap.<br><br></p>
                        <script type="text/javascript">   
                            function Redirect() 
                            {  
                                window.location="/instances"; 
                            } 
                            setTimeout('Redirect()', 2000);   
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

</x-app-layout>