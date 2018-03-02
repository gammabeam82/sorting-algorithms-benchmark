<?php

namespace Gammabeam82\Benchmark\Sort;

class GnomeSort implements SortInterface
{
    public const NAME = 'GnomeSort';

    /**
     * @param array $data
     *
     * @return array
     */
    public function sort(array $data): array
    {
        $length = count($data);
        $i = 0;

        while ($i < $length) {
            if ($i == 0 || $data[$i] >= $data[$i - 1]) {
                $i++;
                continue;
            }

            list($data[$i], $data[$i - 1]) = [$data[$i - 1], $data[$i]];

            $i--;
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
