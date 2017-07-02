<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'phone', 'avatar',
        'password', 'gender', 'dob', 'provider', 'provider_id',
        'verified', 'verification_token',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'verified' => 'boolean',
        'dob' => 'date',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Date attributes
     * @var [type]
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'dob',
    ];

    /**
     * Date Formats
     * @param [type] $value [description]
     */
    public function setDobAttribute($value)
    {
        $this->attributes['dob'] =
            Carbon::createFromFormat(config('app.datepicker_parse_format'), $value)->toDateString();
    }

    public function getDobAttribute($value)
    {
        if (isset($value)) {
            $value = Carbon::parse($value)->format(config('app.datepicker_parse_format'));
        }
        return $value;
    }

    /**
     * Check if user has provided all required details
     * @return boolean [description]
     */
    public function has_all_required_details()
    {
        $has_all_required_details = isset($this->gender) &&
            isset($this->region) && isset($this->dob);
        return $has_all_required_details;
    }

    /**
     * Obtain user avatar url or default user avatar
     * @return [type] [description]
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
     * build user avatar url
     */
    public function avatar_url()
    {
        //default user avatar
        $avatar_url = url('/images/avatar.jpg');

        //try obtain custom uploaded avatar
        $media = $this->getMedia('images')->first();
        if ($media) {
            $avatar_url = asset('storage/' . $media->id . '/' . $media->file_name);
        }
        return $avatar_url;
    }

    /**
     * Compute user age
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
     * strip unwanted avatar url extra & return url to obtain
     * original user profile avatar
     * @param  [string] $avatar   [description]
     * @param  [string] $provider [description]
     * @return [string]           [description]
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
     * Find existing user by email
     * @param  [string] $email [description]
     * @return [User]        [description]
     */
    public static function findByEmail($email = null)
    {
        if (is_set($email)) {
            $email = strtolower($email);
            $query = User::where('email', $email);
            $found = $query->first();
            return $found;
        } else {
            return null;
        }
    }

    /**
     * Parse date from system format to carbon date
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public static function parse_date($value)
    {
        $date = Carbon::createFromFormat(
            config('app.datepicker_parse_format'), $value
        );

        return $date;

    }
}
