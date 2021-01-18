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

class Leaderboard extends Component
{
    public function render()
    {
        $first  = User::orderBy('points', 'DESC')->orderBy('id', 'ASC')->first();
        $second = User::orderBy('points', 'DESC')->orderBy('id', 'ASC')->skip(1)->first();
        $third  = User::orderBy('points', 'DESC')->orderBy('id', 'ASC')->skip(2)->first();
        $users  = User::orderBy('points', 'DESC')->orderBy('id', 'ASC')->get();


        return view('livewire.leaderboard',compact('users'),[
            'first' => $first,
            'second' => $second,
            'third' => $third
        ]);
    }

    public function publicrender()
    {
        $first  = User::orderBy('points', 'DESC')->orderBy('id', 'ASC')->first();
        $second = User::orderBy('points', 'DESC')->orderBy('id', 'ASC')->skip(1)->first();
        $third  = User::orderBy('points', 'DESC')->orderBy('id', 'ASC')->skip(2)->first();
        $users  = User::orderBy('points', 'DESC')->orderBy('id', 'ASC')->get();


        return view('livewire.scores',compact('users'),[
            'first'  => $first,
            'second' => $second,
            'third'  => $third
        ]);
    }
}
