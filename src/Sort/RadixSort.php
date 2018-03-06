<?php

namespace Gammabeam82\Benchmark\Sort;

class RadixSort implements SortInterface
{
    public const NAME = 'RadixSort';

    /**
     * @param array $data
     *
     * @return array
     */
    public function sort(array $data): array
    {
        $neg = [];
        $pos = [];

        foreach ($data as $value) {
            if (0 > $value) {
                $neg[] = $value * -1;
                continue;
            }

            $pos[] = $value;
        }

        unset($data);

        return array_merge(
            array_reverse(array_map(function ($item) {
                return $item * -1;
            }, $this->radixSort($neg))),
            $this->radixSort($pos)
        );
    }

    /**
     * @param array $data
     *
     * @return array
     */
    public function radixSort(array $data): array
    {
        $max =array_reduce($data, function ($carry, $item) {
            return $item > $carry ? $item : $carry;
        }, 0);

        $base = 10;
        $iteration = 0;

        while ($base ** $iteration <= $max) {
            $data = $this->bucketsToList($this->listToBuckets($data, $iteration, $base));
            $iteration++;
        }

        return $data;
    }

    /**
     * @param array $data
     * @param int $base
     * @param int $iteration
     *
     * @return array
     */
    private function listToBuckets(array $data, int $iteration, int $base = 10): array
    {
        $buckets = array_fill(0, 9, []);

        foreach ($data as $number) {
            $digit = floor($number / ($base ** $iteration)) % $base;
            $buckets[$digit][] = $number;
        }

        return $buckets;
    }

    /**
     * @param array $buckets
     *
     * @return array
     */
    private function bucketsToList(array $buckets): array
    {
        $numbers = [];

        foreach ($buckets as $bucket) {
            $numbers = array_merge($numbers, $bucket);
        }

        return $numbers;
    }

    /**
     * @return string
     */
    public function getAlgorithmName(): string
    {
        return self::NAME;
    }
}
