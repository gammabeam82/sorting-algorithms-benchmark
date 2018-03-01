<?php

namespace Gammabeam82\Benchmark\Sort;

class CocktailShakerSort implements SortInterface
{
    private const ASC = 'asc';
    private const DESC = 'desc';

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
        $start = 0;
        $end = count($data) - 1;

        do {
            $this->swapped = false;

            for ($i = $start; $i < $end; $i++) {
                $this->swap($data[$i], $data[$i + 1], $data[$i + 1], self::ASC);
            }

            $end--;

            if (false === $this->swapped) {
                break;
            }

            $this->swapped = false;

            for ($i = $end; $i > $start; $i--) {
                $this->swap($data[$i - 1], $data[$i], $data[$i - 1], self::DESC);
            }

            $start++;
        } while (false !== $this->swapped);

        return $data;
    }

    /**
     * @param int $left
     * @param int $right
     * @param int $tmp
     * @param string $dir
     */
    private function swap(int &$left, int &$right, int $tmp, string $dir): void
    {
        if ($left > $right) {
            switch ($dir) {
                case self::ASC:
                    $right = $left;
                    $left = $tmp;
                    break;
                case self::DESC:
                    $left = $right;
                    $right = $tmp;
                    break;
                default:
                    throw new \LogicException();
            }

            $this->swapped = true;
        }
    }

    /**
     * @return string
     */
    public function getAlgorithmName(): string
    {
        return 'CocktailShakerSort';
    }
}
