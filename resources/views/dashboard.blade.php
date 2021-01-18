<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" style="margin-top: 0px;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div>
                        <x-jet-application-logo class="block h-12 w-auto" />
                    </div>
                
                    <div class="mt-8 text-2xl">
                        Welcome to HekLab!
                    </div>
                
                    <div class="mt-6 text-gray-500">
                        <p>
                            HekLab is a 'Capture The Flag' platform for co-workers and friends, we offer challenges designed to test and improve your hacking skills.<br>
                            The goal: Try to find the vulnerabilities that are in the challenges, exploit these and get the flags.
                        </p>
                        <div class="font-bold mt-6 text-red-600">Use it responsibly and don't hack your fellow members...</div>
                
                    <div style="padding-top: 10px; padding-bottom: 10px;">
                    <!-- START STATS BLOCK -->
                        <div class="sm:grid sm:h-32 sm:grid-flow-row sm:gap-4 sm:grid-cols-6">
                            <div id="jh-stats-positive" class="flex flex-col justify-center px-4 py-4 mt-4 rounded bg-gray-300 bg-opacity-25  sm:mt-0">
                                <div>
                                    <div>
                                        <p class="flex items-center justify-end text-green-500 text-md">&nbsp;
                                        </p>
                                    </div>
                                    <p class="text-3xl font-semibold text-center text-gray-800">{{ $users }}</p>
                                    <p class="text-sm text-center text-gray-500">Users</p>
                                </div>
                            </div>

                            <div id="jh-stats-positive" class="flex flex-col justify-center px-4 py-4 mt-4 rounded bg-gray-300 bg-opacity-25  sm:mt-0">
                                <div>
                                    <div>
                                        <p class="flex items-center justify-end text-gray-500 text-md">&nbsp;
                                        </p>
                                    </div>
                                    <p class="text-3xl font-semibold text-center text-gray-800">{{ $instances }}</p>
                                    <p class="text-sm text-center text-gray-500">Instances</p>
                                </div>
                            </div>

                            <div id="jh-stats-positive" class="flex flex-col justify-center px-4 py-4 mt-4 rounded bg-gray-300 bg-opacity-25  sm:mt-0">
                                <div>
                                    <div>
                                        <p class="flex items-center justify-end text-red-500 text-md">&nbsp;
                                        </p>
                                    </div>
                                    <p class="text-3xl font-semibold text-center text-gray-800">{{ $flags }}</p>
                                    <p class="text-sm text-center text-gray-500">Flags</p>
                                </div>
                            </div>
                    
                            <div id="jh-stats-positive" class="flex flex-col justify-center px-4 py-4 mt-4 rounded bg-gray-300 bg-opacity-25  sm:mt-0">
                                <div>
                                    <div>
                                        <p class="flex items-center justify-end text-gray-500 text-md">&nbsp;
                                        </p>
                                    </div>
                                    <p class="text-3xl font-semibold text-center text-gray-800">{{ $pointsavailable }}</p>
                                    <p class="text-sm text-center text-gray-500">Points available</p>
                                </div>
                            </div>

                            <div id="jh-stats-positive" class="flex flex-col justify-center px-4 py-4 mt-4 rounded bg-gray-300 bg-opacity-25  sm:mt-0">
                                <div>
                                    <div>
                                        <p class="flex items-center justify-end text-gray-500 text-md">
                                            <span class="font-bold">{{ $foundflagspercentage }}%</span>
                                        </p>
                                    </div>
                                    <p class="text-3xl font-semibold text-center text-gray-800">{{ $foundflags }}</p>
                                    <p class="text-sm text-center text-gray-500">Found Flags</p>
                                </div>
                            </div>
                    
                            <div id="jh-stats-positive" class="flex flex-col justify-center px-4 py-4 mt-4 rounded bg-gray-300 bg-opacity-25  sm:mt-0">
                                <div>
                                    <div>
                                        <p class="flex items-center justify-end text-gray-500 text-md">
                                            <span class="font-bold">{{ $highscorepercentage }}%</span>
                                        </p>
                                    </div>
                                    <p class="text-3xl font-semibold text-center text-gray-800">{{ $highscore->points }}</p>
                                    <p class="text-sm text-center text-gray-500">Highest score</p>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- END STATS BLOCK -->
                    </div>
                </div>
                
                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-1">
                    
                    <div class="p-12">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Lab Access</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                <p>
                                    Accessing this dashboard is part 1 of your access to the lab.<br>
                                    Under your account icon (top right) you can find the '<b><a href="/vpn">VPN Configuration</a></b>', this will provide you with your personal OpenVPN configuration.<br><br>
                                    Using this OpenVPN configuration, you have access to the Labs network.<br>
                                    From here you may scan/attack/exploit any host in the <b>10.10.0.2/16</b> range <i><b>(This excludes 10.10.0.1, known as the gateway).</b></i><br>
                                    You may or may not find other networks when you have access to any of the target servers, there will be 'intranets' available on some targets.
                                </p>
                                <br>
                                <br>
                                <p>
                                    <i>Happy hacking</i>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
