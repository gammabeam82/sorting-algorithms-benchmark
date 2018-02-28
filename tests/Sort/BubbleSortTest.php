<?php

namespace Tests\Sort;

use Gammabeam82\Benchmark\Sort\BubbleSort;
use PHPUnit\Framework\TestCase;

class BubbleSortTest extends TestCase
{
    /**
     * @var array
     */
    private $data;

    public function setUp()
    {
        $this->data = [5, 4, 2, 3, 2, 1];
    }

    public function testBubbleSort()
    {
        $bubbleSort = new BubbleSort();

        $result = $bubbleSort->sort($this->data);

        sort($this->data);

        $this->assertEquals($this->data, $result);
    }
}
