<?php

namespace Tests\Sort;

use Gammabeam82\Benchmark\Sort\QuickSort;

class QuickSortTest extends AbstractSortTest
{
    public function testQuickSort()
    {
        $this->setSortObject(new QuickSort());

        $this->performTest();
    }
}
