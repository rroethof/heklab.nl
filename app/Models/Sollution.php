<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Instance;

class Sollution extends Model
{
    use HasFactory;

    protected $appends = [
        'readTime',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sollutions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'image', 'excerpt', 'body', 'author_id', 'instance_id'
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function instance()
    {
        return $this->belongsTo(Instance::class);
    }

    public function getReadTimeAttribute() : string
    {
        $wordCount = str_word_count(strip_tags($this->content));

        return round($wordCount / 245);
    }
}
