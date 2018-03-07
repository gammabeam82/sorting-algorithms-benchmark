<?php

namespace Tests\Sort;

use Gammabeam82\Benchmark\Sort\ShellSort;

class ShellSortTest extends AbstractSortTest
{
    public function testShellSort()
    {
        $this->setSortObject(new ShellSort());

        $this->performTest();
    }
}
