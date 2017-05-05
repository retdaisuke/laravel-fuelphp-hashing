<?php

namespace Retdaisuke\LaravelFuelphpHashing;

use RuntimeException;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;

class Hasher implements HasherContract
{
    /**
     * Hash the given value.
     *
     * @param  string  $value
     * @param  array   $options
     * @return string
     *
     * @throws \RuntimeException
     */
    public function make($value, array $options = [])
    {
        $salt = config('fuelphp.auth.salt');
        $iterations = config('fuelphp.auth.iterations');

        return base64_encode(hash_pbkdf2('sha256', $value, $salt, $iterations, 32, true));
    }

    /**
     * Check the given plain value against a hash.
     *
     * @param  string  $value
     * @param  string  $hashedValue
     * @param  array   $options
     * @return bool
     */
    public function check($value, $hashedValue, array $options = [])
    {
        if (strlen($hashedValue) === 0) {
            return false;
        }

        return ($this->make($value) === $hashedValue);
    }

    /**
     * Check if the given hash has been hashed using the given options.
     *
     * @param  string  $hashedValue
     * @param  array   $options
     * @return bool
     */
    public function needsRehash($hashedValue, array $options = [])
    {
        return false;
    }
}
