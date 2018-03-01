<?php

namespace Tests\Sort;

use Gammabeam82\Benchmark\Sort\CountingSort;

class CountingSortTest extends AbstractSortTest
{
    public function testCountingSort()
    {
        $this->setSortObject(new CountingSort());

        $this->performTest();
    }
}
