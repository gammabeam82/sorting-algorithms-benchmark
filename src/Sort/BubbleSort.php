<?php

namespace Gammabeam82\Benchmark\Sort;

class BubbleSort implements SortInterface
{
    public const NAME = 'BubbleSort';

    /**
     * @param array $data
     *
     * @return array
     */
    public function sort(array $data): array
    {
        $length = count($data) - 1;

        while ($length > 0) {
            $swapped = false;

            for ($i = 0; $i < $length; $i++) {
                $left = &$data[$i];
                $right = &$data[$i + 1];

                if ($left > $right) {
                    $tmp = $data[$i + 1];
                    $right = $left;
                    $left = $tmp;

                    $swapped = true;
                }
            }

            if (false === $swapped) {
                return $data;
            }

            $length--;
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
