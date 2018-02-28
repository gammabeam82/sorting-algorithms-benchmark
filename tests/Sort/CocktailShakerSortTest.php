<?php

namespace Tests\Sort;

use Gammabeam82\Benchmark\Sort\CocktailShakerSort;

class CocktailShakerSortTest extends AbstractSortTest
{
    public function testShakerSort()
    {
        $this->setSortObject(new CocktailShakerSort());

        $this->performTest();
    }
}
