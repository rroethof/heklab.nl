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
use App\Models\VPN;

class VPNController extends Component
{
    public function index()
    {
        $userid = Auth::user()->id;
        $vpndata = VPN::where('user_id', '=', ''.$userid.'')->first();
        $content = $vpndata->clientconfig;

        //file name that will be used in the download
        $fileName = "".Auth::user()->name.".ovpn";

        //offer the content of txt as a download (logs.txt)
        return response($content)
                ->withHeaders([
                    'Content-Type' => 'text/plain',
                    'Cache-Control' => 'no-store, no-cache',
                    'Content-Disposition' => 'attachment; filename="'. $fileName .'"',
        ]);

        return Redirect::back();
    }
}