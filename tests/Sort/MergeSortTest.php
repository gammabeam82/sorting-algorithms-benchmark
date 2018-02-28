<?php

namespace Tests\Sort;

use Gammabeam82\Benchmark\Sort\MergeSort;
use PHPUnit\Framework\TestCase;

class MergeSortTest extends TestCase
{
    /**
     * @var array
     */
    private $data;

    public function setUp()
    {
        $this->data = [5, 4, 2, 3, 2, 1];
    }

    public function testMergeSort()
    {
        $mergeSort = new MergeSort();

        $result = $mergeSort->sort($this->data);

        sort($this->data);

        $this->assertEquals($this->data, $result);
    }
}
