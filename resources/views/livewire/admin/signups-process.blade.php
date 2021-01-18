<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Process signup for <i>{{ $signups->name }}</i>
        </h2>
    </x-slot>

<style>
    input:checked + svg {
  	    display: block;
    }
</style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <form action="{{ route('admin.signupprocess.update', $signups->id) }}" autocomplete="off" method="POST">
        @csrf
        <input autocomplete="off" name="hidden" type="text" style="display:none;">

            <div>
                <div class="flex flex-row">
                    <div class="hidden md:flex flex-col items-center">
                        <div class="w-32 py-5 border border-gray-300 rounded mr-4 uppercase flex flex-col items-center justify-center bg-white">
                            <div class="text-3xl font-black text-gray-500">Step 1</div>
                            <div class="text-gray-500 text-sm">OpnSense</div>
                        </div>
                        <div class="h-full border-l-4 border-transparent">
                            <div class="border-l-4 mr-4 h-full border-gray-300 border-dashed"></div>
                        </div>
                    </div>
                    <div class="flex-auto border rounded border-gray-300 bg-white">

                            <div class="flex md:flex-row flex-col items-center bg-white">
                                <div class="flex-auto">
                                    <div class="md:hidden text-sm font-normal uppercase pt-3 pl-3 text-gray-500"><span class="font-black">Step 1</span> - OpnSense User and Certificate Creation</div>
                                    <div class="p-3 text-3xl text-gray-800 font">OpnSense User and Certificate Creation</div>
                                    <div class="px-3 pb-6">
                                        <a href="https://heklab.nl:8443/system_usermanager.php?act=new" target=+"_blank">Open the OpnSense add user page here</a>
                                        <br>
                                        <br>
                                        <div><span class="px-4 py-2 rounded-lg inline-block bg-gray-300 text-gray-600"><pre>
Disabled: checked
Username: {{ strtolower(str_replace(' ', '.',$signups->name)) }}
Password: Check "Generate a scrambled password"
Group Memberships: heklab-users
Certificate: Check "Click to create a user certificate."
</pre></span></div>
                                        Save and go back<br><br>
                                        <div><span class="px-4 py-2 rounded-lg inline-block bg-gray-300 text-gray-600"><pre>
Method: Create an internal certificate
Certificate authority: Heklab Users SSL VPN CA
Common Name: HekLab Users - {{ $signups->name }}
</pre></span></div>
                                        Save<br>
                                    </div>
                                </div>
                                <div class="md:w-96 w-full p-5"><img src="https://image.flaticon.com/icons/svg/1330/1330216.svg" alt="step 1" class="object-scale-down"></div>
                            </div>
                        </div>
                    </div>


                    <div class="flex items-start flex-row">
                        <div class="border-t-4 border-r-4 border-transparent">
                            <div class="w-16 ml-16 h-16 border-l-4 border-gray-300 border-dashed border-b-4 rounded-bl-full"></div>
                        </div>
                        <div class="border-t-4 border-transparent flex-auto">
                            <div class="h-16 border-b-4 border-gray-300 border-dashed"></div>
                        </div>
                        <div class="w-16 mt-16 mr-16 h-16 border-r-4 border-gray-300 border-dashed border-t-4 rounded-tr-full"></div>
                    </div>
                    <div class="flex flex-row-reverse">
                        <div class="hidden md:flex flex-col items-center">
                            <div class="w-32 py-5 border border-gray-300 rounded ml-4 uppercase flex flex-col items-center justify-center bg-white">
                                <div class="text-3xl font-black text-gray-500">Step 2</div>
                                <div class="text-gray-500 text-sm">OpenVPN</div>
                            </div>
                            <div class="h-full border-r-4 border-transparent">
                                <div class="border-l-4 ml-4 h-full border-gray-300 border-dashed"></div>
                            </div>
                        </div>
                        <div class="flex-auto border rounded  border-gray-300 bg-white">
                            <div class="flex md:flex-row flex-col items-center">
                                <div class="flex-auto">
                                    <div class="md:hidden text-sm font-normal uppercase pt-3 pl-3 text-gray-500"><span class="font-black">Step 2</span> - OpnSense OpenVPN Client Creation</div>
                                    <div class="p-3 text-3xl text-gray-800 font">OpnSense OpenVPN Client Creation</div>
                                    <div class="px-3 pb-6">
                                    <a href="https://heklab.nl:8443/vpn_openvpn_client.php?act=new&dup=1" target=+"_blank">Open the OpnSense New VPN user here (clone of ronny user vpn)</a>
                                    <br>
                                        <br>
                                        <div>
                                        <span class="px-4 py-2 rounded-lg inline-block bg-gray-300 text-gray-600"><pre>
