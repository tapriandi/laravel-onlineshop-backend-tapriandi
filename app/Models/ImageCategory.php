<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_id',
        'name',
        'icon',
        'hashtag',
    ];

    public function images()
    {
        return $this->belongsTo(Image::class);
    }
}
