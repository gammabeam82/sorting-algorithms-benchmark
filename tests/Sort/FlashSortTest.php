<?php

namespace Tests\Sort;

use Gammabeam82\Benchmark\Sort\FlashSort;

class FlashSortTest extends AbstractSortTest
{
    public function testFlashSort()
    {
        $this->setSortObject(new FlashSort());

        $this->performTest();
    }
}
