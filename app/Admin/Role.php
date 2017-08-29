<?php

namespace App\Admin;

class Role
{
    const NORMAL = 'Normal';
    const ADMINISTRATOR = 'Administrator';

    public static function all()
    {
        return [
            self::NORMAL,
            self::ADMINISTRATOR,
        ];
    }
}
