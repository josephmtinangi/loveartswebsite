<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;

class StreetData extends Model implements HasMediaConversions
{
    use HasMediaTrait, SearchableTrait;

    /**
     * The column by which this model is sorted.
     *
     * @var const
     */
    const SORT_COLUMN = 'title';

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
    const COLLECTION_NAME = 'street_data';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'street_data';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'type',
        'url',
        'yt_id',
        'placeholder_color',
        'archived_at',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $dates = [
        'archived_at',
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
            'street_data.title' => 10,
        ],
    ];

    /**
     * Get the original url of the street data thumb.
     * If not found, get the public url of the default poster.
     *
     * @return string
     */
    public function getThumbUrlAttribute()
    {
        return $this->hasMedia(self::COLLECTION_NAME)
            ? $this->getFirstMedia(self::COLLECTION_NAME)
                   ->getUrl('thumb')
            : $this->getDefaultPoster();
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
        return parent::query()
            ->orderBy(self::SORT_COLUMN, self::SORT_ORDER);
    }

    /**
     * Get all active street data.
     *
     * @param  \Illuminate\Database\Query\Builder $query
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeActive($query)
    {
        return $query->whereNull('archived_at');
    }

    /**
     * Get all archived street data.
     *
     * @param  \Illuminate\Database\Query\Builder $query
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeArchived($query)
    {
        return $query->whereNotNull('archived_at');
    }

    /**
     * Convert the specified attached media into a thumbnail.
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
