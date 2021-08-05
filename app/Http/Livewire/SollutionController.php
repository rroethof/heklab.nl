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
        return view('livewire.sollutions',compact('files'));
    }

    public function show($title)
    {
      $file = "$title/readme.md";

      //if (Storage::disk('writeups')->exists('$title/readme.me')) {
        $content = Storage::disk('writeups')->get($file);
      //} else {
      //  $content = '404 not found.';
      //} 
      return view('livewire.sollution',compact('title','content'));
    }


}
