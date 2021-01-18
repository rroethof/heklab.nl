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

use App\Events\InstanceMessage;
use App\Models\Instance;
use App\Models\Instancehistory;
use App\Models\Flag;
use App\Models\UserFlag;

class Instances extends Component
{
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function render()
    {
        //$preinstances = Instance::orderBy('name', 'ASC')->get();
        $preinstances = Instance::where('validated', '=', 'y')->where('hidden', '=', 'n')->orderBy('vmid', 'ASC')->get();
        $instances = [];
        $client = new PveClient(env('PROXMOX_HOST'));
        if($client->login(env('PROXMOX_USER'),env('PROXMOX_PASSWORD'),env('PROXMOX_AUTHTYPE'))){
            foreach($preinstances as $instance){
                $info = $client->getNodes()->get("hv001")->getQemu()->get($instance->vmid)->getStatus()->getCurrent()->getRest()->getResponse()->data;
                $status = $info->status;
                $instance->status = $status;
                //$instance->flags = Flag::where('instance_id', '=', $instance->id)->count();

                $thisvmsflags = Flag::where('instance_id', '=', $instance->id)->get();
                $instance->flags = '0';
                $instance->capturedflags = '0';
                foreach($thisvmsflags as $flag){
                    $instance->flags++;
                    $capturedflags = UserFlag::where('user_id', '=', Auth::user()->id)->where('flag_id', '=', $flag->id)->count();
                    if($capturedflags == '0'){
                        // nothing
                    } else {
                        $instance->capturedflags++;
                    }
                }
                $instance->availableflags = $instance->flags - $instance->capturedflags;
                array_push($instances, $instance);
            }
        } else {
            Session::flash('message', 'Proxmox did not accept my api connection!'); 
            Session::flash('alert-class', 'alert-danger'); 
        }

        return view('livewire.instances',compact('instances'));
    }

    public function import()
    {
        $client = new PveClient(env('PROXMOX_HOST'));
        if($client->login(env('PROXMOX_USER'),env('PROXMOX_PASSWORD'),env('PROXMOX_AUTHTYPE'))){
            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL'),
                'text' => 'VM Import: Starting'
            ]);

            foreach($client->getNodes()->get("hv001")->getQemu()->vmlist()->getResponse()->data as $vm) {

                $instance = $client->getNodes()->get("hv001")->getQemu()->get($vm->vmid)->getConfig()->getRest()->getResponse()->data;
                $ipaddress = explode('=', $instance->ipconfig0);
                $ipaddress = explode(',', $ipaddress[1]);
                if($ipaddress[0] == 'dhcp') {
                    $ipaddress = 'DHCP';
                } else {
                    $ipaddress = explode('/', $ipaddress[0]);
                    $ipaddress = $ipaddress[0];
                }

                Instance::updateOrCreate(
                    // find vm by name and hypervisor vm id
                    ['name' => $vm->name, 'vmid' => $vm->vmid],
                    //update the following
                    [
                        'ipaddress' => $ipaddress, 
                        'vmtype' => 'qemu'
                    ]
                );
            }

            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL'),
                'text' => 'VM Import: Done'
            ]);

        }
    }

    public function refreshcache(){
        Artisan::call('config:cache');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        return Redirect::back();
    }

    public function boot($vmid){
        $instance = Instance::where('vmid', '=', $vmid)->where('validated', '=', 'y')->first();
        if (is_null($instance)){
            return Redirect::back();
        } else {
            $client = new PveClient(env('PROXMOX_HOST'));
            if($client->login(env('PROXMOX_USER'),env('PROXMOX_PASSWORD'),env('PROXMOX_AUTHTYPE'))){
                $client->create("/nodes/hv001/". $instance->vmtype ."/". $instance->vmid ."/status/start");

                $type = 'info';
                $title = 'VM Starting';
                $text = ''. ucfirst($instance->name) .' by '. Auth::user()->name .'!';
                event(new InstanceMessage($type, $title, $text));

                Instancehistory::create([
                    'instance_id' => $instance->id,
                    'user_id' => Auth::user()->id,
                    'action' => 'Start',
                ]);

                sleep(5);
                return Redirect::back();
            } else {
                Session::flash('message', 'Proxmox did not accept my api connection!'); 
                Session::flash('alert-class', 'alert-danger'); 
                return view('livewire.instances',compact('instances'));
            }
        }
    }

    public function shutdown($vmid){
        $instance = Instance::where('vmid', '=', $vmid)->where('validated', '=', 'y')->first();
        if (is_null($instance)){
            return Redirect::back();
        } else {
            $client = new PveClient(env('PROXMOX_HOST'));
            if($client->login(env('PROXMOX_USER'),env('PROXMOX_PASSWORD'),env('PROXMOX_AUTHTYPE'))){
                $client->create("/nodes/hv001/". $instance->vmtype ."/". $instance->vmid ."/status/stop");

                $type = 'info';
                $title = 'VM Stopping';
                $text = ''. ucfirst($instance->name) .' by '. Auth::user()->name .'!';
                event(new InstanceMessage($type, $title, $text));

                Instancehistory::create([
                    'instance_id' => $instance->id,
                    'user_id' => Auth::user()->id,
                    'action' => 'Stop',
                ]);

                sleep(5);
                return Redirect::back();
            } else {
                Session::flash('message', 'Proxmox did not accept my api connection!'); 
                Session::flash('alert-class', 'alert-danger'); 
                return view('livewire.instances',compact('instances'));
            }
        }
    }

    public function revert($vmid){
        $instance = Instance::where('vmid', '=', $vmid)->where('validated', '=', 'y')->first();
        if (is_null($instance)){
            return Redirect::back();
        } else {
            $client = new PveClient(env('PROXMOX_HOST'));
            if($client->login(env('PROXMOX_USER'),env('PROXMOX_PASSWORD'),env('PROXMOX_AUTHTYPE'))){

                $client->create("/nodes/hv001/". $instance->vmtype ."/". $instance->vmid ."/status/stop");

                $type = 'info';
                $title = 'VM Stopping';
                $text = ''. ucfirst($instance->name) .' by '. Auth::user()->name .'!';
                event(new InstanceMessage($type, $title, $text));

                sleep(2);

                $client->create("/nodes/hv001/". $instance->vmtype ."/". $instance->vmid ."/snapshot/ctfstart/rollback");

                $type = 'info';
                $title = 'VM Reverting';
                $text = ''. ucfirst($instance->name) .' by '. Auth::user()->name .'!';
                event(new InstanceMessage($type, $title, $text));

                sleep(5);

                $client->create("/nodes/hv001/". $instance->vmtype ."/". $instance->vmid ."/status/start");

                $type = 'info';
                $title = 'VM Starting';
                $text = ''. ucfirst($instance->name) .' by '. Auth::user()->name .'!';
                event(new InstanceMessage($type, $title, $text));

                Instancehistory::create([
                    'instance_id' => $instance->id,
                    'user_id' => Auth::user()->id,
                    'action' => 'Revert',
                ]);

                sleep(3);

                return Redirect::back();
            } else {
                Session::flash('message', 'Proxmox did not accept my api connection!'); 
                Session::flash('alert-class', 'alert-danger'); 
                return view('livewire.instances',compact('instances'));
            }
        }
    }

    public function redirector(){
        Session::flash('timer', 'redirecting');
        return view('livewire.redirector'); 
    }
}
