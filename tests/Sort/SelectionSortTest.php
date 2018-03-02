<?php

namespace Tests\Sort;

use Gammabeam82\Benchmark\Sort\SelectionSort;

class SelectionSortTest extends AbstractSortTest
{
    public function testSelectionSort()
    {
        $this->setSortObject(new SelectionSort());

        $this->performTest();
    }
}
