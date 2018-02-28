<?php

namespace Tests\Sort;

use Gammabeam82\Benchmark\Sort\BubbleSort;

class BubbleSortTest extends AbstractSortTest
{
    public function testBubbleSort()
    {
        $this->setSortObject(new BubbleSort());

        $this->performTest();
    }
}
