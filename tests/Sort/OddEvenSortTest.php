<?php

namespace Tests\Sort;

use Gammabeam82\Benchmark\Sort\OddEvenSort;

class OddEvenSortTest extends AbstractSortTest
{
    public function testOddEvenSort()
    {
        $this->setSortObject(new OddEvenSort());

        $this->performTest();
    }
}
