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

class SollutionController extends Component
{
    public function render()
    {
        $sollutions = Sollution::orderBy('title', 'DESC')->paginate(25);
        return view('livewire.sollutions',compact('sollutions'));
    }
}
