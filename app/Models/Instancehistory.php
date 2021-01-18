<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Instance;

class Instancehistory extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'instancehistory';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'instance_id', 'user_id', 'action'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function instance()
    {
        return $this->belongsTo(Instance::class);
    }

}
