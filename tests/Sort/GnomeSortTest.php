<?php

namespace Tests\Sort;

use Gammabeam82\Benchmark\Sort\GnomeSort;

class GnomeSortTest extends AbstractSortTest
{
    public function testGnomeSort()
    {
        $this->setSortObject(new GnomeSort());

        $this->performTest();
    }
}
