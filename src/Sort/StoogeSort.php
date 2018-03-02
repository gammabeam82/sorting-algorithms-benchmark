<?php

namespace Gammabeam82\Benchmark\Sort;

class StoogeSort implements SortInterface
{
    public const NAME = 'StoogeSort';

    /**
     * @param array $data
     *
     * @return array
     */
    public function sort(array $data): array
    {
        return $this->stoogeSort($data, 0, count($data) - 1);
    }

    /**
     * @param array $data
     * @param int $i
     * @param int $j
     *
     * @return array
     */
    private function stoogeSort(array &$data, int $i, int $j): array
    {
        if ($data[$i] > $data[$j]) {
            list($data[$i], $data[$j]) = [$data[$j], $data[$i]];
        }

        if ($j - $i > 1) {
            $t = ($j - $i + 1) / 3;

            $this->stoogeSort($data, $i, $j - $t);
            $this->stoogeSort($data, $i + $t, $j);
            $this->stoogeSort($data, $i, $j - $t);
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
