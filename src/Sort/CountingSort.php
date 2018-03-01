<?php

namespace Gammabeam82\Benchmark\Sort;

class CountingSort implements SortInterface
{
    public const NAME = 'CountingSort';

    /**
     * @param array $data
     *
     * @return array
     */
    public function sort(array $data): array
    {
        $count = [];

        $min = min($data);
        $max = max($data);

        for ($i = $min; $i <= $max; $i++) {
            $count[$i] = 0;
        }

        foreach ($data as $value) {
            $count[$value]++;
        }

        $index = 0;

        for ($i = $min; $i <= $max; $i++) {
            while ($count[$i]-- > 0) {
                $data[$index++] = $i;
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
