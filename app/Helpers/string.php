<?php
/**
 * Returns the given variable if it is a string and it is not empty.
 * Otherwise, returns the specified default string.
 *
 * @param string $var The variable to be checked.
 * @param string $default The default string. If not specified, the default is 'Not Available'.
 *
 * @return string
 */
if (!function_exists('if_available')) {

    function if_available($var = null, $default = 'Not Available')
    {
        if (is_string($var) && !empty($var)) {

            return $var;

        } else {

            return $default;

        }
    }

}

/**
 * Get fake image file path.
 *
 * @return string
 */
if (!function_exists('get_fake_image')) {

    function get_fake_image()
    {
        $faker = Faker\Factory::create();

        $seedImagePath = database_path('seeds/images/');
        $fakeImagePath = $seedImagePath . $faker->numberBetween(1, 5) . '.jpg';

        return $fakeImagePath;
    }
}
