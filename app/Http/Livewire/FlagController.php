<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Components\FlashMessages;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Redirect;
use Telegram;
use Illuminate\Support\Facades\Auth;

use App\Events\InstanceMessage;
use App\Models\Instance;
use App\Models\Instancehistory;
use App\Models\Flag;
use App\Models\User;
use App\Models\UserFlag;


class FlagController extends Component
{
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function render()
    {
        return view('livewire.submitflag');
    }

    public function store()
    {
        $flag = request('flag');
        $check = Flag::where('flag', '=', $flag)->first();
        if(empty($check)){
            Session::flash('error', 'No such flag, no score.'); 
            return Redirect::back();
        } else {
            // check if user + flag exists
            $counter = UserFlag::where('user_id', '=', Auth::user()->id)->where('flag_id', '=', $check->id)->count();
            if($counter != '0'){
                Session::flash('error', 'You already added that flag, sneaky bastrard ;)'); 
                return Redirect::back();
            } else {
                Session::flash('success', 'You flag was correct and you scored '. $check->points .' points, your score will be added in a second!'); 

                Telegram::sendMessage([
                    'chat_id' => env('TELEGRAM_CHANNEL'),
                    'text' => ''. Auth::user()->name .' scored '. $check->points .' points!'
                ]);

                $type = 'success';
                $title = 'Flag found';
                $text = ''. Auth::user()->name .' scored '. $check->points .' points!';
                event(new InstanceMessage($type, $title, $text));

                Instancehistory::create([
                    'instance_id' => $check->instance_id,
                    'user_id' => Auth::user()->id,
                    'action' => 'Flag captured ('. $check->points .')',
                ]);

                // add user + flag
                UserFlag::create([
                    'flag_id' => $check->id,
                    'user_id' => Auth::user()->id,
                ]);

                //update the user
                $newflags = Auth::user()->flags + 1;
                $newpoints = Auth::user()->points + $check->points;

                $newdata = User::where('id', '=', Auth::user()->id)->first();
                $newdata->flags = $newflags;
                $newdata->points = $newpoints;
                $newdata->save();

                // user update
                return Redirect::back();
            }
        }
    }
}
