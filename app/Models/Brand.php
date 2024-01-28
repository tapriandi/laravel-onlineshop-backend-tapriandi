<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'website',
        'instagram',
        'facebook',
        'twitter',
        'description',
        'rate_playstore',
        'rate_appstore',
        'playstore_link',
        'appstore_link',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
}
