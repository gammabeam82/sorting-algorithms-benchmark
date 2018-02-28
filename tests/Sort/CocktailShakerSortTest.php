<?php

namespace Tests\Sort;

use Gammabeam82\Benchmark\Sort\CocktailShakerSort;
use PHPUnit\Framework\TestCase;

class CocktailShakerSortTest extends TestCase
{
    /**
     * @var array
     */
    private $data;

    public function setUp()
    {
        $this->data = [8, 2, 4, 9, 7, 5, 4, 2, 3, 2, 1];
    }

    public function testShakerSort()
    {
        $shakerSort = new CocktailShakerSort();

        $result = $shakerSort->sort($this->data);

        sort($this->data);

        $this->assertEquals($this->data, $result);
    }
}
