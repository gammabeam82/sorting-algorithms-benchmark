<?php

namespace Tests\Sort;

use Gammabeam82\Benchmark\Sort\CombSort;

class CombSortTest extends AbstractSortTest
{
    public function testCombSort()
    {
        $this->setSortObject(new CombSort());

        $this->performTest();
    }
}
