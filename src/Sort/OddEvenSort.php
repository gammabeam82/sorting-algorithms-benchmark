<?php

namespace Gammabeam82\Benchmark\Sort;

class OddEvenSort implements SortInterface
{
    public const NAME = 'OddEvenSort';

    /**
     * @var bool
     */
    private $swapped;

    /**
     * @param array $data
     *
     * @return array
     */
    public function sort(array $data): array
    {
        $this->swapped = true;

        $length = count($data) - 1;

        while (false !== $this->swapped) {
            $this->swapped = false;

            for ($i = 1; $i < $length; $i += 2) {
                $this->swap($data[$i], $data[$i + 1], $data[$i + 1]);
            }

            for ($i = 0; $i < $length; $i += 2) {
                $this->swap($data[$i], $data[$i + 1], $data[$i + 1]);
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
        if ($left > $right) {
            $right = $left;
            $left = $tmp;

            $this->swapped = true;
        }
    }

    /**
     * @return string
     */
    public function getAlgorithmName(): string
    {
        return self::NAME;
    }
}
