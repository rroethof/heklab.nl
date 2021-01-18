<?php

namespace App\Http\Livewire;

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
use Illuminate\Support\Facades\Auth;


use App\Models\User;
use App\Events\InstanceMessage;
use App\Models\Instance;
use App\Models\Instancehistory;
use App\Models\Flag;

class Log extends Component
{
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function index()
    {
        $logitems = Instancehistory::orderBy('id', 'DESC')->paginate(25);
        return view('livewire.log',compact('logitems'));
    }
}