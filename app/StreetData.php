<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StreetData extends Model
{
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
    protected $casts = [
        'archived_at' => 'datetime',
    ];

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
}
