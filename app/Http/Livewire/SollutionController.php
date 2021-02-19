<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Collection;
use Livewire\Component;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Auth;

use App\Models\Sollution;
use App\Models\User;
use App\Events\InstanceMessage;
use App\Models\Instance;
use App\Models\Instancehistory;
use App\Models\Flag;

use Illuminate\Support\Facades\Storage;

class SollutionController extends Component
{
    public function render()
    {
        $files = Storage::disk('writeups')->directories('/');
        //dd($files);
/*
array:3 [▼
  0 => "spring.heklab.lan"
  1 => "summer.heklab.lan"
  2 => "winter.heklab.lan"
]
*/
        return view('livewire.sollutions',compact('files'));
    }
}
