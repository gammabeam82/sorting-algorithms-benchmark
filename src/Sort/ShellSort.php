<?php

namespace Gammabeam82\Benchmark\Sort;

class ShellSort implements SortInterface
{
    public const NAME = 'ShellSort';

    /**
     * @param array $data
     *
     * @return array
     */
    public function sort(array $data): array
    {
        $length = count($data);
        $gaps = [701, 301, 132, 57, 23, 10, 4, 1];

        foreach ($gaps as $gap) {
            for ($i = $gap; $i < $length; $i++) {
                $temp = $data[$i];

                for ($j = $i; $j >= $gap && $data[$j - $gap] > $temp; $j -= $gap) {
                    $data[$j] = $data[$j - $gap];
                }

                $data[$j] = $temp;
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
