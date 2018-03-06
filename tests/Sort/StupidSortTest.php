<?php

namespace Tests\Sort;

use Gammabeam82\Benchmark\Sort\StupidSort;

class StupidSortTest extends AbstractSortTest
{
    public function testStupidSort()
    {
        $this->setSortObject(new StupidSort());

        $this->performTest();
    }
}
