<?php

namespace Numeral;

/**
 * Class Numeral
 * @package Numeral
 * @author Adam Patterson <http://github.com/adampatterson>
 * @link  https://github.com/adampatterson/Numeral
 */
class Numeral
{

    /**
     * @var string
     */
    private static $number = '';
    /**
     * @var string
     */
    private static $format = '0,0';

    /**
     * Numeral constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $number
     *
     * @return $this
     */
    public static function number($number)
    {
        self::$number = $number;

        return new static(null, $number);
    }

    /**
     * @param null $format
     *
     * @return array
     */
    public function format($format = null)
    {
        self::$format = $format;

        // Figure out what kind of format we are dealing with
        if (strpos($format, '$') > -1) { // Currency
            $output = $this->formatCurrency();
        } elseif (strpos($format, '%') > -1) { // Percentage
            $output = $this->formatPercentage();
        } elseif (strpos($format, ':') > -1) { // Time
            $output = $this->formatTime();
        } else { // Regular numbers
            $output = $this->formatNumber();
        }

        // return ['number' => self::$number, 'format' => $this->format, 'output' => $output];
        // return ['format' => self::$format, 'output' => $output];

        return $output;
    }

    /**
     * @param null $format
     *
     * @return string
     */
    public function unformat($format = null)
    {
        $decimals = $this->getDecimals(self::$number);

        self::$number = filter_var(self::$number, FILTER_SANITIZE_NUMBER_INT);

        if ($decimals != 0) {
            self::$number = number_format(self::$number / 100, $decimals, '.', '');
        }

        return $this->format($format);
    }

    public function getDecimals($decimals)
    {
        return (int)strlen(substr(strrchr($decimals, "."), 1));
    }

    /**
     * @return string
     */
    public function formatCurrency()
    {
        if (strpos(self::$number, '$') > -1) {
            self::$number = str_replace('$', '', self::$number);
        }

        $decimals = $this->getDecimals(self::$format);

        if (strpos(self::$format, ',') > -1) {
            $new_number = number_format(self::$number, $decimals);
        } else {
            $new_number = number_format(self::$number, $decimals, '.', ',');
        }

        return '$' . $new_number;
    }

    /**
     * @return string
     */
    public function formatPercentage()
    {
        $new_number = self::$number * 100;

        return $new_number . '%';
    }

    /**
     * @return string
     */
    public function formatTime()
    {
        $time    = self::$number;
        $hours   = floor($time / 60 / 60);
        $minutes = floor(($time - ($hours * 60 * 60)) / 60);
        $seconds = round($time - ($hours * 60 * 60) - ($minutes * 60));

        return $hours . ':' . (($minutes < 10) ? '0' . $minutes : $minutes) . ':' . (($seconds < 10) ? '0' . $seconds : $seconds);
    }

    /**
     * @return mixed
     */
    public function formatNumber()
    {
        $decimals = $this->getDecimals(self::$format);

        if (strpos(self::$format, ",") === false) {
            return number_format(self::$number, $decimals, '.', '');
        } else {
            return number_format(self::$number, $decimals);
        }
    }
}
