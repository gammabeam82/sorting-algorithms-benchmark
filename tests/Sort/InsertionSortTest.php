<?php

namespace Tests\Sort;

use Gammabeam82\Benchmark\Sort\InsertionSort;

class InsertionSortTest extends AbstractSortTest
{
    public function testInsertionSort()
    {
        $this->setSortObject(new InsertionSort());

        $this->performTest();
    }
}
