<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Collection;
use Livewire\Component;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Signup;
use App\Models\User;
use App\Models\Team;
use App\Models\VPN;

class SignupController extends Component
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // FOR ADMINS ONLY
        if(Auth::user()->currentTeam->name == 'Admins'){
            $signups = Signup::all();
            return view('livewire.admin.signups', compact('signups'));
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ipaddress = '';

        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        } elseif (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        } else {
            $ipaddress = 'UNKNOWN';    
        }

        return view('livewire.signup.form', compact('ipaddress'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|unique:users|unique:signup',
            'email' => 'required|email|unique:users|unique:signup',
            'company' => 'required|min:5',
            'ipaddress' => 'required|ipv4'
        ], [
            'name.required' => 'Name is required',
            'company.required' => 'Company is required'
        ]);

        $user = Signup::create($validatedData);
        
        return back()->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\signup  $signup
     * @return \Illuminate\Http\Response
     */
    public function show(signup $signup)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\signup  $signup
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        // FOR ADMINS ONLY
        if(Auth::user()->currentTeam->name == 'Admins'){

            $signups = Signup::where('id', '=', $request->id)->firstOrFail();
            $teams = Team::get();

            return view('livewire.admin.signups-process', compact('signups', 'teams'));
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\signup  $signup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, signup $signup)
    {
        // FOR ADMINS ONLY
        if(Auth::user()->currentTeam->name == 'Admins'){

            $validatedData = $request->validate([
                'openvpnconfg' => 'required',
                'name' => ['required', 'string', 'max:255', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => 'required',
                'team' => 'required'
            ], [
                'openvpnconfg.required' => 'VPN Configuration is required',
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'team.required' => 'Selecting a Team is required'
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'points' => '0',
                'flags' => '0'
            ]);

            // get created user
            $addeduser = User::where('email', '=', $request->email)->firstOrFail();
            
            // add to team_user
            DB::update('update users set current_team_id = ? where id = ?', [$request->team, $addeduser->id]);
            DB::insert('insert into team_user (team_id, user_id, role) values (?, ?, ?)', [$request->team, $addeduser->id, 'editor']);

            // add to vpnconnections-users
            VPN::create([
                'user_id' => $addeduser->id,
                'clientconfig' => $request->openvpnconfg
            ]);

            DB::delete('delete from signup where email = ?', [$request->email]);

            return redirect('/admin/signups');

        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\signup  $signup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Signup $signup)
    {
        // FOR ADMINS ONLY
        if(Auth::user()->currentTeam->name == 'Admins'){
            $signup->delete();
            
            return Redirect::back();
        } else {
            abort(403);
        }
    }
}
