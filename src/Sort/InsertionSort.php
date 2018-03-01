<?php

namespace Gammabeam82\Benchmark\Sort;

class InsertionSort implements SortInterface
{
    public const NAME = 'InsertionSort';

    /**
     * @param array $data
     *
     * @return array
     */
    public function sort(array $data): array
    {
        $length = count($data) - 1;
        $i = 1;

        while ($i <= $length) {
            $x = $data[$i];
            $j = $i - 1;

            while ($j >= 0 && $data[$j] > $x) {
                $data[$j + 1] = $data[$j];
                $j--;
            }

            $data[$j + 1] = $x;
            $i++;
        }

        return $data;
    }

    /**
     * @return string
     */
    public function getAlgorithmName(): string
    {
        return self::NAME;
    }
}