Description: HekLab Users - {{ $signups->name }}
Client Certificate: Dropdown, select the correct user certificate
</pre>
                                        </span></div>
                                        Save<br>
                                    </div>
                                </div>
                                <div class="md:w-64 w-full p-5"><img src="https://image.flaticon.com/icons/svg/1330/1330216.svg" alt="step 2" class="object-scale-down"></div>
                            </div>
                        </div>
                    </div>


                    <div class="flex items-start flex-row-reverse">
                        <div class="border-t-4 border-l-4 border-transparent">
                            <div class="w-16 mr-16 h-16 border-r-4 border-gray-300 border-dashed border-b-4 rounded-br-full"></div>
                        </div>
                        <div class="border-t-4 border-transparent flex-auto">
                            <div class="h-16 border-b-4 border-gray-300 border-dashed"></div>
                        </div>
                        <div class="w-16 mt-16 ml-16 h-16 border-l-4 border-gray-300 border-dashed border-t-4 rounded-tl-full"></div>
                    </div>
                    <div class="flex flex-row">
                        <div class="hidden md:flex flex-col items-center">
                            <div class="w-32 py-5 border border-gray-300 rounded mr-4 uppercase flex flex-col items-center justify-center bg-white">
                                <div class="text-3xl font-black text-gray-500">Step 3</div>
                                <div class="text-gray-500 text-sm">OpenVPN</div>
                            </div>
                            <div class="h-full border-l-4 border-transparent">
                                <div class="border-l-4 mr-4 h-full border-gray-300 border-dashed"></div>
                            </div>
                        </div>
                        <div class="flex-auto border rounded  border-gray-300">
                            <div class="flex md:flex-row flex-col items-center bg-white">
                                <div class="flex-auto">
                                    <div class="md:hidden text-sm font-normal uppercase pt-3 pl-3 text-gray-500 bg-white"><span class="font-black">Step 3</span> - OpnSense OpenVPN Client Export</div>
                                    <div class="p-3 text-3xl text-gray-800 font">OpnSense OpenVPN Client Export</div>
                                    <div class="px-3 pb-6">
                                        <a href="https://heklab.nl:8443/ui/openvpn/export" target=+"_blank">Open the OpnSense VPN Export page here</a>
                                        <br>
                                        <div>
                                        <span class="px-4 py-2 rounded-lg inline-block bg-gray-300 text-gray-600"><pre>
Remote Access Server: select HekLab Users
Under "Accounts / certificates": click on the cloud behind the earlier created.
</pre>
                                        </span>
                                        </div>
                                        <br><br>Post the content of the file here:
                                        <textarea class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" rows="12" name="openvpnconfg" id="openvpnconfig"  required></textarea>
@if ($errors->has('openvpnconfg'))
                    <span class="text-danger text-red-600">{{ $errors->first('openvpnconfg') }}</span>
