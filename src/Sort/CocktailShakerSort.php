<?php

namespace Gammabeam82\Benchmark\Sort;

class CocktailShakerSort implements SortInterface
{
    public const NAME = 'CocktailShakerSort';

    /**
     * @param array $data
     *
     * @return array
     */
    public function sort(array $data): array
    {
        $start = 0;
        $end = count($data) - 1;

        do {
            $swapped = false;

            for ($i = $start; $i < $end; $i++) {
                if ($data[$i] > $data[$i + 1]) {
                    list($data[$i], $data[$i + 1]) = [$data[$i + 1], $data[$i]];
                    $swapped = true;
                }
            }

            $end--;

            if (false === $swapped) {
                break;
            }

            $swapped = false;

            for ($i = $end; $i > $start; $i--) {
                if ($data[$i] < $data[$i - 1]) {
                    list($data[$i], $data[$i - 1]) = [$data[$i - 1], $data[$i]];
                    $swapped = true;
                }
            }

            $start++;
        } while (false !== $swapped);

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
