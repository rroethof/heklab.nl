<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Flag;
use App\Models\Instance;

class UserFlag extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_flag';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'flag_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function flag()
    {
        return $this->belongsTo(Flag::class);
    }

}
