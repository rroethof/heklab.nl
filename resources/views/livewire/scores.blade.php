<x-guest-layout>
    <div class="relative items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
@if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
@auth
            <a href="{{ url('/') }}" class="text-sm text-gray-700 underline">Dashboard</a>
@else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
@if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
@endif
@endif
        </div>
@endif

        <div style="padding-top: 0px;">
            <div class="items-start max-w-7xl mx-auto">
                <div class="content-center lg:flex lg:justify-center" style="padding-top: 30px; padding-bottom: 0px;">
                    <img src="/images/heklab-logo.png">
                </div>
                <div class="content-center lg:flex lg:justify-center lg:items-center pt-0"  style="padding-top: 0px; margin-top: 0px;">

                    <div class="flex justify-center pt-20 m-auto lg:w-1/4 lg:mx-6 lg:my-8">
                        <div class="relative w-64 h-48">
                            <div
                                class="absolute top-0 left-0 flex items-center w-64 h-40 mt-6 ml-6 bg-white border-8 border-gray-700 border-solid rounded-lg">
                                <div class="w-1/3 h-40"></div>
                                <div class="w-2/3 h-32 pr-4">
                                    <h3 class="pt-1 text-xl font-semibold text-gray-700">{{ $second->name }}</h3>
                                    <p class="pt-1 text-sm text-gray-600">Score: {{ $second->points }}<br>Flags: {{ $second->flags }}</p>
                                </div>
                            </div>
                            <div class="absolute top-0 left-0 z-20 w-12 h-12 mt-6 ml-6 bg-white rounded-full">
                                <img class="h-12 w-12 rounded-full object-cover " src="{{ $second->getProfilePhotoUrlAttribute() }}" alt="{{ $second->name }}">
                            </div>
                            <div
                                class="absolute top-0 left-0 z-10 w-24 h-40 py-20 text-5xl font-bold text-center text-white bg-gray-400 rounded-lg">
                                #2</div>
                            <div class="absolute top-0 left-0 z-30 w-24 h-2 mt-40 ml-48 bg-gray-400"></div>
                        </div>
                    </div>

                    <div class="flex justify-center pt-0 m-auto lg:w-1/4 lg:mx-6 lg:my-8">
                        <div class="relative w-64 h-48">
                            <div
                                class="absolute top-0 left-0 flex items-center w-64 h-40 mt-6 ml-6 bg-white border-8 border-gray-700 border-solid rounded-lg">
                                <div class="w-1/3 h-40"></div>
                                <div class="w-2/3 h-32 pr-4">
                                    <h3 class="pt-1 text-xl font-semibold text-gray-700">{{ $first->name }}</h3>
                                    <p class="pt-1 text-sm text-gray-600">Score: {{ $first->points }}<br>Flags: {{ $first->flags }}</p>
                                </div>
                            </div>
                            <div class="absolute top-0 left-0 z-20 w-12 h-12 mt-6 ml-6 bg-white rounded-full">
                                <img class="h-12 w-12 rounded-full object-cover " src="{{ $first->getProfilePhotoUrlAttribute() }}" alt="{{ $first->name }}">
                            </div>
                            <div
                                class="absolute top-0 left-0 z-10 w-24 h-40 py-20 text-5xl font-bold text-center text-white bg-yellow-300 rounded-lg">
                                #1</div>
                            <div class="absolute top-0 left-0 z-30 w-24 h-2 mt-40 ml-48 bg-yellow-300"></div>
                        </div>
                    </div>

                    <div class="flex justify-center pt-40 m-auto lg:w-1/4 lg:mx-6 lg:my-8">
                        <div class="relative w-64 h-48">
                            <div
                                class="absolute top-0 left-0 flex items-center w-64 h-40 mt-6 ml-6 bg-white border-8 border-gray-700 border-solid rounded-lg">
                                <div class="w-1/3 h-40"></div>
                                <div class="w-2/3 h-32 pr-4">
                                    <h3 class="pt-1 text-xl font-semibold text-gray-700">{{ $third->name }}</h3>
                                    <p class="pt-1 text-sm text-gray-600">Score: {{ $third->points }}<br>Flags: {{ $third->flags }}</p>
                                </div>
                            </div>
                            <div class="absolute top-0 left-0 z-20 w-12 h-12 mt-6 ml-6 bg-white rounded-full">
                                <img class="h-12 w-12 rounded-full object-cover " src="{{ $third->getProfilePhotoUrlAttribute() }}" alt="{{ $third->name }}">
                            </div>
                            <div
                                class="absolute top-0 left-0 z-10 w-24 h-40 py-20 text-5xl font-bold text-center text-white bg-yellow-700 rounded-lg">
                                #3</div>
                            <div class="absolute top-0 left-0 z-30 w-24 h-2 mt-40 ml-48 bg-yellow-700"></div>
                        </div>
                    </div>
                
                </div>

            </div>
        </div>

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
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Flags</th>
                                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Points</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
@foreach($users as $user)
                                    <!-- More rows... -->
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="leading-5 text-gray-900">{{ $loop->iteration }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="leading-5 text-gray-900">{{ $user->name }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="leading-5 text-gray-900">{{ $user->flags }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="leading-5 text-gray-900">{{ $user->points }}</div>
                                        </td>
                                    </tr>
                                    <!-- More rows... -->
@endforeach
    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
            
</x-guest-layout>