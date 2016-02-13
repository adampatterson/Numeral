<?php

namespace App\AdamPatterson;

/**
 * Class Numeral
 * @package App\AdamPatterson
 */
class Numeral
{

    /**
     * @var string
     */
    private $number;
    /**
     * @var string
     */
    private $format;

    /**
     * Numeral constructor.
     */
    public function __construct()
    {
        $this->number = "";
        $this->format = '0,0';
    }

    /**
     * @param $number
     * @return $this
     */
    public function number($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @param null $format
     * @return array
     */
    public function format($format = null)
    {
        $this->format = $format;

        // Figure out what kind of format we are dealing with
        if (strpos($format, '$') > -1) { // Currency
            $output = $this->formatCurrency();
        } elseif (strpos($format, '%') > -1) { // Percentage
            $output = $this->formatPercentage();
        } elseif (strpos($format, ':') > -1) { // Time
            $output = $this->formatTime();
        } else { // Regualr numbers
            $output = $this->formatNumber();
        }

        return ['number' => $this->number, 'format' => $this->format, 'output' => $output];
    }


    /**
     * @param null $unformat
     * @return string
     */
    public function unformat($unformat = null)
    {
        if (strpos($this->number, '$') > -1) {
            $this->number = str_replace('$', '', $this->number);
        }

        return $this->number;
    }

    /**
     * @return string
     */
    public function formatCurrency()
    {
        if (strpos($this->number, '$') > -1) {
            $this->number = str_replace('$', '', $this->number);
        }

        $decimals = strlen(substr(strrchr($this->format, "."), 1));

        $new_number = '$' . number_format($this->number, $decimals);

        return $new_number;
    }

    /**
     * @return string
     */
    public function formatPercentage()
    {
        $new_number = $this->number * 100;

        return $new_number . '%';
    }

    /**
     * @return string
     */
    public function formatTime()
    {
        $time = $this->number;
        $hours = floor($time / 60 / 60);
        $minutes = floor(($time - ($hours * 60 * 60)) / 60);
        $seconds = round($time - ($hours * 60 * 60) - ($minutes * 60));

        return $hours . ':' . (($minutes < 10) ? '0' . $minutes : $minutes) . ':' . (($seconds < 10) ? '0' . $seconds : $seconds);
    }

    /**
     * @return mixed
     */
    public function formatNumber()
    {
        $decimals = strlen(substr(strrchr($this->format, "."), 1));

        if (strpos($this->format, ",") === false) {
            return number_format($this->number, $decimals, '.', '');
        } else {
            return number_format($this->number, $decimals);
        }
    }
}
