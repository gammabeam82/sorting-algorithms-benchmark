<?php

namespace Gammabeam82\Benchmark\Sort;

class CombSort implements SortInterface
{
    public const NAME = 'CombSort';

    /**
     * @param array $data
     *
     * @return array
     */
    public function sort(array $data): array
    {
        $length = count($data);
        $gap = $length;
        $shrink = 1.3;
        $sorted = false;

        while (false === $sorted) {
            $gap = floor($gap / $shrink);

            if ($gap > 1) {
                $sorted = false;
            } else {
                $gap = 1;
                $sorted = true;
            }

            $i = 0;

            while ($i + $gap < $length) {
                if ($data[$i] > $data[$i + $gap]) {
                    list($data[$i + $gap], $data[$i]) = [$data[$i], $data[$i + $gap]];
                    $sorted = false;
                }
                $i++;
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
