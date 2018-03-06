<?php

namespace Tests\Sort;

use Gammabeam82\Benchmark\Sort\RadixSort;

class RadixSortTest extends AbstractSortTest
{
    public function testRadixSort()
    {
        $this->setSortObject(new RadixSort());

        $this->performTest();
    }
}
