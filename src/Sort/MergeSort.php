<?php

namespace Gammabeam82\Benchmark\Sort;

class MergeSort implements SortInterface
{
    /**
     * @param array $data
     *
     * @return array
     */
    public function sort(array $data): array
    {
        if (1 === count($data)) {
            return $data;
        }

        $pivot = floor(count($data) / 2);
        $left = array_slice($data, 0, $pivot);
        $right = array_slice($data, $pivot);

        return $this->merge(
            $this->sort($left),
            $this->sort($right)
        );
    }

    /**
     * @param array $left
     * @param array $right
     *
     * @return array
     */
    private function merge(array $left, array $right): array
    {
        $result = [];
        $indexLeft = 0;
        $indexRight = 0;

        while ($indexLeft < count($left) && $indexRight < count($right)) {
            if ($left[$indexLeft] < $right[$indexRight]) {
                $result[] = $left[$indexLeft];
                $indexLeft++;
            } else {
                $result[] = $right[$indexRight];
                $indexRight++;
            }
        }

        return array_merge($result, array_slice($left, $indexLeft), array_slice($right, $indexRight));
    }
}
