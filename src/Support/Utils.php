<?php
namespace IEXBase\TronAPI\Support;

use InvalidArgumentException;

class Utils
{
    /**
     * Link verification
     *
     * @param $url
     * @return bool
     */
    public static function isValidUrl($url) :bool {
        return (bool)parse_url($url);
    }

    /**
     * Check whether the passed parameter is an array
     *
     * @param $array
     * @return bool
     */
    public static function isArray($array) : bool {
        return is_array($array);
    }

    /**
     * isZeroPrefixed
     *
     * @param string
     * @return bool
     */
    public static function isZeroPrefixed($value)
    {
        if (!is_string($value)) {
            throw new InvalidArgumentException('The value to isZeroPrefixed function must be string.');
        }
        return (strpos($value, '0x') === 0);
    }

    /**
     * stripZero
     *
     * @param string $value
     * @return string
     */
    public static function stripZero($value)
    {
        if (self::isZeroPrefixed($value)) {
            $count = 1;
            return str_replace('0x', '', $value, $count);
        }
        return $value;
    }

    /**
     * isNegative
     *
     * @param string
     * @return bool
     */
    public static function isNegative($value)
    {
        if (!is_string($value)) {
            throw new InvalidArgumentException('The value to isNegative function must be string.');
        }
        return (strpos($value, '-') === 0);
    }

    /**
     * isHex
     *
     * @param string $value
     * @return bool
     */
    public static function isHex($value)
    {
        return (is_string($value) && preg_match('/^(0x)?[a-f0-9]*$/', $value) === 1);
    }

    /**
     * hexToBin
     *
     * @param string
     * @return string
     */
    public static function hexToBin($value)
    {
        if (!is_string($value)) {
            throw new InvalidArgumentException('The value to hexToBin function must be string.');
        }
        if (self::isZeroPrefixed($value)) {
            $count = 1;
            $value = str_replace('0x', '', $value, $count);
        }
        return pack('H*', $value);
    }

}
