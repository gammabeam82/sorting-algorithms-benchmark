<?php

namespace Gammabeam82\Benchmark\Sort;

class QuickSort implements SortInterface
{
    public const NAME = 'Quicksort';

    /**
     * @param array $data
     *
     * @return array
     */
    public function sort(array $data): array
    {
        $length = count($data);

        if ($length <= 1) {
            return $data;
        }

        $pivot = $data[0];
        $left = [];
        $right = [];

        for ($i = 1; $i < $length; $i++) {
            $value = $data[$i];

            if ($value < $pivot) {
                $left[] = $value;
                continue;
            }

            $right[] = $value;
        }

        return array_merge($this->sort($left), [$pivot], $this->sort($right));
    }

    /**
     * @return string
     */
    public function getAlgorithmName(): string
    {
        return self::NAME;
    }
}
