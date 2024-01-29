<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'name',
        'caption',
        'url',
        'hashtag',
    ];

    public function modules()
    {
        return $this->belongsTo(Module::class);
    }
}
