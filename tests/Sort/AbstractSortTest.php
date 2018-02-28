<?php

namespace Tests\Sort;

use Gammabeam82\Benchmark\Sort\SortInterface;
use PHPUnit\Framework\TestCase;

abstract class AbstractSortTest extends TestCase
{
    /**
     * @var array
     */
    protected $data;

    /**
     * @var SortInterface
     */
    protected $sort;

    public function setUp()
    {
        $this->data = [8, 2, 4, 9, 7, 5, 4, 2, 3, 2, 1];
    }

    protected function setSortObject(SortInterface $sort)
    {
        $this->sort = $sort;
    }

    protected function performTest()
    {
        $result = $this->sort->sort($this->data);

        sort($this->data);

        $this->assertEquals($this->data, $result);
    }
}
