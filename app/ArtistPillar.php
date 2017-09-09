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
     * The name of media collection this model refers to.
     *
     * @var const
     */
    const COLLECTION_NAME = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * The rules by which this model is searchable.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'artist_pillars.name' => 10,
            'artist_pillars.description' => 7,
        ],
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
     * Get the original url of the event poster thumb.
     * If not found, get the public url of the default poster.
     *
     * @return string
     */
    public function getThumbUrlAttribute()
    {
        return $this->hasMedia(self::COLLECTION_NAME)
            ? $this->getFirstMedia(self::COLLECTION_NAME)->getUrl('thumb')
            : $this->getDefaultPoster();
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
             ->setManipulations(['w' => 64, 'h' => 64]);
    }

    /**
     * Build a query for artist pillars.
     *
     * {@inherited}
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public static function query()
    {
        return parent::query()->orderBy(self::SORT_COLUMN, self::SORT_ORDER);
    }
}
