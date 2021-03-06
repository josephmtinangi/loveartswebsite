<?php

namespace App;

use App\FeaturedArtist;
use App\ArtistPillar;
use App\ValidatesUrlScheme;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Nicolaslopezj\Searchable\SearchableTrait;

class User extends Authenticatable
{
    use Notifiable, SearchableTrait, ValidatesUrlScheme;

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
    const SORT_ORDER = 'asc';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'gender',
        'dob',
        'type',
        'role',
        'avatar',
        'art_quote',
        'simple_description',
        'description',
        'video_url',
        'portrait_url',
        'facebook_link',
        'instagram_link',
        'youtube_link',
        'twitter_link',
        'provider',
        'provider_id',
        'verification_token',
        'verified_at',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'verified' => 'boolean',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be casted to date.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'verified_at',
        'dob',
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
            'users.name' => 10,
            'users.email' => 7,
        ],
    ];

    /**
     * Set the date of birth of the user.
     *
     * @param   string  $value
     *
     * @return  void
     */
    public function setDobAttribute($value)
    {
        $this->attributes['dob'] =
            Carbon::createFromFormat(config('app.date_parse_format'), $value)->toDateString();
    }

    /**
     * Get the date of birth of the user.
     *
     * @param   string  $value
     *
     * @return  Carbon
     */
    public function getDobAttribute($value)
    {
        if (isset($value)) {
            $value = Carbon::parse($value)->format(config('app.date_parse_format'));
        }
        return $value;
    }

    /**
     * Check if user has provided all required details
     *
     * @return boolean
     */
    public function has_all_required_details()
    {
        $has_all_required_details = isset($this->gender) &&
            isset($this->region) && isset($this->dob);
        return $has_all_required_details;
    }

    /**
     * Obtain user avatar url or default user avatar
     *
     * @return string
     */
    public function avatar()
    {
        //default user avatar
        $avatar_url = url('/images/avatar.jpg');

        //try obtain from user profile
        if (isset($this->avatar)) {
            $avatar_url = $this->avatar;
        }

        return $avatar_url;

    }

    /**
     * Build user avatar url
     *
     * @return string
     */
    public function avatar_url()
    {
        //default user avatar
        $avatar_url = url('/images/avatar.jpg');

        //check if is online link
        if(!is_null($this->avatar) && strlen($this->avatar) > 0)
            $avatar_url = (
                    strpos($this->avatar, 'www') !== false ||
                    strpos($this->avatar, 'http') !== false ||
                    strpos($this->avatar, 'https') !== false) ? $this->avatar : asset('/images/artists/dps') . '/' . $this->avatar;

         return $avatar_url;
    }

    /**
     * Compute user age
     *
     * @return [type] [description]
     */
    public function age()
    {
        $dob = 'Unknown';

        if ($this->dob) {
            $now = Carbon::now();
            $dob = User::parse_date($this->dob);
            $dob = $now->diffInYears($dob);
        }

        return $dob;
    }

    public function first_name()
    {
        $name = 'Unknown';

        if ($this->name) {
            $full_name = $this->name;
            $name = explode(" ", $full_name)[0];
        }

        return $name;
    }

    public static function findByProviderOrEmail(
        $provider = 'google', $providerId = null, $email = null
    ) {
        //find user by social provider and provider id
        $query = User::where('provider', $provider)
            ->where('provider_id', $providerId);

        //return first found user
        $found = $query->first();

        if ($found) {
            return $found;
        }

        //find user by email
        else {
            // find user by social provider and provider id
            $query = User::where('email', $email);

            //return first found user
            $found = $query->first();

            return $found;
        }
    }

    /**
     * create user from social provider
     * @param  [Object] $user social user
     * @return [User]
     */
    public static function findOrCreateByProvider(
        $provider = 'google', $user = null
    ) {
        //TODO assign default user role to newly social registered user
        //TODO obtain more details from social profile gender, bio,passion etc

        //wrap in transaction
        return \DB::transaction(function () use ($provider, $user) {
            //obtain user details
            $name = null;
            $email = null;
            $providerId = null;
            $avatar = null;

            //
            if ($user) {
                $name = $user->getName();
                $email = $user->getEmail();
                $providerId = $user->getId();
                $avatar = User::getProviderOriginalAvatar(
                    $user->getAvatar(), $provider
                );
            }

            //find & return existing
            $user = User::findByProviderOrEmail(
                $provider, $providerId, $email
            );

            if ($user) {
                return $user;
            }

            //create new user
            else {

                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'provider' => $provider,
                    'provider_id' => $providerId,
                    'avatar' => $avatar,
                    'verified' => false,
                ]);

                return $user;
            }
        });
    }

    /**
     * Strip unwanted avatar url extra & return url to obtain
     * original user profile avatar
     *
     * @param   string  $avatar
     * @param   string  $provider
     *
     * @return  string
     */
    public static function getProviderOriginalAvatar($avatar, $provider)
    {

        if ($avatar && $provider) {
            if ($provider == 'google') {
                $avatar = str_replace('?sz=50', '', $avatar);
            } elseif ($provider == 'twitter') {
                $avatar = str_replace('_normal', '', $avatar);
            } elseif ($provider == 'facebook') {
                $avatar = str_replace('type=normal', 'type=large', $avatar);
            }
        }

        return $avatar;
    }

    /**
     * Find an existing user by specified email.
     *
     * @param   string      $email
     *
     * @return  string|null
     */
    public static function findByEmail($email = null)
    {
        if (is_set($email)) {

            return User::where('email', strtolower($email))->first();

        } else {

            return null;

        }
    }

    /**
     * @param   string  $value
     * @return  Carbon
     */
    public static function parse_date($value)
    {
        $date = Carbon::createFromFormat(config('app.date_parse_format'), $value);

        return $date;

    }

    /**
     * Begin querying the model.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public static function query()
    {
        return parent::query(self::SORT_COLUMN, self::SORT_ORDER);
    }

    /**
     * Get images associated with this model.
     *
     * @return  \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ArtistImage::class);
    }

    /**
     * Get pillar associated with this model.
     *
     * @return  \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pillar()
    {
        return $this->belongsTo(ArtistPillar::class);
    }

    /**
     * @return Collection
     */
    public function type()
    {
        return $this->pillar()->first();
    }

    /**
     * @return null
     */
    public function setFacebookLinkAttribute($value)
    {
        $this->attributes['facebook_link'] =
            $this->getValidUrl($value);
    }

    /**
     * @return null
     */
    public function setInstagramLinkAttribute($value)
    {
        $this->attributes['instagram_link'] =
            $this->getValidUrl($value);
    }

    /**
     * @return null
     */
    public function setYouTubeLinkAttribute($value)
    {
        $this->attributes['youtube_link'] =
            $this->getValidUrl($value);
    }

    /**
     * @return null
     */
    public function setTwitterLinkAttribute($value)
    {
        $this->attributes['twitter_link'] =
            $this->getValidUrl($value);
    }

    /**
     * Build a query for all verified users.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeVerified()
    {
        return self::query()->whereNotNull('verified_at');
    }

    /**
     * Build a query for all users waiting verification.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopePending()
    {
        return self::query()->whereNull('verified_at');
    }

    /**
     * Get the featured artist record associated with this user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function featuredArtist()
    {
        return $this->hasOne(FeaturedArtist::class);
    }
}
