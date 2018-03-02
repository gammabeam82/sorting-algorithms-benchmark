<?php

namespace Tests\Sort;

use Gammabeam82\Benchmark\Sort\StoogeSort;

class StoogeSortTest extends AbstractSortTest
{
    public function testStoogeSort()
    {
        $this->setSortObject(new StoogeSort());

        $this->performTest();
    }
}
