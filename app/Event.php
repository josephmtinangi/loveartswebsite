<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
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
    const SORT_ORDER = 'desc';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'poster',
        'url',
        'archived_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'archived_at' => 'datetime',
        'date' => 'date',
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
     * Get all active events.
     *
     * @param  \Illuminate\Query\Builder $query
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeActive($query)
    {
        return $query->whereNull('archived_at');
    }

    /**
     * Get all archived events.
     *
     * @param  \Illuminate\Query\Builder $query
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeArchived($query)
    {
        return $query->whereNotNull('archived_at');
    }
}
