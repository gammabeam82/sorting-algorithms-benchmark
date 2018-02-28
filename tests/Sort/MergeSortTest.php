<?php

namespace Tests\Sort;

use Gammabeam82\Benchmark\Sort\MergeSort;

class MergeSortTest extends AbstractSortTest
{
    public function testMergeSort()
    {
        $this->setSortObject(new MergeSort());

        $this->performTest();
    }
}
