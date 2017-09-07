<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class Event extends Model implements HasMediaConversions
{
    use HasMediaTrait, SearchableTrait;

    /**
     * The column by which this model is sorted.
     *
     * @var const
     */
    const SORT_COLUMN = 'start_date';

    /**
     * The order by which this model is sorted.
     *
     * @var const
     */
    const SORT_ORDER = 'asc';

    /**
     * The name of media collection this model refers to.
     *
     * @var const
     */
    const MEDIA_COLLECTION = 'events';

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        /**
         * The name of the event.
         *
         * @var string
         */
        'title',

        /**
         * The locality where the event takes place.
         *
         * @var string
         */
        'location',

        /**
         * A short statement about the event.
         *
         * @var string
         */
        'description',

        /**
         * A link to a published event on an event plannig social network.
         *
         * @var string
         */
        'source_url',

        /**
         * The start date and time of the event.
         *
         * @var datetime
         */
        'start_date',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'start_date',
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
            'events.title' => 10,
            'events.location' => 7,
        ],
    ];

    /**
     * Get a human readable event start date.
     *
     * @param  string $value
     *
     * @return Carbon
     */
    public function getStartDateForHumansAttribute()
    {
        return $this->start_date->diffForHumans();
    }

    /**
     * Get the original url of the event poster.
     * If not found, get the public url of the default poster.
     *
     * @return string
     */
    public function getPosterUrlAttribute()
    {
        return $this->hasMedia(self::MEDIA_COLLECTION) ?
                    $this->getFirstMedia(self::MEDIA_COLLECTION)->getUrl() : $this->getDefaultPoster();
    }

    /**
     * Get the original url of the event poster thumb.
     * If not found, get the public url of the default poster.
     *
     * @return string
     */
    public function getThumbUrlAttribute()
    {
        return $this->hasMedia(self::MEDIA_COLLECTION) ?
                    $this->getFirstMedia(self::MEDIA_COLLECTION)->getUrl('thumb') : $this->getDefaultPoster();
    }

    /**
     * Get the public url of the default poster.
     *
     * @return string
     */
    public function getDefaultPoster()
    {
        return asset('img/poster.jpg');
    }

    /**
     * Begin querying the model.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public static function query()
    {
        return parent::query()->orderBy(self::SORT_COLUMN, self::SORT_ORDER);
    }

    /**
     * Build a query for upcoming events.
     *
     * @param  \Illuminate\Query\Builder $query
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeUpComing($query)
    {
        return $query->where('start_date', '>', now());
    }

    /**
     * Build a query for passed events.
     *
     * @param  \Illuminate\Query\Builder $query
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopePastDue($query)
    {
        return $query->where('start_date', '<', now());
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
