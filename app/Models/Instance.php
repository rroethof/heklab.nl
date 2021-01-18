<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Flag;
use App\Models\UserFlag;

class Instance extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'instances';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'ipaddress', 'vmid', 'vmtype', 'ostype', 'osdistribution', 'hidden'
    ];

    public function flag()
    {
       return $this->hasMany(Flag::class);
    }

    public function log()
    {
       return $this->hasMany(Instancehistory::class);
    }
}
