<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class FeaturedArtist extends Model
{
    protected $fillable = [
        'biography',
        'questions',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function query()
    {
        return parent::query()->with('user');
    }

    public static function scopeFeatured()
    {
        return self::query()->latest()->limit(1);
    }
}
