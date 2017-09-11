<?php

namespace App;

trait ValidatesUrlScheme
{
    /**
     * Checks whether the specified url has a valid scheme.
     * If not, appends the specified protocol.
     *
     * param string $url        The url string to validate.
     * param string $protocol   If not specified, default is https.
     *
     * @return string
     */
    public function getValidUrl($url, $protocol = "https")
    {
        $delim = "://";
        $arr = explode($delim, $url);

        if (sizeof($arr) == 1) {

            return $protocol . "://" . $url;

        }

        return $url;
    }
}
