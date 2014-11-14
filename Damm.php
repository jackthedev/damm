<?php

/**
 * Class Damm
 *
 * http://en.wikipedia.org/wiki/Damm_algorithm
 */
class Damm
{
    /**
     * Damm's table
     *
     * @var array
     */
    private $table =
    [
        [0, 3, 1, 7, 5, 9, 8, 6, 4, 2],
        [7, 0, 9, 2, 1, 5, 4, 8, 6, 3],
        [4, 2, 0, 6, 8, 7, 1, 3, 5, 9],
        [1, 7, 5, 0, 9, 8, 3, 4, 2, 6],
        [6, 1, 2, 3, 0, 4, 5, 9, 7, 8],
        [3, 6, 7, 4, 2, 0, 9, 5, 8, 1],
        [5, 8, 6, 9, 7, 2, 0, 1, 3, 4],
        [8, 9, 4, 5, 3, 6, 2, 0, 1, 7],
        [9, 4, 3, 8, 6, 1, 7, 2, 0, 5],
        [2, 5, 8, 1, 4, 3, 6, 7, 9, 0]
    ];

    /**
     * Generates a check digit for a provided number
     *
     * @param $number
     * @return int
     */
    private function getCheckDigit($number)
    {
        $row = 0;
        $number = (string)$number;
        $length = strlen($number);

        for ($i = 0; $i < $length; ++$i)
        {
            $col = $number[$i];
            $row = $this->table[$row][$col];
        }

        return $row;
    }

    /**
     * Enhances a number with a check digit
     *
     * @param $number
     * @return string
     */
    public function prepare($number)
    {
        // check if it's a number
        if (preg_match('#[^0-9]#', $number))
        {
            // not a natural number
            return null;
        }

        // add a check digit
        return $number . $this->getCheckDigit($number);
    }

    /**
     * Validates the number using a built-in check digit
     *
     * @param $number
     * @return bool
     */
    public function validate($number)
    {
        return $this->getCheckDigit($number) === 0;
    }
}