<?php

namespace App\Http\Livewire;

use Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Collection;
use Livewire\Component;
use Corsinvest\ProxmoxVE\Api\PveClient;
use Illuminate\Http\Request;
use Telegram;
use App\Components\FlashMessages;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Redirect;
use Laravel\Jetstream\Jetstream;

use App\Models\Instance;
use App\Models\User;
use App\Models\Flag;
use App\Models\UserFlag;


class Dashboard extends Component
{
    public function index()
    {
        $instances = Instance::where('validated', '=', 'y')->where('hidden', '=', 'n')->count();
        $flags = Flag::count();
        $foundflags = UserFlag::distinct()->count('flag_id');
        $foundflagspercentage = $foundflags / $flags * 100;
        $foundflagspercentage = round($foundflagspercentage, 2);
        $pointsavailable = Flag::sum('points');
        $highscore = User::orderBy('points', 'DESC')->orderBy('name', 'DESC')->first();
        if($highscore->points == '0'){
            $highscorepercentage = '0';
        } else {
            $highscorepercentage = $highscore->points / $pointsavailable * 100;
            $highscorepercentage = round($highscorepercentage, 2);
        }
        $users = User::count();
        //dd(Auth::user()->allTeams()->contains('Admins'));
        
        return view('dashboard', [
            'instances' => $instances,
            'flags' => $flags,
            'foundflags' => $foundflags,
            'foundflagspercentage' => $foundflagspercentage,
            'pointsavailable' => $pointsavailable,
            'highscore' => $highscore,
            'highscorepercentage' => $highscorepercentage,
            'users' => $users 
        ]);
    }
}
