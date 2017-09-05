<?php

/**
 * Get a Carbon instance for the current date and time.
 *
 * @param \DateTimeZone|string|null $tz
 *
 * @return \Carbon\Carbon
 */
if (!function_exists('now')) {

    function now($tz = null)
    {
        return \Carbon\Carbon::now($tz);
    }

}
