<?php

namespace Gammabeam82\Benchmark\Sort;

class OddEvenSort implements SortInterface
{
    /**
     * @var bool
     */
    private $sorted;

    /**
     * @param array $data
     *
     * @return array
     */
    public function sort(array $data): array
    {
        $this->sorted = false;

        $length = count($data) - 1;

        while(false === $this->sorted) {
            $this->sorted = true;

            for($i = 1; $i < $length; $i += 2) {
                $this->swap($data[$i], $data[$i+1], $data[$i+1]);
            }

            for($i = 0; $i < $length; $i += 2) {
                $this->swap($data[$i], $data[$i+1], $data[$i+1]);
            }
        }

        return $data;
    }


    /**
     * @param int $left
     * @param int $right
     * @param int $tmp
     */
    private function swap(int &$left, int &$right, int $tmp): void
    {
        if($left > $right) {
            $right = $left;
            $left = $tmp;

            $this->sorted = false;
        }
    }
}