@endif
                                    </div>
                                </div>
                                <div class="md:w-96 w-full p-5"><img src="https://image.flaticon.com/icons/svg/1330/1330216.svg" alt="step 3" class="object-scale-down"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-start flex-row">
                        <div class="border-t-4 border-r-4 border-transparent">
                            <div class="w-16 ml-16 h-16 border-l-4 border-gray-300 border-dashed border-b-4 rounded-bl-full"></div>
                        </div>
                        <div class="border-t-4 border-transparent flex-auto">
                            <div class="h-16 border-b-4 border-gray-300 border-dashed"></div>
                        </div>
                        <div class="w-16 mt-16 mr-16 h-16 border-r-4 border-gray-300 border-dashed border-t-4 rounded-tr-full"></div>
                    </div>
                    <div class="flex flex-row-reverse">
                        <div class="hidden md:flex flex-col items-center">
                            <div class="w-32 py-5 border border-gray-300 rounded ml-4 uppercase flex flex-col items-center justify-center bg-white">
                            <div class="text-3xl font-black text-gray-500">Step 4</div>
                            <div class="text-gray-500 text-sm">User info</div>
                        </div>
                    </div>
                    <div class="flex-auto border rounded  border-gray-300">
                        <div class="flex md:flex-row flex-col items-center bg-white">
                            <div class="flex-auto">
                                <div class="md:hidden text-sm font-normal uppercase pt-3 pl-3 text-gray-500"><span class="font-black">Step 4</span> - User info Check</div>
                                <div class="p-3 text-3xl text-gray-800 font">User Info Check</div>
                                <div class="px-3 pb-6">

                                    <div class='w-full md:w-full px-3 mb-6'>
                                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='name'>Full Name</label>
                                        <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='name' name='name' type='text' value='{{ $signups->name }}'  required autofocus autocomplete="off" autocorrect="off">
@if ($errors->has('name'))
                                        <span class="text-danger text-red-600">{{ $errors->first('name') }}</span>
@endif
                                    </div>

                                    <div class='w-full md:w-full px-3 mb-6'>
                                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='email'>Email Address</label>
                                        <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='email' name='email' type='text' value='{{ $signups->email }}'  required autocomplete="off" autocorrect="off">
@if ($errors->has('email'))
                                        <span class="text-danger text-red-600">{{ $errors->first('email') }}</span>
@endif
                                    </div>

                                    <div class='w-full md:w-full px-3 mb-6'>
                                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2' for='password'>First Time Password ( md5(microtime()) )</label>
                                        <input class='appearance-none block w-full bg-white text-gray-700 border border-gray-400 shadow-inner rounded-md py-3 px-4 leading-tight focus:outline-none  focus:border-gray-500' id='password' name='password' type='text' value='{{ md5(microtime()) }}'  required autocomplete="off" autocorrect="off">
@if ($errors->has('password'))
                                        <span class="text-danger text-red-600">{{ $errors->first('password') }}</span>
@endif
                                    </div>

                                    <div class='w-full md:w-full px-3 mb-6'>
                                        <label class='block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2'>pick the Team</label>
                                        <div class="flex-shrink w-full inline-block relative">
                                            <select class="block appearance-none text-gray-600 w-full bg-white border border-gray-400 shadow-inner px-4 py-2 pr-8 rounded" name="team">
                                                <option>Choose ...</option>
@foreach ($teams as $team)
@if($team->name == 'Admins')
<-- skip -->
@else
                                                <option value="{{ $team->id }}">{{ $team->name }}</option>
@endif
@endforeach
                                            </select>



                                            <div class="pointer-events-none absolute top-0 mt-3  right-0 flex items-center px-2 text-gray-600">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                            </div>
                                        </div>
@if ($errors->has('team'))
                                        <span class="text-danger text-red-600">{{ $errors->first('team') }}</span>
@endif
                                    </div>

                                    <div class='w-full md:w-full px-3 mb-6'>
                                        <button class="appearance-none bg-teal-200 text-black px-2 py-1 shadow-sm border border-gray-400 rounded-md mr-3" type="submit">save changes</button>
                                    </div>

                                </div>
                            </div>
                            <div class="md:w-96 w-full p-5"><img src="https://image.flaticon.com/icons/svg/1330/1330216.svg" alt="step 4" class="object-scale-down"></div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
        </div>
    </div>
    <script>
$( document ).ready(function() {
    setTimeout(function(){
        $("#pass").attr('readonly', false);
        $("#pass").focus();
    },500);
});
</script>
</x-app-layout>