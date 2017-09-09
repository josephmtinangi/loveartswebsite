<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class ArtistPillar extends Model implements HasMediaConversions
{
    use HasMediaTrait, SearchableTrait;

    /**
     * The column by which this model is sorted.
     *
     * @var const
     */
    const SORT_COLUMN = 'name';

    /**
     * The order by which this model is sorted.
     *
     * @var const
     */
    const SORT_ORDER = 'desc';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'image_url',
    ];

    /**
     * Get the pillar's name.
     *
     * @param  string $value
     *
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Get all of the artists artists for the pillar.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function artists()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Convert the specified event poster into a thumbnail.
     *
     * {@inherited}
     *
     * @return void
     *
     * @see HasMediaConversions
     */
    public function registerMediaConversions()
    {
        $this->addMediaConversion('thumb')
             ->setManipulations(['w' => 368, 'h' => 232]);
    }
}
