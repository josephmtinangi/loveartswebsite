<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pillar extends Model
{
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

    public function artists(){
        return $this->HasMany('App\User');
    }

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
}
