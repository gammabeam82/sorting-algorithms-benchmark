<?php

namespace Gammabeam82\Benchmark\Sort;

class SelectionSort implements SortInterface
{
    public const NAME = 'SelectionSort';

    /**
     * @param array $data
     *
     * @return array
     */
    public function sort(array $data): array
    {
        $length = count($data);

        for ($i = 0; $i < $length - 1; $i++) {
            $min = $i;

            for ($j = $i + 1; $j < $length; $j++) {
                if ($data[$j] < $data[$min]) {
                    $min = $j;
                }
            }

            if ($min !== $i) {
                list($data[$min], $data[$i]) = [$data[$i], $data[$min]];
            }
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
