<?php

namespace Gammabeam82\Benchmark\Provider;

use Countable;
use Gammabeam82\Benchmark\Sort\BubbleSort;
use Gammabeam82\Benchmark\Sort\CocktailShakerSort;
use Gammabeam82\Benchmark\Sort\CombSort;
use Gammabeam82\Benchmark\Sort\CountingSort;
use Gammabeam82\Benchmark\Sort\GnomeSort;
use Gammabeam82\Benchmark\Sort\InsertionSort;
use Gammabeam82\Benchmark\Sort\MergeSort;
use Gammabeam82\Benchmark\Sort\OddEvenSort;
use Gammabeam82\Benchmark\Sort\QuickSort;
use Gammabeam82\Benchmark\Sort\RadixSort;
use Gammabeam82\Benchmark\Sort\SelectionSort;
use Gammabeam82\Benchmark\Sort\SortInterface;
use Gammabeam82\Benchmark\Sort\StupidSort;
use Iterator;

class SortProvider implements Iterator, Countable, SortProviderInterface
{
    /**
     * @var int
     */
    private $position = 0;

    /**
     * @var array
     */
    private $sorts = [
        BubbleSort::class,
        CocktailShakerSort::class,
        CombSort::class,
        CountingSort::class,
        GnomeSort::class,
        InsertionSort::class,
        MergeSort::class,
        OddEvenSort::class,
        RadixSort::class,
        SelectionSort::class,
        #StoogeSort::class, # VERY SLOW!
        StupidSort::class,
        QuickSort::class
    ];

    /**
     * @var array
     */
    private $instances = [];

    /**
     * SortProvider constructor.
     */
    public function __construct()
    {
        foreach ($this->sorts as $sortClass) {
            $this->instances[] = new $sortClass;
        }

        $this->position = 0;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    /**
     * @return SortInterface
     */
    public function current(): SortInterface
    {
        return $this->instances[$this->position];
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return false !== isset($this->instances[$this->position]);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->instances);
    }
}
