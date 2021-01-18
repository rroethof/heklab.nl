<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Submit a flag
        </h2>
    </x-slot>

    <div class="container px-4 sm:px-8 mx-auto max-w-lg">

        <!-- card wrapper -->
        <div class="wrapper bg-white rounded-sm shadow-lg">

            <div class="card px-8 py-4 mt-10">
                <div class="card-text">
                    <h1 class="text-xl md:text-2xl font-bold leading-tight text-gray-900">Submit a flag!</h1>
                </div>

                <form action="" method="POST"> 
                    @csrf
                    <div class="card-mail flex items-center my-10">
                        <input type="text" name="flag" class="border-l border-t border-b border-gray-200 rounded-l-md w-full text-base md:text-lg px-3 py-2" placeholder="Enter Your Flag">
                        <button class="bg-green-500 hover:bg-green-600 hover:border-green-600 text-white font-bold capitalize px-3 py-2 text-base md:text-lg rounded-r-md border-t border-r border-b border-green-500">Check</button>
                    </div>

                    @if(Session::has('error'))
                    <div class="alert flex flex-row items-center bg-red-200 p-5 rounded border-b-2 border-red-300">
                        <div class="alert-icon flex items-center bg-red-100 border-2 border-red-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                            <span class="text-red-500">
                                <svg fill="currentColor"
                                     viewBox="0 0 20 20"
                                     class="h-6 w-6">
                                    <path fill-rule="evenodd"
                                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </div>
                        <div class="alert-content ml-4">
                            <div class="alert-title font-semibold text-lg text-red-800">
                                Error
                            </div>
                            <div class="alert-description text-lg text-red-600">
                                {{ Session::get('error') }}
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(Session::has('success'))
                    <div class="alert flex flex-row items-center bg-green-200 p-5 rounded border-b-2 border-green-300">
                        <div class="alert-icon flex items-center bg-green-100 border-2 border-green-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                            <span class="text-green-500">
                                <svg fill="currentColor"
                                     viewBox="0 0 20 20"
                                     class="h-6 w-6">
                                    <path fill-rule="evenodd"
                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </div>
                        <div class="alert-content ml-4">
                            <div class="alert-title font-semibold text-lg text-green-800">
                                Success
                            </div>
                            <div class="alert-description text-lg text-green-600">
                                You flag was correct, your score will be added in a second and you will be diverted to the scoreboard..!
                            </div>
                        </div>
                    </div>
                    @endif

                </form>
            </div>
        </div>
    </div>
</div>

                </div>
            </div>
        </div>


</x-app-layout>