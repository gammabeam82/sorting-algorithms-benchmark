<?php

namespace Gammabeam82\Benchmark\Sort;

class StupidSort implements SortInterface
{
    public const NAME = 'StupidSort';

    /**
     * @param array $data
     *
     * @return array
     */
    public function sort(array $data): array
    {
        $length = count($data) - 1;
        $swapped = true;

        while (false !== $swapped) {
            $swapped = false;

            for ($i = 0; $i < $length; $i++) {
                if ($data[$i] > $data[$i + 1]) {
                    list($data[$i], $data[$i + 1]) = [$data[$i + 1], $data[$i]];
                    $swapped = true;
                }
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
